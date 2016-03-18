<?php
namespace Home\Model;
use Think\Model;
class MemberModel extends Model{
	protected $tableName = 'member';
	protected $validate = array(
		array('user_id','require','页面错误！'),
		array('login_name','require','用户名不能为空！'),
		array('password','require','密码不能不填！'),
	);
	
	/**
	  *@param string $login_name 会员登录名
	  *@param string $password 会员登密码
	  *@return array
	  */
	public function checkMember($login_name,$password){
		$where['login_name'] = array('eq',$login_name);
		$where['password'] = array('eq',$password);
		$result = $this->field('id,user_id,account,nick_name,real_name,mobile,email,wechat_open_id,wechat_nick_name,wechat_headimgurl')
					->where($where)
					->find();
		return $result;
	}
}