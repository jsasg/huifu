<?php
namespace Home\Model;
use Think\Model;
class ArticleModel extends Model{
	protected $tableName = 'article';
	
	/*根据栏目ID获取文章*/
	public function getArticleList($column_id){
		$where['column_id'] = array('eq',$column_id);
		$result = $this->where($where)->select();
		return $result;	
	}
	/*根据文章ID获取文章详情*/
	public function getArticleRow($article_id){
		$where['id'] = array('eq',$article_id);
		$result = $this->where($where)->find();
		return $result;	
	}
}