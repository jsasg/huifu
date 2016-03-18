<?php
namespace Admin\Event;
class BindEvent{
	public function bindWechatAccountHandle($wechat_data){
		$model = D('User');
		if($model->create($wechat_data)){
			if($wechat_data['id']){
				$result = $model->add();
			}else{
				$where['id'] = array('eq',$$wechat_data['id']);
				$result = $model->where($where)->save();
			}
		}else{
			$result = $model->getError();
		}
	}
}