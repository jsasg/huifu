<?php
namespace Home\Model;
use Think\Model;
class FeedbackModel extends Model{
	protected $tableName = 'feedback';
	protected $_validate = array(
		array('user_id','require','页面错误！'),
		array('contact','isMobile','联系不能为空！','0','callback'),
		array('feed_content','require','返馈内容不能为空！'),	
	);
	/**
 	  * 验证手机格式
 	  * @param  int  $tel 手机号
 	  * @return boolean           格式正确return true 否则return fasle
 	  */
	function isMobile($tel){
    		$RegExp = '/^(?:13|15|18|14)[0-9]{9}$/';
   		 return preg_match($RegExp, $tel) ? true : false;
	}
}