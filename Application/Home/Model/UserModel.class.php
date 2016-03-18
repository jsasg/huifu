<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	protected $tableName = 'User';
	
	/*获取用户信息*/
	public function getUserInfo($user_id){
		$where['id'] = array('eq',$user_id);
		$result = $this->where($where)->find();
		return $result;
	}
	
}