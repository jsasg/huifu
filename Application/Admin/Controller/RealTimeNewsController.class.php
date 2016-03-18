<?php
namespace Admin\Controller;
use Think\Controller;
class RealTimeNewsController extends CommonController{
	public function index(){
		if(IS_POST){
			$data['user_id'] = $_SESSION['user']['id'];
			$data['title'] = I('post.title');
			$data['content'] = I('post.content');
			$model = D('RealTimeNews');
			if($model->create($data)){
				$result = $model->add();
				if($result){
					$this->success('发布成功！');
				}else{
					$this->error('发布失败！');				
				}
			}else{
				$this->error($model->getError());			
			}
		}else{
			$this->assign('list',D('RealTimeNews')->getNewsList($_SESSION['user']['id']));
			$this->display();
		}
	}
}