<?php 
namespace Admin\Controller;
use Think\Controller;
class ProductClassController extends CommonController{
    public function index(){
        $this->assign('list',recursive(D('ProductClass')->getProductClassList()));
        $this->display();
    }
    
    public function insert(){
        if(IS_POST){
            $class_model = D('ProductClass');
            if($class_model->create()){
                $class_model->user_id = $_SESSION['user']['id'];
                $_FILES['picture']['name'] ? $class_model->picture = $this->upload($_FILES['picture']) : '';
                $class_model->is_open = I('post.is_open');
                if(!I('post.class_id')){
                    $insert_result = $class_model->add();
                }else{
                    if((I('post.parent_id') == I('post.class_id')) || 
                    (I('post.class_id') == $class_model->getNodeParentIdOnParentId(I('post.parent_id')))){
                        $this->error('请确认上级分类!');
                    }
                    $insert_result = $class_model->where(array('id'=>I('post.class_id')))->save();
                }
                if($insert_result){
                    $this->success('操作成功！',U('ProductClass/index'));
                }else{
                    $this->error('操作失败！');
                }
            }else{
                $this->error($class->getError());
            }
        }else{
            $class_model = D('ProductClass');
            $this->assign('parent',recursive($class_model->getProductClassList()));
            $this->assign('class',$class_model->getProductClassInfo(I('get.id')));
            $this->display();
        }
    }
}