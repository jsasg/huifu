<?php
namespace Home\Controller;
use Think\Controller;
class RealTimeNewsController extends CommonController{
	public function index(){
		if($_SESSION['mid']){
			$user_id = I('get.user_id');
			$footer_column = D('Column')->getFooterList($user_id);
			$this->assign('footer',$footer_column);
			
			$news = D('Admin/RealTimeNews')->getNewsList($user_id);
			$_SESSION['news_id'] = $news[0]['id'];
			$this->assign('list',$news);
			$this->display();
		}else{
			$this->redirect('Member/login',array('user_id'=>$user_id,'from'=>'realTimeSend'));
		}
	}
	
	public function realTimeSend(){
		header('Content-Type: text/event-stream');
		header('Cache-Control: no-cache');
		
		$user_id = I('get.user_id');
		$news_id = $_SESSION['news_id'];
		$data = D('Admin/RealTimeNews')->getLastData($user_id,$news_id);
		if($data){
			$_SESSION['news_id'] = $data[0]['id'];
			$html = '';
			foreach($data as $key=>$val){
				$html .= '<div class="raise-content bg-white margin-bottom-10">
							<p class="margin-top-10">
								<span class="bg-red tile-tips">&nbsp;&nbsp;</span>
								<span class="font16">'.$val["title"].'</span>
								<span  class="font13">（'.$val["create_time"].'）</span>
							</p>
							<div class="invite-padding">
								<p>
									<span>'.$val["content"].'</span>
								</p>
							</div>
						</div>';
			}
		}
		$result = $this->DeleteHtml($html);
		echo "data: {$result}\n\n";
		flush();
	}

	private function DeleteHtml($str){
 		$str=trim($str);//清除字符串两边的空格
  		$str=preg_replace("/\t/","",$str);//使用正则表达式匹配需要替换的内容，如空格和换行，并将替换为空
  		$str=preg_replace("/\r\n/","",$str);
  		$str=preg_replace("/\r/","",$str);
  		$str=preg_replace("/\n/","",$str);
  		return trim($str);//返回字符串
 	}
}