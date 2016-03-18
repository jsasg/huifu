<?php
namespace Home\Model;
use Think\Model;
class ActivityApplyModel extends Model{
	protected $tableName = 'activity_apply';
	protected $_validate = array(
		array('real_name','require','真实姓名不能为空！'),
		array('mobile','isMobile','手机号格式不正确！','0','function'),
	);
}