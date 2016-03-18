<?php
namespace Admin\Controller;
use Think\Controller;
class ActivityController extends CommonController{
	/*
	* 活动列表页
	*/
	public function index(){
		$activity_model = D('Activity');
		$activity_list = $activity_model->getActivityList();
		$this->assign('page',$activity_list['page']);
		$this->assign('list',$activity_list['data']);
		$this->display();
	}
	
	public function add(){
		if(IS_POST){
            $data['user_id'] = $_SESSION['user']['id'];	
			$data['activity_name'] = I('post.activity_title');
			$data['activity_key'] = I('post.activity_key');
			$data['sign_up_num'] = I('post.sign_up_num');
			$data['sign_up_end'] = strtotime(I('post.sign_up_end'));
			$data['start_time'] = strtotime(I('post.start_time'));
			$data['end_time'] = strtotime(I('post.end_time'));
			$data['activity_sort'] = I('post.activity_sort');
			$_FILES['activity_picture']['name'] ? $data['activity_picture'] = $this->upload($_FILES['activity_picture']) : '';
			$data['activity_content'] = I('post.content');
			
			$activity_id = I('post.id');
			$activity_model = D('Activity');
			if($activity_model->create($data)){
				if(!$activity_id){
					$result = $activity_model->add();				
				}else{
					$where['id'] = array('eq',$activity_id);
					$result = $activity_model->where($where)->save();				
				}
				if($result){
					$this->success('提交成功！');
				}else{
					$this->error('提交失败！');				
				}
			}else{
				$this->error($activity_model->getError());		
			}
		}else{
			$activity_id = I('get.id');
			$activity_model = D('Activity');
			$activity_info = $activity_model->getActivityRow($activity_id);
			
			$this->assign('activity',$activity_info);
			$this->display();		
		}
	}
	
	public function apply(){
		$activity_id = I('get.id');
		$list = D('Activity')->getActivityApply($activity_id);
		$this->assign('list',$list['data']);
		$this->assign('page',$list['page']);
		$this->display();
	}

	public function deleteAplly(){
		$id = I('get.id');
		$table = M('activity_apply');
		$where['id'] = array('in',implode(',', $id));
		$result = $table->where($where)->delete();
		if($result){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	/**
	*删除图片操作
	*/
	public function delPicture(){
		$id = I('get.id');
		$model = D('Activity');
		$where['id'] = array('eq',$id);
		$result = $model->where($where)->setField('activity_picture',null);
		if($result){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
}