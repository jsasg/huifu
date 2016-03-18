<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends CommonController{
	public function index(){
		$user_id = I('get.user_id');
		$product = D('Product')->getProductList($user_id);
		$footer_column = D('Column')->getFooterList($user_id);
		$this->assign('footer',$footer_column);
		$this->assign('list',$product);
		$this->display();	
	}
	
	public function detail(){
		$product_id = I('get.id');
		$product_detail = D('Product')->getProductDetail($product_id);
		$this->assign('product',$product_detail);
		$this->display();	
	}
	
	public function buy(){
		if(IS_AJAX){
			$data['finance_id'] = I('post.finance_id');
			$data['real_name'] = I('post.real_name');
			$data['mobile'] = I('post.mobile');
			$model = D('Order');
			if($model->create($data)){
				$result = $model->add();
				if($result){
					$res['status'] = 200;
					$res['message'] = '申购成功！';
				}else{
					$res['status'] = 0;
					$res['message'] = '申购失败！';
				}
			}else{
				$res['status'] = 203;
				$res['message'] = $model->getError();	
			}
			$this->ajaxReturn($res);
		}else{
			$this->display();
		}	
	}
}