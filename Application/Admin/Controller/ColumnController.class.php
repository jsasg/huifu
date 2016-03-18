<?php
namespace Admin\Controller;
use Think\Controller;
class ColumnController extends CommonController{
	public function index(){
		$res = D('Column')->getColumnInfo();
		$data = array();
		foreach ($res['data'] as $key => $val) {
			$data[$key]['id'] = $val['id'];
			$data[$key]['column_name'] = $val['column_name'];
			$data[$key]['column_sort'] = $val['column_sort'];
			$data[$key]['is_open'] = $val['is_open'];
			$data[$key]['is_footer'] = $val['is_footer'];
			$data[$key]['parent_id'] = $val['parent_id'];
		}
		$parent_column = $this->recursionData($data,0,'parent_id');
		$this->assign('list',$parent_column);
		$this->assign('page',$res['page']);
		$this->display();
	}

	/*栏目编辑*/
	public function add(){
		$column_model = D('Column');
		if(IS_POST){
			$data['user_id'] = $_SESSION['user']['id'];
			$data['parent_id'] = I('post.parent_column');
			$data['column_title'] = I('post.column_title');
			$data['column_name'] = I('post.column_name');
			$data['column_sort'] = I('post.column_sort');
			$data['column_icon'] = I('post.column_icon');
			$_FILES['custom_picture']['name'] ? $data['column_custom'] = $this->upload($_FILES['custom_picture']) : '';
			$data['column_bgcolor'] = I('post.column_bgcolor');
			$data['is_open'] = I('post.is_open');
			$data['is_footer'] = I('post.is_footer');
			$data['column_desc'] = I('post.column_desc');
			$data['column_url'] = I('post.column_url');

			$column_id = I('post.id');
			if($column_model->create($data)){
				if(!$column_id){
					$add_column = $column_model->add();
				}else{
					$where['id'] = array('eq',$column_id);
					$add_column = $column_model->where($where)->save();
				}
				if($add_column){
					$this->success('保存成功！');
				}else{
					$this->success('保存失败！');
				}
			}else{
				$this->error($column_model->getError());
			}
		}else{
			$res = $column_model->getColumnList($_SESSION['user']['id']);
			$data = array();
			foreach ($res as $key => $val) {
				$data[$key]['id'] = $val['id'];
				$data[$key]['column_name'] = $val['column_name'];
				$data[$key]['parent_id'] = $val['parent_id'];
			}
			$parent_column = $this->recursionData($data,0,'parent_id');
			$column_info = $column_model->getColumnInfo(I('get.id'));
			$help = $this->createHelperUrl(DOMAIN_NAME);

			$this->assign('parent_column',$parent_column);
			$this->assign('column',$column_info);
			$this->assign('help',$help);
			$this->display();
		}
	}

	/**
	*删除图片操作
	*/
	public function delPicture(){
		$id = I('get.id');
		$model = D('Column');
		$where['id'] = array('eq',$id);
		$result = $model->where($where)->setField('column_custom',null);
		if($result){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
} 