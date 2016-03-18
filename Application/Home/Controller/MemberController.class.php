<?php
namespace Home\Controller;
use Think\Controller;
use Vendor\Wechat\JsSdk;
class MemberController extends CommonController{
	public function index(){
		$user_id = I('get.user_id');
		if($_SESSION['mid']){
			$footer_column = D('Column')->getFooterList($user_id);
			$this->assign('footer',$footer_column);
		
			$desc = D('Raise')->getRaiseDesc($_SESSION['mid']);
			$money = 0;
			foreach($desc as $key=>$val){
				$money += $val['money'];
			}
			$this->assign('money',$money);
			$this->display();
		}else{
			$this->redirect('Member/login',array('user_id'=>$user_id));
		}
	}
	
	public function register(){
		
		$this->display();
	}
	
	public function vouchers(){
		
		$this->display();	
	}
	
	public function account(){
	
		$this->display();	
	}
	
	public function invite(){
		$user_id = I('get.user_id');
		$user_info = D('Admin/User')->getWechatInfo($user_id);
		$time = $user_info['expires_in']-time();
		$ticket_time = $user_info['ticket_expires_in']-time();
		
		if(0 < $time && 0 < $ticket_time){
			$js_sdk = new JsSdk($user_info['appid'] ,$user_info['secret'] ,$user_info['access_token'] ,$user_info['ticket']);		
		}else{
			$js_sdk = new JsSdk($user_info['appid'] ,$user_info['secret']);
			$access_token = $js_sdk->getAccessToken();	
			/*把重新获取access_token插入数据库*/
			$data['access_token'] = $access_token['access_token'];
			$data['expires_in'] = $access_token['expires_in']+time();
			$where['id'] = array('eq',$user_id);
			$save_data = D('Admin/User')->where($where)->save($data);
			if($save_data){
				$ticket = $js_sdk->getJsApiTicket();
				/*把重新获取ticket插入数据库*/
				$arr['ticket'] = $ticket['ticket'];
				$arr['ticket_expires_in'] = $ticket['expires_in']+time();
				$save_arr = D('Admin/User')->where($where)->save($arr);
			}
		}
		$signature = $js_sdk->getSignPackage();
		I('get.mid') ? $mid = I('get.mid') : $mid = $_SESSION['mid'];
		if($mid){
			$signature['link'] = DOMAIN_NAME.U('Member/register',array('user_id'=>$user_id,'mid'=>$mid));
			$signature['title'] = '汇金开富';
			$signature['img'] = DOMAIN_NAME.'/Public/Home/image/123.png';
			$signature['desc'] = '汇金开富注册...';
			$this->assign('signature',$signature);
			$this->display();
		}else{
			throw new \Exception('请先登录！');
		}
	}
	
	public function agreement(){
		$user_info = D('Admin/User')->getUserInfo(I('get.user_id'));
		$this->assign('agreement',$user_info['agreement']);
		$this->display();	
	}
	
	public function feedback(){
		if(IS_AJAX){
			$data['user_id'] = I('post.user_id');
			$data['contact'] = I('post.contact');
			$data['feed_content'] = I('post.feed_content');
			$model = D('Feedback');
			if($model->create($data)){
				$result = $model->add();
				if($result){
					$res['status'] = 200;
					$res['message'] = '提交成功！';
				}else{
					$res['status'] = 201;
					$res['message'] = '提交失败！';
				}
			}else{
				$res['status'] = 202;
				$res['message'] = $model->getError();		
			}
			$this->ajaxReturn($res);
		}else{
			$this->display();		
		}
	}
}