<?php
namespace Admin\Model;
use Think\Model;
class AdvertModel extends Model{
	protected $tableName = 'advert';
	protected $_validate = array(
		array('advert_name','require','广告名称不能为空！'),
		array('advert_picture','require','广告图不能为空！'),
	);
	/**
	* 获取广告列表
         ＊＠return array
	*/
	public function getAdvertList(){
		$where['user_id'] = array('eq',$_SESSION['user']['id']);
		$count = $this->where($where)->count();
		$Page = new \Think\Page($count,25);
		$Page->setConfig('header','<span>第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</span>');
		$Page->setConfig('prev','上一页');
    		$Page->setConfig('next','下一页');
   		$Page->setConfig('last','末页');
   	 	$Page->setConfig('first','首页');
   	 	$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
		$result['page'] = $Page->show();
		$result['data'] = $this->where($where)->order('advert_sort desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		return $result;
	}
	
	/**
	* 获取单个广告信息
	* @param integer $advert_id 广告ID
         ＊＠return array
	*/
	public function getAdvertRow($advert_id){
		$where['id'] = array('eq',$advert_id);
		$where['user_id'] = array('eq',$_SESSION['user']['id']);
		$result = $this->where($where)->find();
		return $result;
	}
	/*根据user_id获取广告图列表*/
	public function getAdvertGroup($user_id){
		$where['user_id'] = array('eq',$user_id);
		$where['is_open'] = array('eq',1);
		$result = $this->field('id,advert_name,advert_desc,advert_picture,advert_url')
		     			->where($where)
		     			->order('advert_sort')
		     			->select();
		return $result;
	}
}