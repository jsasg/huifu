<?php
namespace Home\Model;
use Think\Model;
class CustomMenuModel extends Model{
	protected $tableName = 'custom_menu';
	
	public function getCustomMenuOnEventKey($event_key){
		$where['click_type'] = array('eq','click');
		$where['menu_key'] = array('eq',$event_key);
		$result = $this->alias('a')->field('b.id,b.menu_title,b.file,b.menu_url,b.menu_desc,b.focus_type')
					->join('JOIN app_menu_desc b ON a.id=b.menu_id AND a.focus_type=b.focus_type')
					->where($where)
					->select();
		$res['focus_type'] = $result[0]['focus_type'];
		$res['data'] = $result;
		return $res;
	}
}