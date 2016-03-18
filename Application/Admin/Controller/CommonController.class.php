<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
	public function _initialize(){
		if(!$_SESSION['user']['id']){
			$this->redirect('Admin/Public/login');
		}
        
        // 输出左边菜单和权限判断
        $menu = $this->getLeftMenuList();
        // 输出左边菜单
        $left_menu_list = array();
        foreach($menu['left_menu'] as $key=>$val){
            $left_menu_list[$key] = $val;
            if($val['controller'] && $val['action']){
                $left_menu_list[$key]['url'] = U($val['controller'].'/'.$val['action']);
            }
        }
        $this->assign('left_menu',recursive($left_menu_list));
        
        // 输出顶部菜单
        $top_menu_list = array();
        $level_2 = array();
        foreach($menu['top_menu'] as $key=>$val){
            if(1 == $val['level']){
                $top_menu_list[] = $val;
            }else{
                $level_2[$val['parent_id']] = $val;
            }
        }
        foreach($top_menu_list as $key=>$val){
            unset($top_menu_list[$key]['controller']);
            unset($top_menu_list[$key]['action']);
            $top_menu_list[$key]['url'] = U($level_2[$val['id']]['controller'].'/'.$level_2[$val['id']]['action']);
        }
        $this->assign('top_menu',recursive($top_menu_list));
        
        // 权限判断
        if(1 == $_SESSION['user']['id']){
            $where['controller'] = array('eq',CONTROLLER_NAME);
            $where['action'] = array('eq',ACTION_NAME);
            $check_node = D('Node')->where($where)->find();
            if($check_node){
                if(!(in_array(CONTROLLER_NAME,$menu['auth']['controller'])) || !(in_array(ACTION_NAME,$menu['auth']['action']))){
                    $this->error('您没有当前操作权限，请与管理员联系！');
                }
            }
        }
        
	}
    
    // 获取左菜单列表
    public function getLeftMenuList(){
        $model = D('RoleNode');
        if(1 != $_SESSION['user']['id']){
            $where['a.id'] = array('eq',$_SESSION['user']['id']);
        }
        $where['c.status'] = array('eq',1);
        $info = $model->alias('a')->distinct(true)
                        ->field('c.id,c.pos,c.title,c.icon,c.module,c.controller,c.action,c.parent_id,c.level,c.display')
                        ->join('LEFT JOIN app_user b ON a.role_id=b.role_id')
                        ->join('RIGHT JOIN app_node c ON a.node_id=c.id')
                        ->where($where)
                        ->order('c.sort')
                        ->select();
        $result = array();
        foreach($info as $key=>$val){
            if(1 == $val['display']){
                if('LEFT' == $val['pos']){
                    $result['left_menu'][] = $val;
                }else{
                    $result['top_menu'][] = $val;
                }
            }
            $result['auth']['controller'][] = $val['controller'];
            $result['auth']['action'][] = $val['action'];
        }
        $result['auth']['controller'] = array_filter(array_unique($result['auth']['controller']));
        $result['auth']['action'] = array_filter(array_unique($result['auth']['action']));
        return $result;
    }
    
	/**
	 * 单个文件上传
	 * @param  resource $file 要上传的文件
	 * @return array 上传后图片ID数组
	 */
	public function upload($file){
		$config = array(
		    'maxSize'    =>    3145728,
		    'rootPath'   =>    './Public/Uploads/images/',
		    'savePath'   =>    '',
		    'saveName'   =>    array('uniqid',''),
		    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg','mp3'),
		    'autoSub'    =>    true,
		    'subName'    =>    array('date','Ym'),
		);

		$upload = new \Think\Upload($config);// 实例化上传类

		$info = $upload->uploadOne($file);// 上传单个文件
		if(!$info) {
			exit($upload->getError());// 上传错误提示错误信息
		}else{
			return $info['savepath'].$info['savename'];
		}
	}
	/**
	 * 递归处理数据
	 * @return [type] [description]
	 */
	public function recursionData($data,$pid=0,$node){//commoent_id
		$result = array();
		foreach ($data as $key=>$val) {
			if($val[$node] == $pid){
				$recurl = $this->recursionData($data,$val['id'],$node);
				$recurl ? $val['subNode']=$recurl : '';
				$result[] = $val;
			}
		}
		return $result;
	}
	/**
	 * 公共删除方法
	 * 
	 */
	public function delete(){
		$id = I('get.id');
		if(is_array($id)){
			$where['id'] = array('in',implode(',', $id));
		}else{
			$where['id'] = array('eq', $id);
		}
		$sift = array('Member','Advert' , 'Activity', 'Article','Raise','RealTimeNews','FirstFocus','MenuDesc','Order','FinanceOrder','Feedback');
		$model = D(CONTROLLER_NAME);
		if(in_array(CONTROLLER_NAME, $sift)){
			$result = $model->where($where)->delete();
			if($result){
				$this->success('删除成功！');
			}else{
				$this->error('删除失败！');
			}
		}else{
			$map['parent_id'] = array('eq',$id);
			$parent = $model->where($map)->find();
			if(!$parent){
				$result = $model->where($where)->delete();
				if($result){
					$this->success('删除成功！');
				}else{
					$this->error('删除失败！');
				}	
			}else{
				$this->error('该条目下已有二级条目，不能删除！');
			}
		}
	}
    
    // 公共删除缩略图方法
    public function delPicture(){
        $id = I('get.id');
        if(is_array($id)){
			$where['id'] = array('in',implode(',', $id));
		}else{
			$where['id'] = array('eq', $id);
		}
        $sift = array('ProductClass');
		$model = D(CONTROLLER_NAME);
		if(in_array(CONTROLLER_NAME, $sift)){
			$result = $model->where($where)->setField('picture',NULL);
			if($result){
				$this->success('删除成功！');
			}else{
				$this->error('删除失败！');
			}
		}else{
            $this->error('非法操作！');
        }
    }
	
	public function createHelperUrl($domain_name){
		$column = D('Column')->createCustomColumnUrl($domain_name);
		$helper_url[0]['url_type'] = '栏目链接'; 
		$helper_url[0]['url'] = $column;
		$helper_url[1]['url_type'] = '功能模块';
		$helper_url[1]['url'][0] = array(
								'column_url' => $domain_name.'/index.php/Home/Index/index/user_id/'.$_SESSION['user']['id'],
								'url_desc' => '网站首页',
							);
		$helper_url[1]['url'][1] = array(
								'column_url' => $domain_name.'/index.php/Home/Member/register/user_id/'.$_SESSION['user']['id'],
								'url_desc' => '会员注册',
							);
		$helper_url[1]['url'][2] = array(
								'column_url' => $domain_name.'/index.php/Home/Member/login/user_id/'.$_SESSION['user']['id'],
								'url_desc' => '会员登录',
							);
		$helper_url[1]['url'][3] = array(
								'column_url' => $domain_name.'/index.php/Home/Member/invite/user_id/'.$_SESSION['user']['id'],
								'url_desc' => '我要邀请',
							);
		$helper_url[1]['url'][4] = array(
								'column_url' => $domain_name.'/index.php/Home/Activity/index/user_id/'.$_SESSION['user']['id'],
								'url_desc' => '活动列表',
							);
		$helper_url[1]['url'][5] = array(
								'column_url' => $domain_name.'/index.php/Home/Product/index/user_id/'.$_SESSION['user']['id'],
								'url_desc' => '产品列表',
							);
		$helper_url[2]['url_type'] = '促售模块';
		$helper_url[2]['url'][0] = array(
								'column_url' => $domain_name.'/index.php/Home/Raise/index/user_id/'.$_SESSION['user']['id'],
								'url_desc' => '帮他募集',
							);
		$helper_url[2]['url'][1] = array(
								'column_url' => $domain_name.'/index.php/Home/RealTimeNews/index/user_id/'.$_SESSION['user']['id'],
								'url_desc' => '实时消息',
							);
		return $helper_url;
	}
    
    public function ajaxGetAddress(){
        $address = D('Area')->getAddressOnCode(I('code'));
        $html = '<option value="">请选择......</option>';
        foreach($address as $key=>$val){
            $html .= '<option value="'.$val['code'].'">'.$val['adr_name'].'</option>';
        }
        $this->ajaxReturn($html);
    }
}