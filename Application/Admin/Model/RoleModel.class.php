<?php 
namespace Admin\Model;
use Think\Model;
class RoleModel extends Model{
    protected $tableName = 'role';
    protected $_validate = array(
		array('parent_id','require','上级角色不能为空！'),
		array('role_name','require','角色名称不能为空！'),
        array('status','require','状态不能为空！'),
	);
    
    public function getRoleList(){
        $where['id'] = array('gt',0);
        $result = $this->where($where)->select();
        return $result;
    }
    
    public function getRoleInfo($role_id){
        $where['id'] = array('eq',$role_id);
        $result = $this->where($where)->find();
        return $result;
    }
}