<?php
namespace Admin\Controller;
use Think\Controller;
class FeedbackController extends CommonController{
	public function index(){
		$user_id = $_SESSION['user']['id'];
		$list = D('FeedBack')->getFeedBackList($user_id);
		$this->assign('page',$list['page']);
		$this->assign('list',$list['data']);
		$this->display();
	}
}