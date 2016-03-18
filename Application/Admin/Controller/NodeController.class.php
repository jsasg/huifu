<?php 
namespace Admin\Controller;
use Think\Controller;
class NodeController extends CommonController{
    public function index(){
        $node_result = D('Node')->getNodeList();
        $this->assign('list',recursive($node_result));
        $this->display();
    }
    
    public function insert(){
        $node_model = D('Node');
        if(IS_POST){
            $parent_info = $node_model->getNodeInfo(I('post.parent_id'));
            if($node_model->create()){
                $node_model->level = $parent_info['level']+1;
                if(I('post.node_id')){
                    if(I('post.parent_id') == I('post.node_id') || 
                    I('post.node_id') == $node_model->getNodeParentIdOnParentId(I('post.parent_id'))){
                        $this->error('请确认上级节点!');
                    }
                    $where['id'] = array('eq',I('post.node_id'));
                    $insert_result = $node_model->field('id',true)->where($where)->save();
                }else{
                    $insert_result = $node_model->add();
                }
            }else{
                $this->error($node_model->getError());
            }
            if($insert_result){
                $this->success('操作成功！',U('Node/index'));
            }else{
                $this->error('操作失败!');
            }
        }else{
            $this->assign('parent',recursive($node_model->getNodeList()));
            $this->assign('node',$node_model->getNodeInfo(I('get.id')));
            $this->display();
        }
    }
}