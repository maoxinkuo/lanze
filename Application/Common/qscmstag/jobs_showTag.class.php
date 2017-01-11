<?php
/**
 * 职位详情
 */
namespace Common\qscmstag;
defined('THINK_PATH') or exit();
class jobs_showTag {
	protected $params = array();
	protected $map = array();
    function __construct($options) {
    	$array = array(
    		'列表名'			=>	'listname',
    		'职位id'			=>	'id'
    	);
    	foreach ($options as $key => $value) {
    		$this->params[$array[$key]] = $value;
    	}
        $this->map['id'] = array('eq',intval($this->params['id']));
    	$this->params['listname']=isset($this->params['listname'])?$this->params['listname']:"info";
    }
    public function run(){
        $val = M('Jobs')->where($this->map)->find();
        $tmp = 0;
        if($val['audit']==2 && C('qscms_jobs_display')==1){
            $tmp = 1;
        }
        else if(!$val){
            $val = M('JobsTmp')->where($this->map)->find();
            $tmp = 1;
        }
        if(!$val){
            $controller = new \Common\Controller\BaseController;
            $controller->_empty();
        }
        if(C('SUBSITE_TYPE')){
            if(false === $subsite_district = F('subsite_district')) $subsite_district = D('Subsite')->subsite_district_cache();
            $subsite_id = $subsite_district[$val['tdistrict']]?:($subsite_district[$val['sdistrict']]?:$subsite_district[$val['district']]);
            check_url($subsite_id);
        }
        if($val['deadline']<time())
        {
            $val['jobs_overtime']=1;
        }
        elseif($val['audit']<>'1' || $val['display']<>'1' || ($val['setmeal_deadline']<>'0' && $val['setmeal_deadline']<time()))
        {
            $val['jobs_overtime']=2;
        }
        if ($val['setmeal_deadline']<time() && $val['setmeal_deadline']<>"0" && $val['add_mode']=="2")
        {
        $val['deadline']=$val['setmeal_deadline'];
        }
        $val['amount']=$val['amount']=="0"?'若干':$val['amount'];
        if(C('apply.Subsite')){
            if(false === $subsite_district = F('subsite_district')) $subsite_district = D('Subsite')->subsite_district_cache();
            $subsite_id = $subsite_district[$val['tdistrict']]?:($subsite_district[$val['sdistrict']]?:$subsite_district[$val['district']]);
        }
        $val['jobs_url']=url_rewrite('QS_jobsshow',array('id'=>$val['id']),$subsite_id);
        $profile=M('CompanyProfile')->where(array('id'=>$val['company_id']))->find();
        $val['company']=$profile;
        $setmeal = D('MembersSetmeal')->get_user_setmeal($val['uid']);
        $val['company']['setmeal_id'] = $setmeal['setmeal_id'];
        $val['company']['setmeal_name'] = $setmeal['setmeal_name'];
        $val['contact']=M('JobsContact')->where(array('pid'=>$val['id']))->find();
        $val['expire']=sub_day($val['deadline'],time());  
        $val['contents'] = htmlspecialchars_decode($val['contents'],ENT_QUOTES);
        $val['refreshtime_cn']=daterange(time(),$val['refreshtime'],'Y-m-d',"#FF3300");
        $val['company_url']=url_rewrite('QS_companyshow',array('id'=>$val['company_id']));
        if ($val['company']['logo'])
        {
            $val['company']['logo']=attach($val['company']['logo'],'company_logo');
        }
        else
        {
            $val['company']['logo']=attach('no_logo.png','resource');
        }
        if($val['company']['website']){
            $val['company']['website_'] = $val['company']['website'];
            if(strstr($val['company']['website'],"http://")===false){
                $val['company']['website'] = "http://".$val['company']['website'];
            }else{
                $val['company']['website_'] = str_replace("http://", "", $val['company']['website_']);
            }
        }
        if($val['negotiable']==0){
            $val['minwage'] = $val['minwage']%1000==0?($val['minwage']/1000):round($val['minwage']/1000,1);
            $val['maxwage'] = $val['maxwage']?($val['maxwage']%1000==0?($val['maxwage']/1000):round($val['maxwage']/1000,1)):0;
            if($val['maxwage']==0){
                $val['wage_cn'] = '面议';
            }else{
                if($val['minwage']==$val['maxwage']){
                    $val['wage_cn'] = $val['minwage'].'K/月';
                }else{
                    $val['wage_cn'] = $val['minwage'].'K-'.$val['maxwage'].'K/月';
                }
            }
        }else{
            $val['wage_cn'] = '面议';
        }
        $age = explode('-',$val['age']);
        if(!$age[0] && !$age[1]){
            $val['age_cn'] = '不限';
        }else{
            $age[0] && $val['age_cn'] = $age[0].'岁以上';
            $age[1] && $val['age_cn'] = $age[1].'岁以下';
        }
        if ($val['tag_cn'])
        {
            $tag_cn=explode(',',$val['tag_cn']);
            $val['tag_cn']=$tag_cn;
        }
        else
        {
            $val['tag_cn']=array();
        }
        //简历处理率
        $apply = M('PersonalJobsApply')->where(array('company_uid'=>$val['uid'],'apply_addtime'=>array('gt',strtotime("-14day"))))->select();
        foreach ($apply as $key => $v) {
            if($v['is_reply']){
                $reply++;
                $v['reply_time'] && $reply_time += $v['reply_time'] - $v['apply_addtime'];
            }
        }
        $val['company']['reply_ratio'] = !$apply ? 100 : intval($reply / count($apply) * 100);
        $val['company']['reply_time'] = !$reply_time ? '0天' : sub_day(intval($reply_time / count($apply)),0);
        $last_login_time = M('Members')->where(array('uid'=>$val['uid']))->getfield('last_login_time');
        $val['company']['last_login_time'] = $last_login_time ? fdate($last_login_time) : '未登录';
        if(C('visitor.utype') == 2){
            $val['resume'] = M('Resume')->where(array('uid'=>C('visitor.uid')))->order('def desc,id asc')->find();
            if($val['resume']){
                $val['resume']['url'] = url_rewrite('QS_resumeshow',array('id'=>$val['resume']['id'],'tpl'=>$val['resume']['tpl'],'preview'=>1));
            }
            $view_log = M('ViewJobs')->where(array('uid'=>C('visitor.uid'),'jobsid'=>$val['id']))->find();
            if($view_log){
                M('ViewJobs')->where(array('uid'=>C('visitor.uid'),'jobsid'=>$val['id']))->setField('addtime',time());
            }else{
                M('ViewJobs')->add(array('uid'=>C('visitor.uid'),'jobs_uid'=>$val['uid'],'jobsid'=>$val['id'],'addtime'=>time()));
            }
        }
        $hide = true;
        if(C('qscms_showjobcontact') == 0)
        {
            $hide = false;
        }
        elseif(C('qscms_showjobcontact') == 1)
        {
            if(C('visitor')){
                $hide = false;
            }
        }
        else
        {
            if(C('visitor.utype') == 2)
            {
                $has_resume = M('Resume')->where(array('uid'=>C('visitor.uid')))->order('def desc,id asc')->find();
                if($has_resume) $hide = false;
            }
        }
        if($hide){
            if($val['contact']['telephone']){
                $val['contact']['telephone'] = contact_hide($val['contact']['telephone']);
            }else{
                $val['contact']['telephone'] = contact_hide(trim($val['contact']['landline_tel'],'-'),1);
            }
        }else{
            if($val['contact']['telephone_show']==0 && $val['contact']['landline_tel_show']==0){
                $val['contact']['telephone_show'] = 0;
            }
            elseif($val['contact']['telephone_show']==1 && $val['contact']['telephone'])
            {
                $val['contact']['telephone_show'] = $val['contact']['telephone_show'];
            }
            else
            {
                $val['contact']['telephone'] = trim($val['contact']['landline_tel'],'-');
                $val['contact']['telephone_show'] = $val['contact']['landline_tel_show'];
            }
        }
        $val['contact']['telephone_'] = $val['contact']['telephone'];
        if(C('qscms_contact_img_com') == 2){
            $val['contact']['telephone'] = '<img src="'.C('qscms_site_domain').U('Home/Qrcode/get_font_img',array('str'=>encrypt($val['contact']['telephone'],C('PWDHASH')))).'"/>';
        }
        if(APP_SPELL){
            if(false === $jobs_cate = F('jobs_cate_list')) $jobs_cate = D('CategoryJobs')->jobs_cate_cache();
            $spell = $val['category'] ? $val['category'] : $val['topclass'];
            $val['jobcategory'] = $jobs_cate['id'][$spell]['spell'];
        }else{
            $val['jobcategory'] = intval($val['topclass']).".".intval($val['category']).".0";
        }
        $val['tpl'] = $val['tpl']?$val['tpl']:C('qscms_tpl_company');
        $val['tmp'] = $tmp;
        $val['hide'] = $hide;
        //检测是否已收藏
        $val['favor'] = $this->_check_favor($val['id'],C('visitor.uid'));
        return $val;
    }
    //检测是否已收藏
    protected function _check_favor($jobs_id,$uid){
        $r = D('PersonalFavorites')->where(array('jobs_id'=>$jobs_id,'personal_uid'=>$uid))->find();
        if($r){
            return 1;
        }else{
            return 0;
        }
    }
}