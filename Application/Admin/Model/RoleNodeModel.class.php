<?php 
namespace Admin\Model;
use Think\Model;
class RoleNodeModel extends Model{
    protected $tableName = 'role_node';
    protected $_validate = array(
        array('role_id','require','角色ID不能为空！'),
        array('node_id','require','节点ID不能为空！'),
    );
    
    public function getRoleNodeInfo($role_id){
        $where['role_id'] = array('eq',$role_id);
        $result = $this->where($where)->find();
        return $result;
    }
    
    public function getRoleNodeListOnRole($role_id){
        $where['role_id'] = array('eq',$role_id);
        $result = $this->where($where)->select();
        return $result;
    }
}