<?php 
namespace Admin\Model;
use Think\Model;
class AreaModel extends Model{
    protected $tableName = 'area';
    
    public function getAddress($level){
        $where['id'] = array('gt',0);
        $where['level'] = array('eq',$level);
        $result = $this->where($where)->select();
        return $result;
    }
    
    public function getAddressOnCode($code){
        $where['ucode'] = array('eq',$code);
        $result = $this->where($where)->select();
        return $result;
    }
    
    public function getAddressNameOnCode($code){
        $where['code'] = array('eq',$code);
        $result = $this->where($where)->getField('adr_name');
        return $result;
    }
}