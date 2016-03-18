<?php
namespace Admin\Model;
use Think\Model;
class RealTimeNewsModel extends Model{
	protected $tableName = 'real_time_news';
	protected $_validate = array(
		array('title','require','标题不能为空！'),
		array('content','require','发布内容不能为空！'),
	);
	
	public function getNewsList($user_id){
		$where['user_id'] = array('eq',$user_id);
		$result = $this->where($where)->order('id desc')->select();
		return $result;	
	}
	
	public function getLastData($user_id,$news_id){
		$where['user_id'] = array('eq',$user_id);
		$where['id'] = array('gt',$news_id);
		$result = $this->where($where)->order('id desc')->select();
		return $result;
	}
}