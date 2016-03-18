<?php
namespace Admin\Controller;
use Think\Controller;
class FirstFocusController extends CommonController{
	public function index(){
		$model = D('FirstFocus');
		$result = $model->getFirstFocusData();
		$help = $this->createHelperUrl(DOMAIN_NAME);
		
		$this->assign('first',$result);
		$this->assign('help',$help);
		$this->display();
	}

	/*首次关注*/
	public function insert(){
		$focus_id = I('post.id');
		$data['user_id'] = $_SESSION['user']['id'];
		$data['focus_type'] = I('post.focus_type');
		$data['title'] = I('post.title');
		$data['desc'] = I('post.desc');
		$_FILES['file'] ? $data['file'] = $this->upload($_FILES['file']) : '';
		$data['url'] = I('post.url');
		I('post.url_desc') ? $data['url_desc'] = I('post.url_desc') : '';

		$user_modeil = D('User');
		$map['id'] = array('eq',$data['user_id']);

		$add_user = $user_modeil->where($map)->setField('focus_type',$data['focus_type']);
		if(false !== $add_user){
			$focus_model = D('FirstFocus');
			switch ($data['focus_type']) {
				case 'text':
					unset($data['title']);
				case 'picture':
				case 'media':
					if($focus_model->create($data)){
						$where['user_id'] = array('eq',$data['user_id']);
						if(!$focus_id){
							$result = $focus_model->add();
						}else{
							$result = $focus_model->where($where)->save();
						}
						if($result){
							$this->success('提交成功！');
						}else{
							$this->success('提交失败1！');
						}
					}else{
						$this->error($focus_model->getError());
					}
					break;
				case 'pictures':
					if($data['title'] && $data['desc'] && $data['file'] && $data['url']){
						if($focus_model->create($data)){
							$result = $focus_model->add();
							if($result){
								$this->success('提交成功！');
							}else{
								$this->success('提交失败！');
							}
						}else{
							$this->error($focus_model->getError());
						}
					}else{
						$this->success('提交成功！');
					}
					break;
				default:
					# code...
					break;
			}
		}else{
			$this->success('提交失败！');
		}
	}
	
	public function delPicture(){
		$id = I('get.id');
		$where['id'] = array('eq',$id);
		$result = D('FirstFocus')->where($where)->setField('file',NULL);
		if($result){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');		
		}
	}
}