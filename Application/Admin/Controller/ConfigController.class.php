<?php
namespace Admin\Controller;
use Common\Controller\ConfigbaseController;
class ConfigController extends ConfigbaseController{
	public function _initialize() {
        parent::_initialize();
        $this->_mod = D('Config');
    }
    public function edit(){
        if(IS_POST){
            foreach (array('logo_home','logo_user','logo_other') as $val) {
                if(!$_FILES[$val]['name']) continue;
                $result = $this->_upload($_FILES[$val], 'resource/', array(
                    'maxSize' => 2*1024,//图片最大2M
                    'uploadReplace' => true,
                    'attach_exts' => 'bmp,png,gif,jpeg,jpg'
                ),$val);
                if ($result['error']) {
                    $_POST[$val] = $result['info'][0]['savename'];
                }
            }
        }
        $this->_edit();
        $this->display();
    }
    public function reg(){
        $this->_edit();
        if(false === $text_list = F('text_list')){
            $text_list = D('Text')->text_cache();
        }
        $this->assign('agreement',$text_list['agreement']);
        $this->display();
    }
    public function map(){
        $this->_edit();
        $this->display();
    }
    public function agreement(){
        $agreement = M('Text')->where(array('name'=>'agreement'))->find();
        $this->assign('agreement',$agreement);
        $this->display();
    }
	 public function config_points(){
        $this->_edit();
        $this->display();
    }
}
?>