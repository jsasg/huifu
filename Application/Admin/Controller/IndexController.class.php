<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
		$model = D('Member');
		$member = $model->getMemberList();
		
		$mid_array = array();
		foreach($member['data'] as $key=>$val){
			$mid_array[] .= $val['id'];
		}
		$where['mid'] = array('in',implode(',', $mid_array));
		$count = M('raise_desc')->field('mid,sum(money) as money')->where($where)->group('mid')->select();
		
		foreach($count as $key=>$val){
			$count[$val['mid']] = $val;
			unset($count[$key]);
		}
		foreach($member['data'] as $key=>$val){
			$member['data'][$key]['raise'] = 	$count[$val['id']]['money'];	
		}
		
		$this->assign('list',$member['data']);
		$this->assign('page',$member['page']);
		$this->display();
    }
}