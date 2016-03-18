<?php
namespace Admin\Model;
use Think\Model;
class RaiseModel extends Model{
	protected $tableName = 'raise';
	protected $_validate = array(
		array('user_id','require','页面出错了！'),
		array('raise_top','require','募集上限不能为空！'),
		array('raise_count','require','募集次数不能为空！'),
		array('content','require','募集说明不能为空！'),
	);
	
	/*获取募集列表 */
	public function getRaiseList(){
		$where['user_id'] = array('eq',$_SESSION['user']['id']);
		$count = $this->where($where)->count();
		$Page = new \Think\Page($count,25);
		$Page->setConfig('header','<span>第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
		$Page->setConfig('prev','上一页');
    		$Page->setConfig('next','下一页');
   		$Page->setConfig('last','末页');
   	 	$Page->setConfig('first','首页');
   	 	$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
   	 	
   	 	$result['show'] = $Page->show();
		$result['data'] = $this->where($where)
						      ->order('create_time desc')
						      ->limit($Page->firstRow.','.$Page->listRows)
						      ->select();
		return $result;
	}
	
	/*获取募集详情*/
	public function getRaiseRow($raise_id){
		$where['id'] = array('eq',$raise_id);
		$result = $this->where($where)->find();
		return $result;	
	}
}