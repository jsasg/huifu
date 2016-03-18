<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;

use Think\Controller;
use Vendor\Wechat\Wechat;
use Vendor\Wechat\WechatAuth;

class WechatController extends Controller{
    /**
     * 微信消息接口入口
     * 所有发送到微信的消息都会推送到该操作
     * 所以，微信公众平台后台填写的api地址则为该操作的访问地址
     */
    public function index($id = ''){
        //调试
        try{
        	$user_info = D('Admin/User')->getWechatInfo(I('get.app'));
            $appid = $user_info['appid']; //AppID(应用ID)
            $token = strtotime($user_info['create_time']); //微信后台填写的TOKEN
            $crypt = //$user_info['secret']; //消息加密KEY（EncodingAESKey）
            
            /* 加载微信SDK */
            $wechat = new Wechat($token, $appid, $crypt);
            
            /* 获取请求信息 */
            $data = $wechat->request();

            if($data && is_array($data)){
                /**
                 * 你可以在这里分析数据，决定要返回给用户什么样的信息
                 * 接受到的信息类型有10种，分别使用下面10个常量标识
                 * Wechat::MSG_TYPE_TEXT       //文本消息
                 * Wechat::MSG_TYPE_IMAGE      //图片消息
                 * Wechat::MSG_TYPE_VOICE      //音频消息
                 * Wechat::MSG_TYPE_VIDEO      //视频消息
                 * Wechat::MSG_TYPE_SHORTVIDEO //视频消息
                 * Wechat::MSG_TYPE_MUSIC      //音乐消息
                 * Wechat::MSG_TYPE_NEWS       //图文消息（推送过来的应该不存在这种类型，但是可以给用户回复该类型消息）
                 * Wechat::MSG_TYPE_LOCATION   //位置消息
                 * Wechat::MSG_TYPE_LINK       //连接消息
                 * Wechat::MSG_TYPE_EVENT      //事件消息
                 *
                 * 事件消息又分为下面五种
                 * Wechat::MSG_EVENT_SUBSCRIBE    //订阅
                 * Wechat::MSG_EVENT_UNSUBSCRIBE  //取消订阅
                 * Wechat::MSG_EVENT_SCAN         //二维码扫描
                 * Wechat::MSG_EVENT_LOCATION     //报告位置
                 * Wechat::MSG_EVENT_CLICK        //菜单点击
                 */

                //记录微信推送过来的数据
                file_put_contents('./data.json', json_encode($data));

                /* 响应当前请求(自动回复) */
                //$wechat->response($content, $type);

                /**
                 * 响应当前请求还有以下方法可以使用
                 * 具体参数格式说明请参考文档
                 * 
                 * $wechat->replyText($text); //回复文本消息
                 * $wechat->replyImage($media_id); //回复图片消息
                 * $wechat->replyVoice($media_id); //回复音频消息
                 * $wechat->replyVideo($media_id, $title, $discription); //回复视频消息
                 * $wechat->replyMusic($title, $discription, $musicurl, $hqmusicurl, $thumb_media_id); //回复音乐消息
                 * $wechat->replyNews($news, $news1, $news2, $news3); //回复多条图文消息
                 * $wechat->replyNewsOnce($title, $discription, $url, $picurl); //回复单条图文消息
                 * 
                 */
                
                //执行Demo
                $this->run($wechat, $data, I('get.app'));
            }
        } catch(\Exception $e){
            file_put_contents('./error.json', json_encode($e->getMessage()));
        }
        
    }

