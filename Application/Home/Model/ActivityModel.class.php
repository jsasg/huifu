<?php
namespace Home\Model;
use Think\Model;
class ActivityModel extends Model{
	protected $tableName = 'activity';
	
	public function getActivityList($user_id){
		$where['user_id'] = array('eq',$user_id);
		$where['is_open'] = array('eq',1);
		$field = 'id,user_id,activity_name,activity_picture';
		$result = $this->field($field)->where($where)->order('activity_sort asc')->select();
		return $result;
	}
	
	public function getActivityDetail($activity_id){
		$where['id'] = array('eq',$activity_id);
		$result = $this->where($where)->find();
		return $result;
	}
}