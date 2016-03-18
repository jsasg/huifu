<?php 
namespace Admin\Model;
use Think\Model;
class ProductClassModel extends Model{
    protected $tableName = 'product_class';
    protected $_validate = array(
        array('class_name','require','分类名不能空！'),
    );
    
    public function getProductClassList(){
        $where['a.id'] = array('gt',0);
        if(1 != $_SESSION['user']['id']){
            $where['a.user_id'] = array('eq',$_SESSION['user']['id']);
        }
        $result = $this->alias('a')->field('a.*,b.user_name')
                        ->join('JOIN app_user b ON a.user_id=b.id')
                        ->where($where)
                        ->select();
        return $result;
    }
    
    public function getProductClassInfo($class_id){
        $where['id'] = array('eq',$class_id);
        $result = $this->where($where)->find();
        return $result;
    }
    
    public function getNodeParentIdOnParentId($parent_id){
        $result = $this->where(array('id'=>$parent_id))->getField('parent_id');
        return $result;
    }
}