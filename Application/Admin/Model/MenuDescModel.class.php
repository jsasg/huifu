<?php
namespace Admin\Model;
use Think\Model;
class MenuDescModel extends Model{
	protected $tableName = 'menu_desc';
	protected $_validate = array(
		array('menu_id','require','栏目错误!'), 
		array('menu_title','require','标题不能为空!'), 
		array('file','require','图片不能为空!'),
		//array('menu_desc','require','描述不能为空!'),
	);

	public function getMenuDesc($menu_id){
		$where['menu_id'] = array('eq',$menu_id);
		$res = $this->field('id,menu_id,menu_title as title,menu_desc as `desc`,file,menu_url as url,url_desc,focus_type')->where($where)->select();
		$result = array();
		foreach ($res as $key => $val) {
			if('pictures' == $val['focus_type']){
				$result[$val['focus_type']][] = $val;
			}else{
				$result[$val['focus_type']] = $val;
			}
			unset($res[$key]);
		}
		return $result;
	}
}