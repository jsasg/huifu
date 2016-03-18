<?php
namespace Admin\Controller;
use Think\Controller;
class AdvertController extends CommonController{
	public function index(){
		$advert_model = D('Advert');
		$advert_list = $advert_model->getAdvertList();
		$this->assign('page',$advert_list['page']);
		$this->assign('list',$advert_list['data']);
		$this->display();
	}

	public function add(){
		$advert_model = D('Advert');
		if(IS_POST) {
			$data['advert_name'] = I('post.advert_name');
			$data['advert_desc'] = I('post.advert_desc');
			$data['advert_sort'] = I('post.advert_sort');
			$_FILES['advert_picture'] ? $data['advert_picture'] = $this->upload($_FILES['advert_picture']) : '';
			$data['id_open'] = I('post.is_open');
			$data['advert_url'] = I('post.advert_url');
			$data['user_id'] = $_SESSION['user']['id'];
			
			$advert_id = I('post.id');
			if($advert_model->create($data)) {
				if(!$advert_id){
					$result = $advert_model->add();
				}else{
					$where['id'] = array('eq',$advert_id);
					$result = $advert_model->where($where)->save();
				}
				if($result){
					$this->success('提交成功！');
				}else{
					$this->error('提交失败！');
				}
			}else {
				$this->error($advert_model->getError());
			}
		}else{
			$advert_id = I('get.id');
			if($advert_id){
				$advert_info = $advert_model->getAdvertRow($advert_id);
				$this->assign('advert',$advert_info);
			}

			$this->display();
		}
	}
	/**
	*删除图片操作
	*/
	public function delPicture(){
		$id = I('get.id');
		$model = D(CONTROLLER_NAME);
		$where['id'] = array('eq',$id);
		$result = $model->where($where)->setField('advert_picture',null);
		if($result){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
}