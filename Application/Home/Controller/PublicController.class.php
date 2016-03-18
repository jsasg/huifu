<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller{
	public function register(){
		if(IS_AJAX){
			$data['user_id'] = I('post.user_id');
			$data['parent_id'] = I('post.mid');
			$data['login_name'] = I('post.login_name');
			$data['password'] = MD5(I('post.password'));
			$data['agreement'] = I('post.agreement');
			if('agree' == $data['agreement']){
				$model = D('Member');
				if($model->create($data)){
					$result = $model->add();
					if($result){
						$res['status'] = 200;
						$res['message'] = '注册成功！';
					}else{
						$res['status'] = 0;
						$res['message'] = '注册失败！';
					}
				}else{
					$res['status'] = 103;
					$res['message'] = $model->getError();
				}
			}else{
				$res['status'] = 104;
				$res['message'] = '请认真阅读居间人协议！';
			}
			$this->ajaxReturn($res);
		}else{
			$this->display();		
		}	
	}
	
	public function login(){
		if(IS_AJAX){
			$login_name = I('post.login_name');
			$password = MD5(I('post.password'));
			$data['login_count'] = array('exp','login_count+1');
			$data['last_login_ip'] = get_client_ip();
			$model = D('Member');
			if($model->create($data)){
				$result = $model->checkMember($login_name,$password);
				if($result){
					$map['id'] = array('eq',$result['id']);
					$member_save = $model->where($map)->save();
					session('mid',$result['id']);
					$res['status'] = 200;
					$res['message'] = '登录成功！';
					if('realTimeSend' == I('get.from')){
						$res['url'] = U('RealTimeNews/index',array('user_id'=>$result['user_id'],'mid'=>$result['id']));
					}else{
						$res['url'] = U('Member/index',array('user_id'=>$result['user_id'],'mid'=>$result['id']));
					}
				}else{
					$res['status'] = 0;
					$res['message'] = '登录失败！';	
				}
			}else{
				$res['status'] = 203;
				$res['message'] = $model->getError();			
			}
			$this->ajaxReturn($res);
		}else{
			if($_SESSION['mid']){
				$this->redirect('Member/index',array('user_id'=>I('get.user_id'),'mid'=>$_SESSION['mid']));			
			}
			$this->display();		
		}
	}
}