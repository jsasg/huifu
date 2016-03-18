<?php
namespace Home\Controller;
use Think\Controller;
use Vendor\Wechat\WechatAuth;
use Vendor\Wechat\JsSdk;
class RaiseController extends CommonController{
	public function index(){
		$user_id = I('get.user_id');
		$mid = I('get.mid');
		$model = D('Raise');
		$raise = $model->getRaiseDetail($user_id);
		
		$desc = $model->getRaiseDesc($mid);
		$list = array();
		foreach($desc as $key=>$val){
			$list['money'] += $val['money'];
		}
		$list['data'] = $desc;
	
		$this->assign('raise',$raise);
		$this->assign('desc',$list);
		
		//微信js_sdk
		$user_info = D('Admin/User')->getWechatInfo($user_id);
		$time = $user_info['expires_in']-time();
		$ticket_time = $user_info['ticket_expires_in']-time();
		
		if(0 < $time && 0 < $ticket_time){
			$js_sdk = new JsSdk($user_info['appid'] ,$user_info['secret'] ,$user_info['access_token'] ,$user_info['ticket']);		
		}else{
			$js_sdk = new JsSdk($user_info['appid'] ,$user_info['secret']);
			$access_token = $js_sdk->getAccessToken();	
			/*把重新获取access_token插入数据库*/
			$data['access_token'] = $access_token['access_token'];
			$data['expires_in'] = $access_token['expires_in']+time();
			$where['id'] = array('eq',$user_id);
			$save_data = D('Admin/User')->where($where)->save($data);
			if($save_data){
				$ticket = $js_sdk->getJsApiTicket();
				/*把重新获取ticket插入数据库*/
				$arr['ticket'] = $ticket['ticket'];
				$arr['ticket_expires_in'] = $ticket['expires_in']+time();
				$save_arr = D('Admin/User')->where($where)->save($arr);
			}
		}
		$signature = $js_sdk->getSignPackage();
		I('get.mid') ? $mid = I('get.mid') : $mid = $_SESSION['mid'];
		if($mid){
			$signature['link'] = DOMAIN_NAME.U('Raise/index',array('user_id'=>$user_id,'mid'=>$mid));
			$signature['title'] = '帮TA募集';
			$signature['img'] = DOMAIN_NAME.'/Public/Home/image/123.png';
			$signature['desc'] = '汇金开富帮TA募集活动...';
			$this->assign('signature',$signature);
		}else{
			$this->error('请先登录！');
		}
		$this->display();
	}
	
	public function raise(){
		$user_id = I('get.user_id');
		$mid = I('get.mid');
		$mobile = I('post.mobile');
		if($mobile){
			$model = D('Raise');
			if(!($model->getRaiseOnMobile($mobile))){
				$raise = $model->getRaiseDetail($user_id);
				$desc = $model->getRaiseDesc($mid);
				$desc_money = 0;
				foreach($desc as $key=>$val){
					$desc_money += $val['money'];
				}
		
				$div = $raise['raise_count']-count($desc);
		
				$total = $raise['raise_top']-$desc_money;
				if(0 < $div){
					if(1 != $div){
					$rand_money = $this->random($div,$total);
						$data['money'] = $rand_money[array_rand($rand_money)];
					}elseif(1 == $div){
						$data['money'] = $total;
					}
					$data['mid'] = $mid;
					$data['raise_id'] = $raise['id'];
					$data['mobile'] = $mobile;
					//$data['wechat_nickname'] = $user_info['nickname'];
		
					if(M('raise_desc')->add($data)){
						$res['status'] = 200;
						$res['message'] = '您已成功帮TA募集了'.$data['money'];
					}else{
						$res['status'] = 203;
						$res['message'] = '您已帮TA募集到的资金，被偷了！';
					}
				}else{
					$res['status'] = 204;
					$res['message'] = 'TA的募集已经结束了！';
				}
			}else{
				$res['status'] = 205;
				$res['message'] = '您已经帮TA的募集过了！';
			}
		}else{
			$res['status'] = 206;
			$res['message'] = '请填写手机号！';
		}
		$this->ajaxReturn($res);
	}
	
	public function desc(){
		$raise_id = I('get.id');
		$raise = D('Raise')->getRaiseOnId($raise_id);
		$this->assign('desc',$raise);
		$this->display();
	}
	
	public function raise_copy(){
		$user_id = I('get.user_id');
		$mid = I('get.mid');
		$redirect_url = 'http://120.24.223.144/index.php/Home/Raise/index/user_id/'.$user_id.'/mid/'.$mid.'/html';
		$wechat_info = D('Admin/User')->getWechatInfo($user_id);
		
		$time_out = $wechat_info['auto_expires_in']-time();
		if(0 < $time_out){
			$wechat_auth = new WechatAuth($wechat_info['appid'], $wechat_info['secret'], $wechat_info['auth_access_token']);
			$access_token = $wechat_auth->getAccessToken('code', I('get.code'));
		}else{
			$wechat_auth = new WechatAuth($wechat_info['appid'], $wechat_info['secret']);
			$wechat_auth->getRequestCodeURL($redirect_url, null, 'snsapi_userinfo');
			$access_token = $wechat_auth->getAccessToken('code', I('get.code'));
			
			/*把重新获取access_token插入数据库*/
			$data['auth_access_token'] = $access_token['access_token'];
			$data['auth_expires_in'] = $access_token['expires_in']+time();
			$where['id'] = array('eq',$user_id);
			D('User')->where($where)->save($data);
		}
		$user_info = $wechat_auth->getUserInfo($access_token['openid']);
		
		$raise = D('Raise')->getRaiseDetail($user_id);
		$data['mid'] = $mid;
		$data['money'] = $user_info['nickname'];
		$data['openid'] = $user_info['openid'];
		$data['wechat_nickname'] = $user_info['nickname'];
		
		$where['id'] = array('eq',$user_id);
		D('User')->add($data);
	}
	
	/**
	*把一个数值随机分成若干份，（含有负数）
	*@param integer $div 要分成多少份
	*@param integer $num 要分的数值
	*@return array 
	*/
	private function random($div,$total){
		$min = mt_rand(0,4);
		$random = $this->randomDivInt($div,$total);
		$lose_random = array_rand($random,$min);
		is_array($lose_random) ? $lose =$lose_random : $lose[] = $lose_random;

		$lose_array = array();
		foreach($lose as $val){
			$lose_array[] = $random[$val];
			unset($random[$val]);
		}
		$new_random = array_values($random);
		for($i=0;$i<=count($lose_array);$i++) {
			$new_random[$i] += 2*$lose_array[$i];
		}
		
		foreach($lose_array as $val){
			if($val) {	
				$new_random[] .= '-'.$val;
			}
		}
		return $new_random;
	}
	
	/**
	*把数值随机分成若干份（不含负数）
	*@param integer $div 要分的份数
	*@param integer $total 要分的数值
	*@return array
	*/
	private function randomDivInt($div,$total){
    		$remain=$total;
    		$max_sum=($div-1)*$div/4;
    		$p=$div; $min=0;
    		$a=array();
    		for($i=0; $i<$div-1; $i++){
       	 		$max=($remain-$max_sum)/($div-$i);
       	 		$e=rand($min,$max);    
       	 		$min=$e+1; $max_sum-=$p;
        			$remain-=$e;
        			$a[$e]=true;
    		}
    		$a=array_keys($a);
    		$a[]=$remain;
   		return $a;
	}
}