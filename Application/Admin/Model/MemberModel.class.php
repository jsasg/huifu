<?php
namespace Admin\Model;
use Think\Model;
class MemberModel extends Model{
	protected $tableName = 'member';
	protected $_validate = array(
		array('login_name','require','登录名不能为空！'),
		array('password','require','密码不能为空！'),
		array('real_name','require','真实姓名不能为空！'),
		array('mobile','require','手机号不能为空！'),
	);
	/**
	  * @param integer $parent_id 会员上级ID
	  *@return array
	  */
	public function getMemberList($parent_id){
		$where['user_id'] = array('eq',$_SESSION['user']['id']);
		if($parent_id) {
			$where['parent_id'] = array('eq',$parent_id);
		}
		$count = $this->where($where)->count();
		
		$Page = new \Think\Page($count,13);
		$Page->setConfig('header','<span>第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
		$Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
   		$Page->setConfig('last','末页');
   	 	$Page->setConfig('first','首页');
   	 	$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
   	 	
   	 	$result['page'] = $Page->show();
   	 	$result['data'] = $this->where($where)
   	 					      ->order('create_time desc')
   	 					      ->limit($Page->firstRow.','.$Page->listRows)
   	 					      ->select();
   	 	return $result;
	}
	
	/*获取会员详情*/
	public function getMemberRow($mid){
		$where['id'] = array('eq',$mid);
		$result = $this->where($where)->find();
		return $result;	
	}
}