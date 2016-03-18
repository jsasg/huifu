<?php
namespace Admin\Controller;
use Think\Controller;
class BindController extends CommonController{
	public function index(){
		$model = D('User');
		$result = $model->getWechatInfo($_SESSION['user']['id']);
		$result['url'] = DOMAIN_NAME.'/index.php/Home/Wechat/index/app/'.$result['id'];
		$result['token'] = strtotime($result['create_time']);
		$this->assign('wechat',$result);
		$this->display();
	}

	public function bindWechat(){
		$data['wechat_account'] = I('post.wechat_account');
		$data['wechat_password'] = I('post.wechat_password');
		$data['init_id'] = I('post.init_id');
		$data['appid'] = I('post.appid');
		$data['secret'] = I('post.secret');

		$model = D('User');
		if($model->create($data)){
			$where['id'] = array('eq',$_SESSION['user']['id']);
			$result = $model->where($where)->save();
			if($result){
				$this->success('绑定成功！');
			}else{
				$this->error('绑定失败！');
			}
		}else{
			$this->error($model->getError());
		}
	}
}