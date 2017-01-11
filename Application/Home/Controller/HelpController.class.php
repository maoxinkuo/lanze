<?php
namespace Home\Controller;
use Common\Controller\FrontendController;
class HelpController extends FrontendController{
    //帮助首页
    public function index() {
        $this->display();
    }
    //帮助列表页
    public function help_list(){
        if(IS_GET){
            url_key_shift();//搜索关健字URL中文转码(gbk->utf_8)
        }else{
            $_GET['key'] = I('request.key','','trim');
        }
        $this->display();
    }
    //帮助详细页
    public function help_show(){
        $this->display();
    }
}