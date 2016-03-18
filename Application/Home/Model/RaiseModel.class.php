<?php
namespace Home\Model;
use Think\Model;
class RaiseModel extends Model{
	protected $tableName = 'raise';
	
	/*根据用户名获取募集活动*/
	public function getRaiseDetail($user_id){
		$where['user_id'] = array('eq',$user_id);
		$where['is_open'] = array('eq',1);
		$field = 'id,raise_top,raise_count,UNIX_TIMESTAMP(start_time) as start_time,UNIX_TIMESTAMP(end_time) as end_time,raise_picture';
		$result = $this->field($field)->where($where)->find();
		return $result;
	}
	/*根据ID获取募集活动详情*/
	public function getRaiseOnId($raise_id){
		$where['id'] = array('eq',$raise_id);
		$where['is_open'] = array('eq',1);
		$result = $this->where($where)->getField('content');
		return $result;
	}
	/*根据募集活动ID获取募记录*/
	public function getRaiseDesc($mid){
		$where['mid'] = array('eq',$mid);
		$result = M('raise_desc')->where($where)->select();
		return $result;	
	}
	/*根据手机号获取*/
	public function getRaiseOnMobile($mobile){
		$where['mobile'] = array('eq',$mobile);
		$result = M('raise_desc')->where($where)->find();
		return $result;
	}
}