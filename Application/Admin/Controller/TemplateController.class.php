<?php 
namespace Admin\Controller;
use Think\Controller;
class TemplateController extends CommonController{
    public function index(){
        
        $this->display();
    }
    
    public function insert(){
        if(IS_POST){
            
        }else{
            
            $this->display();
        }
    }
}