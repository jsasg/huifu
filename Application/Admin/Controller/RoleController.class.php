<?php 
namespace Admin\Controller;
use Think\Controller;
class RoleController extends CommonController{
    public function index(){
        $role_model = D('Role');
        $role_result = $role_model->getRoleList();
        $this->assign('list',recursive($role_result));
        $this->display();
    }
    
    public function insert(){
        if(IS_POST){
            $role_model = D('Role');
            I('post.parent_id') ? $role_model->parent_id = I('post.parent_id') : $role_model->parent_id = 0;
            $role_model->role_name = I('post.role_name');
            $role_model->status = I('post.status');
            $role_model->sort = I('post.sort');
            $role_model->remark = I('post.remark');
            if(I('post.id')){
                $where['id'] = array('eq',I('post.id'));
                $insert_result = $role_model->field('id',true)->where($where)->save();
            }else{
                $insert_result = $role_model->add();
            }
            if($insert_result){
                $this->success('操作成功！',U('Role/index'));
            }else{
                $this->error('操作失败！');
            }
        }else{
            $role_model = D('Role');
            $role_result = $role_model->getRoleList();
            $this->assign('parent',recursive($role_result));
            $this->assign('role',$role_model->getRoleInfo(I('get.id')));
            $this->display();
        }
    }
    
    public function auth(){
        if(IS_POST){
            $data = I('post.');
            $insert_data = array();
            foreach($data['node'] as $key=>$val){
                $insert_data[$key]['role_id'] = $data['role_id'];
                $insert_data[$key]['node_id'] = $val;
            }
            $role_node_model = D('RoleNode');
            if($role_node_model->getRoleNodeInfo($data['role_id'])){
                if($role_node_model->where(array('role_id',$data['role_id']))->delete()){
                    $insert_result = $role_node_model->addAll($insert_data);
                }
            }else{
                $insert_result = $role_node_model->addAll($insert_data);
            }
            if($insert_result){
                $this->success('操作成功！',U('Role/index'));
            }else{
                $this->error('操作失败！');
            }
        }else{
            $role_result = D('Node')->getNodeList();
            $this->assign('list',recursive($role_result));
            $role_node_result = D('RoleNode')->getRoleNodeListOnRole(I('get.id'));
            foreach($role_node_result as $key=>$val){
                $role_node_result[$key] = $val['node_id'];
            }
            
            $this->assign('role_node',$role_node_result);
            $this->display();
        }
    }
}