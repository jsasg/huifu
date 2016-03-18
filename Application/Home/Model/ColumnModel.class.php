<?php
namespace Home\Model;
use Think\Model;
class ColumnModel extends Model{
	protected $tableName = 'column';
	
	/*根据用户ID获取底部导航栏目*/
	public function getFooterList($user_id){
		$where['user_id'] = array('eq',$user_id);
		$where['is_open'] = array('eq',1);
		$result = $this->field('id,column_title,column_name,column_desc,column_icon,column_bgcolor,column_custom,column_url,is_footer')
					->where($where)
					->order('column_sort asc')
					->select();
		return $result;
	}
}