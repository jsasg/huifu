<?php
namespace Admin\Event;
class PublicEvent extends CommonEvent{
	/**
	 * 登录时写入最后登录时间及最后登录IP操作
	 */
	public function loginHandle($user_id){
		$data['last_login_ip'] = get_client_ip();
		$data['login_count'] =  array('exp','login_count+1');
		$login_result = D('User')->where(array('id'=>$user_id))->save($data);
		if($login_result){
			return true;
		}else{
			return false;
		}
	}
}