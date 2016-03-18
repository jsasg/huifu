<?php
namespace Admin\Model;
use Think\Model;
class ActivityModel extends Model{
	protected $tableName = 'activity';
	protected $_validate = array(
		array('activity_name','require','活动标题不能为空！'),
		array('sign_up_num','require','报名人数不能为空！'),
		array('sign_up_end','require','报名截止时间不能为空！'),
		array('start_time','require','活动开始时间不能为空！'),
		array('end_time','require','活动结束时间不能为空！'),
		array('activity_content','require','活动详情不能为空！'),
	);
	/**
	* 获取单条活动信息
	*/
	public function getActivityRow($activity_id){
		$where['id'] = array('eq',$activity_id);
		$result = $this->where($where)->find();
		return $result;
	}
	/**
	* 获取活动列表
	*/
	public function getActivityList(){
		$where['user_id'] = $_SESSION['user']['id'];
		$count = $this->where($where)->count();
		$Page = new \Think\Page($count,25);
		$Page->setConfig('header','<span>第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
		$Page->setConfig('prev','上一页');
    		$Page->setConfig('next','下一页');
   		$Page->setConfig('last','末页');
   	 	$Page->setConfig('first','首页');
   	 	$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$result['page'] = $Page->show();
		$result['data'] = $this->where($where)->order('activity_sort')->limit($Page->firstRow.','.$Page->listRows)->select();
		return $result;	
	}
	/**
	*@param integer $activity_id 活动ID
	*@return array
	*/
	public function getActivityApply($activity_id){
		$where['activity_id'] = array('eq',$activity_id);
		$table = M('activity_apply');
		$count = $table->where($where)->count();
		$Page = new \Think\Page($count,25);
		$Page->setConfig('header','<span>第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
		$Page->setConfig('prev','上一页');
    		$Page->setConfig('next','下一页');
   		$Page->setConfig('last','末页');
   	 	$Page->setConfig('first','首页');
   	 	$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$result['page'] = $Page->show();
		$result['data'] = $table->where($where)->order('create_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		return $result;
	}
}