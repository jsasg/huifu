<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends CommonController{
	/*会员列表*/
	public function index(){
		$model = D('Member');
		$member = $model->getMemberList();
		
		$mid_array = array();
		foreach($member['data'] as $key=>$val){
			$mid_array[] .= $val['id'];
		}
		$where['mid'] = array('in',implode(',', $mid_array));
		$count = M('raise_desc')->field('mid,sum(money) as money')->where($where)->group('mid')->select();
		
		foreach($count as $key=>$val){
			$count[$val['mid']] = $val;
			unset($count[$key]);
		}
		foreach($member['data'] as $key=>$val){
			$member['data'][$key]['raise'] = 	$count[$val['id']]['money'];	
		}
		
		$this->assign('list',$member['data']);
		$this->assign('page',$member['page']);
		$this->display();
	}
	
	/*查看会员下一级*/
	public function sub(){
		$user_id = I('get.id');
		$model = D('Member');
		$member = $model->getMemberList($user_id);
		
		$mid_array = array();
		foreach($member['data'] as $key=>$val){
			$mid_array[] .= $val['id'];
		}
		$where['mid'] = array('in',implode(',', $mid_array));
		$count = M('raise_desc')->field('mid,sum(money) as money')->where($where)->group('mid')->select();
		
		foreach($count as $key=>$val){
			$count[$val['mid']] = $val;
			unset($count[$key]);
		}
		foreach($member['data'] as $key=>$val){
			$member['data'][$key]['raise'] = 	$count[$val['id']]['money'];	
		}
		
		$this->assign('list',$member['data']);
		$this->assign('page',$member['page']);
		$this->display();
	}
	/*注册会员*/
	public function add(){
		if(IS_POST){
			$mid = I('post.id');
			$data['user_id'] = $_SESSION['user']['id'];
			$data['login_name'] = I('post.login_name');
			$mid != false ? $data['password'] = I('post.password') : $data['password'] = MD5(I('post.password'));
			$data['real_name'] = I('post.real_name');
			$data['mobile'] = I('post.mobile');
			$data['email'] = I('post.email');
			
			$model = D('Member');
			if($model->create($data)){
				if(!$mid){
					$result = $model->add();
				}else{
					$where['id'] = array('eq',$mid);
					$result = $model->where($where)->save();
				}
				if($result){
					$this->success('保存成功！');				
				}else{
					$this->error('保存失败！');
				}
			}else{
				$this->error($model->getError());
			}
		}else{
			$mid = I('get.id');
			$model = D('Member');
			$result = $model->getMemberRow($mid);
			$this->assign('member',$result);
			$this->display();
		}	
	}
}