<?php
namespace Admin\Model;
use Think\Model;
class FinanceModel extends Model{
	protected $tableName = 'finance_goods';
	protected $_validate = array(
		array('goods_name','require','产品名称不能为空！'),
		array('product_properties','require','产品性质不能为空！'),
		array('invest_timelimit','require','发行规模不能为空！'),
		array('issuing_scale','require','发行规模不能为空！'),
		array('operation_scale','require','运行规模不能为空！'),
		array('product_level','require','产品分级不能为空！'),
		array('matching','require','投资标配比不能为空！'),
		array('allot_ratio','require','投顾分红比例不能为空！'),
		array('tranche','require','发行份额不能为空！'),
		array('cost','require','费用不能为空！'),
		array('start_time','require','申购不能为空！'),
		array('end_time','require','费用不能为空！'),
	);
	/**
	* 获取单个金融产品信息
	*/
	public function getFinanceRow($finance_id){
		$where['id'] = array('eq',$finance_id);
		$result = $this->where($where)->find();
		return $result;	
	}
	
	public function getFinanceList(){
		$where['user_id'] = array('eq',$_SESSION['user']['id']);
		
		$count = $this->where($where)->count();
		$Page = new \Think\Page($count,25);
		$Page->setConfig('header','<span>第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
		$Page->setConfig('prev','上一页');
    		$Page->setConfig('next','下一页');
   		$Page->setConfig('last','末页');
   	 	$Page->setConfig('first','首页');
   	 	$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$result['page'] = $Page->show();
		$result['data'] = $this->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		return $result;
	}
}