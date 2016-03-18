<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    	public function index(){
    		$user_id = I('get.user_id');
    		$advert_info = D('Admin/Advert')->getAdvertGroup($user_id);
    		$column_info = D('Admin/Column')->getColumnList($user_id);
    		$column_list = array();
    		$footer_list = array();
    		foreach($column_info as $key=>$val){
    			if(1 == $val['is_footer']){
    				$footer_list[] = $val;
    			}else{
				$column_list[] = $val;		
    			}
    		}
    		$this->assign('advert',$advert_info);
    		$this->assign('list',$column_list);
    		$this->assign('footer',$footer_list);
    		$this->display();
   	 }
}