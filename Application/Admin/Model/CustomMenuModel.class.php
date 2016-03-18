<?php
namespace Admin\Model;
use Think\Model;
class CustomMenuModel extends Model{
	protected $tableName = 'custom_menu';
	protected $_validate = array(
			array('menu_name','require','菜单名不能为空!'),
		);

	/**
	 * @param integer $_id 菜单ID
	 * @return array
	 */
	public function getCustomMenu($_id=0){
		if($_id){
			$where['id'] = array('eq',$_id);
		}
		$where['user_id'] = array('eq',$_SESSION['user']['id']);
		$result = $this->where($where)->order('menu_sort')->select();
		return $result;
	}
}