<?php
namespace Home\Controller;
use Think\Controller;
class ActivityController extends Controller{
	public function index(){
		$user_id = I('get.user_id');
		$footer_column = D('Column')->getFooterList($user_id);
		$this->assign('footer',$footer_column);
		
		$activity = D('Activity')->getActivityList($user_id);
		$this->assign('list',$activity);
		$this->display();
	}
	
	public function detail(){
		$user_id = I('get.user_id');
		$activity_id = I('get.activity_id');
		
		$detail = D('Activity')->getActivityDetail($activity_id);
		$this->assign('activity',$detail);
		
		$user_id = I('get.user_id');
		$footer_column = D('Column')->getFooterList($user_id);
		$this->assign('footer',$footer_column);
		$this->display();
	}
	
	public function apply(){
		$data['activity_id'] = I('post.id');
		$data['user_id'] = I('post.user_id');
		$data['real_name'] = I('post.name');
		$data['mobile'] = I('post.mobile');
		$activity_model = D('Activity');
		$activity = $activity_model->getActivityDetail($data['activity_id']);
		if(time()>$activity['end_time']){
			$apply_model = D('ActivityApply');
			if($apply_model->create($data)){
				if($apply_model->add()){
					$res['status'] = 200;
					$res['message'] = '报名成功！';
					$res['url'] = U('Activity/detail',array('user_id'=>$data['user_id'],'activity_id'=>$data['activity_id']));
				}else{
					$res['status'] = 203;
					$res['message'] = '报名失败！';
				}
			}else{
				$res['status'] = 204;
				$res['message'] = $apply_model->getError();
			}
		}else{
			$res['status'] = 205;
			$res['message'] = '活动已经结束了！';		
		}
		$this->ajaxReturn($res);
	}
}