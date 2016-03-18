<?php
namespace Admin\Model;
use Think\Model;
class ColumnModel extends Model{
	protected $tableName = 'column';
	protected $_validate = array(
			array('column_title','require','头部导航标题不能为空!'), 
			array('column_name','require','栏目名称不能为空!'), 
		);

	public function getColumnInfo($column_id){
		$where['user_id'] = $_SESSION['user']['id'];
		if($column_id){
			$where['id'] = array('eq',$column_id);
			$result = $this->where($where)->find();
		}else{
			$where['eq'] = array('gt',0);
			$count = $this->where($where)->count();
			$Page = new \Think\Page($count,10);
			$Page->setConfig('header','<span>第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
			$Page->setConfig('prev','上一页');
            $Page->setConfig('next','下一页');
   			$Page->setConfig('last','末页');
   	 		$Page->setConfig('first','首页');
   	 		$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
   	 		
   	 		$result['page'] = $Page->show();
			$result['data'] = $this->where($where)->limit($Page->firstRow.','.$Page->listRows)->order('column_sort asc')->select();
		}
		return $result;
	}
	
	public function createCustomColumnUrl($domain_name){
		$where['user_id'] = array('eq',$_SESSION['user']['id']);
		$column_list = $this->field('id,column_name')->where($where)->select();
		$result = array();
		foreach($column_list as $key=>$val){
			$result[$key]['column_url'] = $domain_name.'/index.php/Home/Article/index/user_id/'.$_SESSION['user']['id'].'/id/'.$val['id'];
			$result[$key]['url_desc'] = $val['column_name'];
		}
		return $result;
	}
	/*根据user_id获取栏目列表*/
	public function getColumnList($user_id){
		$where['user_id'] = array('eq',$user_id);
		$where['is_open'] = array('eq',1);
		$result = $this->field('id,parent_id,column_title,column_name,column_desc,column_icon,column_bgcolor,column_custom,column_url,is_footer')
					->where($where)
					->order('column_sort asc')
					->select();
		return $result;
	}
}