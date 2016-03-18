<?php
namespace Admin\Model;
use Think\Model;
class FinanceOrderModel extends Model{
	protected $tableName = 'finance_order';
	
	public function getFinanceOrderList(){
		$where['b.user_id'] = array('eq',$_SESSION['user']['id']);
		$where['a.id'] = array('gt',0);
		
		$count = $this->alias('a')->join('JOIN app_finance_goods b ON a.finance_id=b.id')
							->where($where)
							->count();
							
		$Page = new \Think\Page($count,25);
		$Page->setConfig('header','<span>第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
		$Page->setConfig('prev','上一页');
    		$Page->setConfig('next','下一页');
   		$Page->setConfig('last','末页');
   	 	$Page->setConfig('first','首页');
   	 	$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
   	 	
   	 	$result['page'] = $Page->show();
		$result['data'] = $this->alias('a')->field('a.id,b.goods_name,a.real_name,a.mobile,a.create_time')
							->join('JOIN app_finance_goods b ON a.finance_id=b.id')
							->where($where)
							->order('a.create_time')
							->limit($Page->firstRow.','.$Page->listRows)
							->select();
		return $result;
	}
}