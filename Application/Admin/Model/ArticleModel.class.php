<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model{
	protected $tableName = 'article';
	protected $_validate = array(
		array('article_title','require','文章标题不能为空！'),
		array('article_content','require','文章内容不能为空'),	
	);
	/**
	* 获取文章列表
	* @return array
	*/
	public function getArticleList(){
		$where['user_id'] = array('eq',$_SESSION['user']['id']);
		$where['id'] = array('gt',0);
		$count = $this->where($where)->count();
		$Page = new \Think\Page($count,25);
		$Page->setConfig('header','<span>第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
		$Page->setConfig('prev','上一页');
    		$Page->setConfig('next','下一页');
   		$Page->setConfig('last','末页');
   	 	$Page->setConfig('first','首页');
   	 	$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
   	 	
		$result['page'] = $Page->show();
		$result['data'] = $this->where($where)->order('article_sort desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		return $result;
	}
	/**
	* 获取单条文章信息
	* @ integer $article_id 文章ID
	* @ return array
	*/
	public function getArticleRow($article_id){
		$where['id'] = array('eq',$article_id);
		$result = $this->where($where)->find();
		return $result;	
	}
}