<?php
namespace Admin\Model;
use Think\Model;
class FeedBackModel extends Model{
	protected $tableName = 'feedback';
	
	public function getFeedBackList($user_id){
		$where['user_id'] = array('eq',$user_id);
		$count = $this->where($where)->count();
		$Page = new \Think\Page($count,15);
		$Page->setConfig('header','<span>第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
		$Page->setConfig('prev','上一页');
    		$Page->setConfig('next','下一页');
   		$Page->setConfig('last','末页');
   	 	$Page->setConfig('first','首页');
   	 	$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$result['page'] = $Page->show();
		$result['data'] = $this->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		return $result;
	}
}