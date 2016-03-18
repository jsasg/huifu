<?php
namespace Admin\Controller;
use Think\Controller;
class FinanceController extends CommonController{
	
	public function index(){
		$finance_model = D('Finance');
		$finance_list = $finance_model->getFinanceList();
		$this->assign('page',$finance_list['page']);
		$this->assign('list',$finance_list['data']);
		$this->display();	
	}
	
	public function add(){
		if(IS_POST){
			$data['user_id'] = $_SESSION['user']['id'];
			$data['goods_name'] = I('post.finance_name');
			$data['finance_key'] = str_replace('，', ',', I('post.finance_key'));
			$data['product_properties'] = I('post.product_properties');
			$data['invest_timelimit'] = I('post.invest_timelimit');
			$data['issuing_scale'] = I('post.issuing_scale');
			$data['operation_scale'] = I('post.operation_scale');
			$data['product_level'] = I('post.product_level');
			$data['matching'] = I('post.matching');
			$data['allot_ratio'] = I('post.allot_ratio');
			$data['tranche'] = I('post.tranche');
			$data['cost'] = I('post.cost');
			$data['start_time'] = I('post.start_time');
			$data['end_time'] = I('post.end_time');
			$data['is_novice'] = I('post.is_novice');
			$data['project_overview'] = I('post.project_overview');
			$data['project_desc'] = I('post.project_desc');
			$data['funds_safe'] = I('post.funds_safe');

			$finance_id = I('post.id');
			$finance_model = D('Finance');
			if($finance_model->create($data)){
				if(!$finance_id){
					$result = $finance_model->add();
				}else{
					$where['id'] = array('eq',$finance_id);
					$result = $finance_model->where($where)->save();
				}
				if($result){
					$this->success('提交成功！');
				}else{
					$this->error('提交失败！');				
				}
			}else{
				$this->error($finance_model->getError());			
			}
		}else{
			$finance_id = I('get.id');
			$finance_model = D('Finance');
			$finance_info = $finance_model->getFinanceRow($finance_id);
			$this->assign('finance',$finance_info);
			$this->display();		
		}
	}
}