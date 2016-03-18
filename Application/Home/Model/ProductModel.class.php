<?php
namespace Home\Model;
use Think\Model;
class ProductModel extends Model{
	protected $tableName = 'finance_goods';
	
	/*根据用户ID获取商品列表*/
	public function getProductList($user_id){
		$where['user_id'] = array('eq',$user_id);
		$result = $this->field('id,user_id,goods_name,invest_timelimit,issuing_scale,is_novice')
					->where($where)
					->order('create_time desc')
					->select();	
		$goods_id = array();
		foreach($result as $key=>$val){
			$goods_id[$key] = $val['id'];
		}
		$map['finance_id'] = array('in',implode(',', $goods_id));
		$order_count = M('finance_order')->field('finance_id,count(id) as count')->where($map)->group('finance_id')->select();
		$count = array();
		foreach($order_count as $key=>$val){
			$count[$val['finance_id']] = $val;
		}
		foreach($result as $key=>$val){
			$result[$key]['count'] = $count[$val['id']]['count'];
		}
		return $result;
	}
	
	/*根据商品ID获取商品详情*/
	public function getProductDetail($product_id){
		$where['a.id'] = array('eq',$product_id);
		$field = "a.*,CASE DATE_FORMAT(a.start_time,'%w') WHEN 0 THEN '星期天' WHEN 1 THEN '星期一' WHEN 2 THEN '星期二' WHEN 3 THEN '星期三' WHEN 4 THEN '星期四' WHEN 5 THEN '星期五' WHEN 6 THEN '星期六' END as start_week,CASE DATE_FORMAT(a.end_time,'%w') WHEN 0 THEN '星期天'  WHEN 1 THEN '星期一' WHEN 2 THEN '星期二' WHEN 3 THEN '星期三' WHEN 4 THEN '星期四' WHEN 5 THEN '星期五' WHEN 6 THEN '星期六' END as end_week,count(b.id) as count";
		$result = $this->alias('a')
					->field($field)
					->join('JOIN app_finance_order b ON a.id=b.finance_id ')
					->where($where)
					->group('a.id')
					->find();
		return $result;	
	}
}