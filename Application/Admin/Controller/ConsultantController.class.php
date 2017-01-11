<?php
namespace Admin\Controller;
use Common\Controller\BackendController;
class ConsultantController extends BackendController{
	public function _initialize() {
        parent::_initialize();
        $this->_mod = D('Consultant');
    }
    public function _before_insert($data){
        if(!$_FILES['pic']['name']){
            $this->error('请上传顾问头像');
        }
        $date = date('ym/d/');
        $result = $this->_upload($_FILES['pic'], 'consultant/' . $date, array(
                'maxSize' => 1024,
                'uploadReplace' => true,
                'attach_exts' => 'bmp,png,gif,jpeg,jpg'
        ));
        if($result['error']) {
            $path = $date.$result['info'][0]['savename'];
            $data['pic'] = $path;
        }
        return $data;
    }
    public function _before_update($data){
        if($_FILES['pic']['name']){
            $date = date('ym/d/');
            $result = $this->_upload($_FILES['pic'], 'consultant/' . $date, array(
                    'maxSize' => 1024,
                    'uploadReplace' => true,
                    'attach_exts' => 'bmp,png,gif,jpeg,jpg'
            ));
            if($result['error']) {
                $model = $this->_mod->where(array('id'=>array('eq',$data['id'])))->find();
                if($model['pic']){
                    @unlink(C('qscms_attach_path').'consultant/'.$model['pic']);
                }
                $path = $date.$result['info'][0]['savename'];
                $data['pic'] = $path;
            }
        }
        return $data;
    }
    public function _before_del($list){
        foreach ($list as $key => $value) {
            @unlink(C('qscms_attach_path').'consultant/'.$value['pic']);
        }
    }
    /**
     * 管理
     */
    public function manage(){
        $consultantid = I('request.id',0,'intval');
        $consultant = $this->_mod->where(array('id'=>$consultantid))->find();
        $this->assign('consultant',$consultant);
        $map['consultant'] = $consultantid;
        parent::_list(D('Members'),$map);
        $this->display();
    }
    /**
     * 重置
     */
    public function resetting(){
        $uid = I('request.uid','','trim');
        if(!$uid){
            $this->error('请选择会员');
        }
        is_array($uid) && $uid = implode(",",$uid);
        $result = D('Members')->where(array('uid'=>array('in',$uid)))->setField('consultant',0);
        if($result!==false){
            $this->admin_write_log_unify();
            $this->success('重置成功');
        }else{
            $this->error('重置失败');
        }
    }
    /**
     * [complain 投诉]
     */
    public function complain(){
        $this->_name="ConsultantComplaint";
        parent::index();
    }
    public function complain_audit(){
        $id = I('request.id');
        $audit= I('request.audit',0,'intval');
        $audit=intval($_POST['audit']);
        if (empty($id)) $this->error("您没有选择项目！");
        $this->_mod = D('ConsultantComplaint');
        $num = $this->_mod->where(array('id'=>array('in',$id)))->setField('audit',intval($audit));
        if($num){
          $this->success("设置成功！共影响 {$num}行 ");
        }else{
          $this->error("设置失败！");
        }
    }
    public function complain_delete(){
        $this->_name = 'ConsultantComplaint';
        parent::delete();
    }
}
?>