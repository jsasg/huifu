<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController{
	/**
	* 文章列表页
	*/
	public function index(){
		$article_model = D('Article');
		$article_list = $article_model->getArticleList();

		$this->assign('page',$article_list['page']);
		$this->assign('list',$article_list['data']);
		$this->display();
	}
	
	/**
	* 文章编辑方法
	*/
	public function add(){
		if(IS_POST){
			$data['user_id'] = $_SESSION['user']['id'];
			$data['column_id'] = I('post.article_column');
			$data['article_title'] = I('post.article_title');
			$data['article_key'] = str_replace('，', ',', I('post.article_key'));
			$data['article_source'] = I('post.article_source');
			$data['article_sort'] = I('post.article_sort');
			$_FILES['article_picture']['name'] ? $data['article_picture'] = $this->upload($_FILES['article_picture']) : '';
			$data['article_content'] = I('post.content');
			$data['show_title'] = I('post.show_title');

			$article_id = I('post.id');
			$article_model = D('Article');
			
			if($article_model->create($data)){
				if(!$article_id){
					$result = $article_model->add();			
				}else{
					$where['id'] = array('eq',$article_id);
					$result = $article_model->where($where)->save();			
				}
				if($result){
					$this->success('提交成功！');			
				}else{
					$this->error('提交失败！');
				}
			}else{
				$this->error($article_model->getError());
			}
		}else{
			$res = D('Column')->getColumnList($_SESSION['user']['id']);
			$data = array();
			foreach ($res as $key => $val) {
				$data[$key]['id'] = $val['id'];
				$data[$key]['column_name'] = $val['column_name'];
				$data[$key]['parent_id'] = $val['parent_id'];
			}
			$parent_column = $this->recursionData($data,0,'parent_id');
			
			$article_id = I('get.id');
			$article_info = D('Article')->getArticleRow($article_id);
			
			$this->assign('article_column',$parent_column);

			$this->assign('article',$article_info);
			$this->display();		
		}
	}
	/**
	*删除图片操作
	*/
	public function delPicture(){
		$id = I('get.id');
		$model = D('Article');
		$where['id'] = array('eq',$id);
		$result = $model->where($where)->setField('article_picture',null);
		if($result){
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}

	public function ueditor(){
        		$data = new \Org\Util\Ueditor();
       		 echo $data->output();
    	}
}