    /**
     * DEMO
     * @param  Object $wechat Wechat对象
     * @param  array  $data   接受到微信推送的消息
     */
    private function run($wechat, $data, $id){
        switch ($data['MsgType']) {
            case Wechat::MSG_TYPE_EVENT:
                switch ($data['Event']) {
                    case Wechat::MSG_EVENT_SUBSCRIBE:
                    	$user_info = D('User')->getUserInfo($id);
                    	$focus_data = D('FirstFocus')->getFirstFocusInfo($user_info['focus_type']);
                    	$domain_name = DOMAIN_NAME;
                    	$picture_path = '/Public/Uploads/images/';
                    	switch($user_info['focus_type']) {
                    		case 'text':
                    			$text = $focus_data[0]['desc'];
                    			$wechat->replyText($text);
                    		 	break;
                    		case 'picture':
                    			$title = $focus_data[0]['title'];
                    			$discription = $focus_data[0]['desc'];
                    			$url = $focus_data[0]['url'];
                    			$picurl = $domain_name.$picture_path.$focus_data[0]['file'];
                    			$wechat->replyNewsOnce($title,$discription,$url,$picurl);
                    		 	break;
                    		case 'pictures':
                    			$news = array();
                   				 foreach($focus_data as $key=>$val){
						$news[$key][0] = $val['title'];       	
						$news[$key][1] = $val['desc'];       	
						$news[$key][2] = $val['url'];       	
						$news[$key][3] = $domain_name.$picture_path.$val['file'];       			
                   				 }
                   				 $param = '';
                    			for($i=0;$i<count($news);$i++) {
                    				$param .= '$news['.$i.'],';
                   				 }
                    			$wechat->replyNews($news);
                    		 	break;
                    		 case 'media':
                    			$title = $focus_data[0]['title'];
                    			$discription = $focus_data[0]['desc'];
                    			$musicurl = $domain_name.$picture_path.$focus_data[0]['file'];
                    			$hqmusicurl = $domain_name.$picture_path.$focus_data[0]['file'];
                    			$thumb_media_id = '';
                    			$wechat->replyMusic($title, $discription, $musicurl, $hqmusicurl, $thumb_media_id);
                    		 	break;
                    	}
                        break;

                    case Wechat::MSG_EVENT_UNSUBSCRIBE:
                        //取消关注，记录日志
                        break;
		case Wechat::MSG_EVENT_CLICK:
                        //自定义菜单，点击事件
                        $event_key = $data['EventKey'];
                        $menu_info = D('CustomMenu')->getCustomMenuOnEventKey($event_key);
                        $domain_name = DOMAIN_NAME;
                        $picture_path = '/Public/Uploads/images/';
                        if(1 == count($menu_info['data'])){
                        		switch($menu_info['focus_type']) {
                        			case 'text':
                    				$text = $menu_info['data'][0]['menu_desc'];
                    				$wechat->replyText($text);
                    		 		break;
                    			case 'picture':
                    				$title = $menu_info['data'][0]['menu_title'];
                    				$discription = $menu_info['data'][0]['menu_desc'];
                    				$url = $menu_info['data'][0]['menu_url'];
                    				$picurl = $domain_name.$picture_path.$menu_info['data'][0]['file'];
                    				$wechat->replyNewsOnce($title,$discription,$url,$picurl);
                    		 		break;
                    		 	case 'media':
                    				$title = $menu_info['data'][0]['title'];
                    				$discription = $menu_info['data'][0]['desc'];
                    				$musicurl = $domain_name.$picture_path.$menu_info['data'][0]['file'];
                    				$hqmusicurl = $domain_name.$picture_path.$menu_info['data'][0]['file'];
                    				$thumb_media_id = '';
                    				$wechat->replyMusic($title, $discription, $musicurl, $hqmusicurl, $thumb_media_id);
                    		 		break;
                    		 }
                        }else{
                        		$news = array();
                   			foreach($menu_info['data'] as $key=>$val){
					$news[$key][0] = $val['menu_title'];       	
					$news[$key][1] = $val['menu_desc'];       	
					$news[$key][2] = $val['menu_url'];       	
					$news[$key][3] = $domain_name.$picture_path.$val['file'];       			
                   			 }
                    		$wechat->replyNews($news);
                        }
                    default:
                    	$user_info = D('User')->getUserInfo($id);
                    	$focus_data = D('FirstFocus')->getFirstFocusInfo($user_info['focus_type']);
                    	$text = $focus_data[0]['desc'];
                    	$wechat->replyText($text);
                        break;
                }
                break;

            case Wechat::MSG_TYPE_TEXT:
                switch ($data['Content']) {
                    case '文本':
                        $wechat->replyText('欢迎访问汇金开富公众平台，这是文本回复的内容！');
                        break;
                    
                    default:
                        $wechat->replyText("欢迎访问汇金开富公众平台！您输入的内容是：{$data['Content']}");
                        break;
                }
                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * 资源文件上传方法
     * @param  string $type 上传的资源类型
     * @return string       媒体资源ID
     */
    private function upload($type){
        $appid     = 'wx58aebef2023e68cd';
        $appsecret = 'bf818ec2fb49c20a478bbefe9dc88c60';

        $token = session("token");

        if($token){
            $auth = new WechatAuth($appid, $appsecret, $token);
        } else {
            $auth  = new WechatAuth($appid, $appsecret);
            $token = $auth->getAccessToken();

            session(array('expire' => $token['expires_in']));
            session("token", $token['access_token']);
        }

        switch ($type) {
            case 'image':
                $filename = './Public/image.jpg';
                $media    = $auth->materialAddMaterial($filename, $type);
                break;

            case 'voice':
                $filename = './Public/voice.mp3';
                $media    = $auth->materialAddMaterial($filename, $type);
                break;

            case 'video':
                $filename    = './Public/video.mp4';
                $discription = array('title' => '视频标题', 'introduction' => '视频描述');
                $media       = $auth->materialAddMaterial($filename, $type, $discription);
                break;

            case 'thumb':
                $filename = './Public/music.jpg';
                $media    = $auth->materialAddMaterial($filename, $type);
                break;
            
            default:
                return '';
        }

        if($media["errcode"] == 42001){ //access_token expired
            session("token", null);
            $this->upload($type);
        }

        return $media['media_id'];
    }
}
