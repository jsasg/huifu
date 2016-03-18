<?php 
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController{
    public function index(){
        $user_result = D('User')->getUserList();
        $this->assign('list',$user_result);
        $this->display();
    }
    
    public function insert(){
        if(IS_POST){
            $area_model = D('Area');
			$data['login_name'] = I('post.login_name');
			I('post.password') ? $data['password'] = MD5(I('post.password')) : '';
            $data['user_name'] = I('post.user_name');
			$data['contact'] = I('post.mobile');
            $data['role_id'] = I('post.role_id');
            $data['province'] = I('post.province');
            $data['city'] = I('post.city');
            $data['area'] = I('post.area');
            $data['province_name'] = $area_model->getAddressNameOnCode(I('post.province'));
            $data['city_name'] = $area_model->getAddressNameOnCode(I('post.city'));
            $data['area_name'] = $area_model->getAddressNameOnCode(I('post.area'));
			$data['address'] = I('post.address');
			$data['user_desc'] = I('post.content');
			$data['agreement'] = I('post.agreement');
			$model = D('User');
			if($model->create($data)){
                if(I('get.id')){
                    $where['id'] = array('eq',I('get.id'));
				    $result = $model->where($where)->save($data);
                }else{
                    $result = $model->add();
                }
				
				if($result){
					$this->success('保存成功！',U('User/index'));
				}else{
					$this->error('保存失败！');
				}
			}else{
				$this->error($model->getError());			
			}
		}else{
            if(I('get.id')){
                $user_id = I('get.id');
            }
			$user_result = D('User')->getUserInfo($user_id);
			$this->assign('user',$user_result);
            $this->assign('role',recursive(D('Role')->getRoleList()));
            $this->assign('adr_province',D('Area')->getAddress(1));
            $this->assign('adr_city',D('Area')->getAddressOnCode($user_result['province']));
            $this->assign('adr_area',D('Area')->getAddressOnCode($user_result['city']));
			$this->display();
		}
    }
}