<?php
namespace Home\Model;
use Think\Model;
class FirstFocusModel extends Model{
	protected $tableName = 'first_focus';
	
	/*获取首次关注回复信息*/
	public function getFirstFocusInfo($focus_type){
		$where['focus_type'] = array('eq',$focus_type);
		$result = $this->field('title,desc,url,file')
					 ->where($where)
					 ->select();
		return $result;
	}
}