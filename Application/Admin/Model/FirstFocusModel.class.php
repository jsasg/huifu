<?php
namespace Admin\Model;
use Think\Model;
class FirstFocusModel extends Model{
	protected $tableName = "first_focus";
	protected $_validate = array(
			array('user_id','require','user_id不能为空!'), 
			array('title','require','标题不能为空!'), 
			array('file','require','图片不能为空!'),
			array('desc','require','描述不能为空!'),
			array('url','require','url不能为空!'),
			array('url_desc','require','url描述不能为空!'),
		);

	public function getFirstFocusData(){
		$where['user_id'] = $_SESSION['user']['id'];
		$result = $this->field('id,title,desc,file,url,focus_type')->where($where)->select();
		foreach ($result as $key => $value) {
			if('pictures' == $value['focus_type']){
				$result[$value['focus_type']][] = $value;
			}else{
				$result[$value['focus_type']] = $value;
			}
			unset($result[$key]);
		}
		return $result;
	}
}