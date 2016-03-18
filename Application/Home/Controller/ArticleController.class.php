<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends CommonController{
	public function index(){
		$column_id = I('get.column_id');
		$article = D('Article')->getArticleList($column_id);
		if(1 == count($article)) {
			$this->redirect('Article/detail',array('article_id'=>$article[0]['id']));
		}else{
			$user_id = I('get.user_id');
			$footer_column = D('Column')->getFooterList($user_id);
			$this->assign('footer',$footer_column);
			$this->assign('list',$article);
			$this->display();
		}
	}
	
	public function detail(){
		$article_id = I('get.article_id');
		$article_detail = D('Article')->getArticleRow($article_id);
		$this->assign('article',$article_detail);
		// print_r($article_detail);
		$this->display();	
	}
}