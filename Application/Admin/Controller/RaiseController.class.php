<?php
namespace Admin\Controller;
use Think\Controller;
class RaiseController extends CommonController{
	public function index(){
		$model = D('Raise');
		$raise = $model->getRaiseList();

		$this->assign('list',$raise['data']);
		$this->assign('page',$raise['page']);
		$this->display();	
	}
	
	public function add(){
		if(IS_POST){
			$data['user_id'] = $_SESSION['user']['id'];
			$data['raise_top'] =  I('post.raise_top');
			$data['raise_count'] = I('post.raise_count');
			$data['start_time'] = I('post.start_time');
			$data['end_time'] = I('post.end_time');
			$_FILES['raise_picture'] ? $data['raise_picture'] = $this->upload($_FILES['raise_picture']) : '';
			$data['is_open'] = I('post.is_open');
			$data['content'] = I('post.content');
			
			$raise_id = I('post.id');
			$model = D('Raise');
			if($model->create($data)){
				if(!$raise_id){
					$result = $model->add();
				}else{
					$where['id'] = array('eq',$raise_id);
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
			$raise_id = I('get.id');
			$model = D('Raise');
			$result = $model->getRaiseRow($raise_id);
			$this->assign('raise',$result);
			$this->display();
		}
	}
	
	public function delPicture(){
		$raise_id = I('get.raise_id');
		$where['id'] = array('eq',$raise_id);
		$result = D('Raise')->where($where)->setField('raise_picture',NULL);
		if($result){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
}