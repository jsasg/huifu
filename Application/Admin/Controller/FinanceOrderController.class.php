<?php
namespace Admin\Controller;
use Think\Controller;
class FinanceOrderController extends CommonController{
	public function index(){
		$finance_order_model = D('FinanceOrder');
		$finance_order_list = $finance_order_model->getFinanceOrderList();
		
		$this->assign('page',$finance_order_list['page']);
		$this->assign('list',$finance_order_list['data']);
		$this->display();
	}
	
	public function detail(){
		
		$this->display();	
	}
}