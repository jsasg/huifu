<?php
namespace Home\Model;
use Think\Model;
class OrderModel extends Model{
	protected $tableName = 'finance_order';
	protected $_validate = array(
		array('finance_id','require','产品错误！'),
		array('real_name','require','请填写姓名！'),
		array('mobile','isMobile','手机号格式不正确！','0','callback'),
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