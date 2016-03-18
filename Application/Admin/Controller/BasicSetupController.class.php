<?php
namespace Admin\Controller;
use Think\Controller;
class BasicSetupController extends CommonController{
	public function index(){
		if(IS_POST){
			$data['login_name'] = I('post.login_name');
			I('post.password') ? $data['password'] = MD5(I('post.password')) : '';
			$data['contact'] = I('post.mobile');
			$data['address'] = I('post.address');
			$data['user_desc'] = I('post.content');
			$data['agreement'] = I('post.agreement');
			$model = D('User');
			if($model->create($data)){
				$where['id'] = array('eq',$_SESSION['user']['id']);
				$result = $model->where($where)->save();
				if($result){
					$this->success('保存成功！');
				}else{
					$this->error('保存失败！');
				}
			}else{
				$this->error($model->getError());			
			}
		}else{
			$user_result = D('User')->getUserInfo($_SESSION['user']['id']);
			$this->assign('user',$user_result);
            $this->assign('adr_province',D('Area')->getAddress(1));
            $this->assign('adr_city',D('Area')->getAddressOnCode($user_result['province']));
            $this->assign('adr_area',D('Area')->getAddressOnCode($user_result['city']));
			$this->display();
		}
	}
}