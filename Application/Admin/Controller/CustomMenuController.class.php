<?php
namespace Admin\Controller;
use Think\Controller;
use Vendor\Wechat\WechatAuth;
class CustomMenuController extends CommonController{
	public function index(){
		$menu_model = D('CustomMenu');
		$res = $menu_model->getCustomMenu();
		$data = $this->recursionData($res,0,'parent_id');
		$this->assign('list',$data);
		$this->display();
	}

	/*添加修改自定义菜单*/
	public function addCustomMenu(){
		if(IS_POST){
			$data['user_id'] = $_SESSION['user']['id'];
			$data['parent_id'] = I('post.parent_menu');
			$data['click_type'] = I('post.menu_type');
			$data['menu_name'] = I('post.menu_name');
			$string = new \Org\Util\String();
			$data['menu_key'] = $string->randString(128);
			$data['menu_sort'] = I('post.menu_sort');

			$menu_id = I('post.id');

			$menu_model = D('CustomMenu');
			if($menu_model->create($data)){
				if(!$menu_id){
					$result = $menu_model->add();
					if($result){
						$this->redirect('CustomMenu/addMenuDesc',array('id'=>$result));
					}else{
						$this->success('提交失败！');
					}
				}else{
					$where['id'] = array('eq',$menu_id);
					$result = $menu_model->where($where)->save();
					if(false !== $result){
						$this->success('提交成功！');
					}else{
						$this->error('提交失败！');
					}
				}
			}else{
				$this->error($menu_model->getError());
			}
		}else{
			$menu_model = D('CustomMenu');
			$res = $menu_model->getCustomMenu();
			$data = array();
			foreach ($res as $key => $val) {
				$data[$key]['id'] = $val['id'];
				$data[$key]['parent_id'] = $val['parent_id'];
				$data[$key]['menu_name'] = $val['menu_name']; 
			}
			$parent_menu = $this->recursionData($data,0,'parent_id');
			$this->assign('parent_menu',$parent_menu);
			
			$menu_id = I('get.id');
			$result = $menu_model->getCustomMenu($menu_id);
			
			$this->assign('menu',$result[0]);
			$this->display();
		}
	}
	/*添加修改自定义菜单内容*/
	public function addMenuDesc(){
		if(IS_POST){
			$desc_id = I('post.id');
			$data['menu_id'] = I('post.menu_id');
			$data['menu_title'] = I('post.title');
			$data['menu_desc'] = I('post.desc');
			$_FILES['file'] ? $data['file'] = $this->upload($_FILES['file']) : '';
			$data['menu_url'] = I('post.url');
			I('post.url_desc') ? $data['url_desc'] = I('post.url_desc') : '';
			$data['focus_type'] = I('post.focus_type');
			
			//把URL更新到custom_menu表
			$map['id'] = array('eq',$data['menu_id']);
			$url['focus_type'] = $data['focus_type'];
			if('pictures' != $data['focus_type']){
				$url['menu_url'] = $data['menu_url'];			
			}
			D('CustomMenu')->where($map)->save($url);
			 
			$menu_desc = D('MenuDesc');
			switch ($data['focus_type']) {
				case 'text':
				unset($data['menu_title']);
				case 'picture':
				case 'media':
					if($menu_desc->create($data)){
						if(!$desc_id){
							$result = $menu_desc->add();
						}else{
							$where['id'] = array('eq',$desc_id);
							$result = $menu_desc->where($where)->save();
						}
						
						if(false != $result){
							$this->success('提交成功！');
						}else{
							$this->error('提交失败！');
						}
					}else{
						$this->error($menu_desc->getError());
					}
					break;

				case 'pictures':
					if($data['menu_title'] && $data['menu_desc'] && $data['file'] && $data['menu_url']){
						if($menu_desc->create($data)){
							$result = $menu_desc->add();
							if($result){
								$this->success('提交成功！');
							}else{
								$this->error('提交失败！');
							}
						}else{
							$this->error($menu_desc->getError());
						}
					}else{
						$this->success('提交成功！');
					}
					break;
				default:
					# code...
					break;
			}
		}else{
			$menu_id = I('get.id');
			$menu_model = D('CustomMenu');

			$res = $menu_model->getCustomMenu();
			$data = array();
			foreach ($res as $key => $val) {
				$data[$key]['id'] = $val['id'];
				$data[$key]['parent_id'] = $val['parent_id'];
				$data[$key]['menu_name'] = $val['menu_name']; 
			}
			$parent_menu = $this->recursionData($data,0,'parent_id');
			$menu_desc = D('MenuDesc')->getMenuDesc($menu_id);
			$help = $this->createHelperUrl(DOMAIN_NAME);
		
			$this->assign('parent_menu',$parent_menu);
			$this->assign('menu_desc',$menu_desc);
			$this->assign('help',$help);
			$this->display();
		}
	}
	/*同步自定义菜单*/
	public function setCustomMenuToWechat(){
		$model = D('CustomMenu');
		$menu_info = $model->getCustomMenu();
		$menu_list = $this->foreachCustomMenu($menu_info);
		
		$wechat_info = D('User')->getWechatInfo($_SESSION['user']['id']);
		$time_out = $wechat_info['expires_in']-time();
		if(0 < $time_out){
			$wechat_auth = new WechatAuth($wechat_info['appid'],$wechat_info['secret'],$wechat_info['access_token']);
		}else{
			$wechat_auth = new WechatAuth($wechat_info['appid'],$wechat_info['secret']);
			$access_token = $wechat_auth->getAccessToken();
			
			/*把重新获取access_token插入数据库*/
			$data['access_token'] = $access_token['access_token'];
			$data['expires_in'] = $access_token['expires_in']+time();
			$where['id'] = array('eq',$_SESSION['user']['id']);
			D('User')->where($where)->save($data);
		}
		
		$send_button = $wechat_auth->menuCreate($menu_list);
		if(0 == $send_button['errcode'] && 'ok' == $send_button['errmsg']){
			$this->success('同步成功！');
		}else{
			$this->error('同步失败！错误代码：'.$send_button['errcode'].'，错误信息：'.$send_button['errmsg']);
		}
	}
	/*组装自定义菜单数组*/
	private function foreachCustomMenu($data,$pid=0){
		$result = array();
		foreach($data as $key=>$val){
			if($val['parent_id'] == $pid){
				$res = $this->foreachCustomMenu($data,$val['id']);
				if(!$res){
					$menu[$key]['type'] = $val['click_type'];				
				}
				$menu[$key]['name'] = $val['menu_name'];
				if($res){
					$menu[$key]['sub_button'] = array_values($res);				
				}
				if('click' == $val['click_type']){
					$menu[$key]['key'] = $val['menu_key'];
				}elseif('view' == $val['click_type']){
					$val['menu_url'] ? $menu[$key]['url'] = $val['menu_url'] : NULL;
				}
			}
		}
		
		return array_values($menu);
	}
	
	public function delPicture(){
		$id = I('get.id');
		$where['id'] = array('eq',$id);
		$result = D('MenuDesc')->where($where)->setField('file',NULL);
		if($result){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');		
		}
	}

}