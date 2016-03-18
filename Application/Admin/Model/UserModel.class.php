<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
	protected $tableName = 'user';
	protected $_validate = array(
			array('wechat_account','require','公众平台用户名不通为空!'), 
			array('wechat_password','require','公众平台密码不通为空!'),
			array('init_id','require','公众平台原始ID不通为空!'),
			array('appid','require','APPID不通为空!'),
			array('secret','require','SECRET不通为空!'), 
		);
	/**
	 * @param array $login_data 要登录的账号密码
	 * @return array
	 */
	public function checkLogin($login_data){
		$where['login_name'] = array('eq',$login_data['login_name']);
		$where['password'] = array('eq',MD5($login_data['password']));
		$result = $this->where($where)->find();
		return $result;
	}

	public function getWechatInfo($user_id){
		$where['id'] = array('eq',$user_id);
		$result = $this->field('id,wechat_account,wechat_password,init_id,appid,secret,access_token,
                                expires_in,auth_access_token,auth_expires_in,ticket,ticket_expires_in,create_time')
                        ->where($where)
                        ->find();
		return $result;
	}
	
	public function getUserInfo($user_id){
		$where['id'] = array('eq',$user_id);
		$result = $this->where($where)->find();
		return $result;
	}
    
    public function getUserList(){
        $where['id'] = array('gt',0);
        if(1 != $_SESSION['user']['id']){
            $where['parent_id'] = $_SESSION['user']['id'];
        }
        $result = $this->field('id,parent_id,level,user_name,contact,last_login_time,create_time')
                       ->where($where)
                       ->select();
        return $result;
    }
}