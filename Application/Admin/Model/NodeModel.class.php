<?php 
namespace Admin\Model;
use Think\Model;
class NodeModel extends Model{
    protected $tableName = 'node';
    protected $_validate = array(
		array('title','require','节点名称不能为空!'), 
		array('module','require','模块不能为空!'),
		array('parent_id','require','上级节点不能为空!'),
        array('level','require','等级不能为空！')
	);
    
    public function getNodeList(){
        $where['id'] = array('gt',0);
        $result = $this->where($where)->order('sort')->select();
        return $result;    
    }
    
    public function getNodeInfo($node_id){
        $where['id'] = array('eq',$node_id);
        $result = $this->where($where)->find();
        return $result;
    }
    
    public function getNodeParentIdOnParentId($parent_id){
        $result = $this->where(array('id'=>$parent_id))->getField('parent_id');
        return $result;
    }
}