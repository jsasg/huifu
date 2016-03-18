<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller{
	/*登录*/
	public function login(){
		if(IS_POST){
			$check_result = D('User')->checkLogin(I('post.'));
			if($check_result){
				$event = A('Admin/Public','Event');
				if($event){
					$handle = $event->loginHandle($check_result['id']);
					if($handle){
						session('user',$check_result);
						$this->success('登录成功！',U('Index/index'));
					}else{
						$this->error('登录失败！');
					}
				}else{
					$this->error('事件控制器不错误！');
				}
			}else{
				$this->error('账号或密码错误！');
			}
		}else {
			$this->display();
		}
	}

	public function logout(){
		session(null);
		$this->redirect('Admin/Public/login');
	}
}