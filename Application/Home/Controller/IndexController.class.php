<?php
namespace Home\Controller;
use Common\Controller\FrontendController;
class IndexController extends FrontendController{
	public function _initialize() {
        parent::_initialize();
    }
    public function aaa(){
    	$arr = array('./ThinkPHP/Library/Think/Controller.class.php','./Application/Common/Controller/BaseController.class.php','./Application/Common/Behavior/SubsiteBehavior.class.php','./Application/Common/qscmstag/loadTag.class.php','./Application/Common/qscmstag/company_jobs_listTag.class.php','./Application/Common/Model/JobsModel.class.php','./Application/Common/Model/AdminModel.class.php','./Application/Common/Model/SubsiteModel.class.php','./Application/Common/Model/ResumeModel.class.php','./Application/Common/Model/PersonalJobsApplyModel.class.php','./Application/Common/qscmstag/loadTag.class.php','./Application/Common/qscmstag/jobs_listTag.class.php','./Application/Common/qscmstag/jobfair_listTag.class.php','./Application/Common/qscmslib/user_visitor.class.php','./Application/Common/qscmslib/get_dir_file.class.php','./Application/Common/Lang/zh-cn/resume_training.php','./Application/Common/Lang/zh-cn/subsite.php','./Application/Common/Lang/zh-cn/sms.php','./Application/Common/Controller/BaseController.class.php','./Application/Common/Controller/FrontendController.class.php','./Application/Common/Model/CategoryMajorModel.class.php','./Application/Common/Model/SubsiteModel.class.php','./Application/Common/qscmstag/resume_listTag.class.php','./Application/Common/qscmstag/jobs_listTag.class.php','./Application/Common/qscmstag/company_jobs_listTag.class.php','./Application/Common/qscmstag/jobfair_listTag.class.php','./Application/Common/Controller/FrontendController.class.php','./Application/Common/Controller/BackendController.class.php','./Application/Common/qscmslib/weixin.class.php','./Application/Common/Behavior/IsMobileBehavior.class.php','./Application/Common/Model/ResumeModel.class.php','./Application/Common/Model/AdminModel.class.php','./Application/Common/Model/ResumeModel.class.php','./Application/Common/qscmstag/hrtools_listTag.class.php','./data/rewrite/74cms_min.php','./data/rewrite/74cms_3_7.php','./Application/Admin/Controller/PersonalController.class.php','./Application/Admin/Controller/PageController.class.php','./Application/Admin/Controller/JobsController.class.php','./Application/Admin/View/default/Weixin/index.html','./Application/Admin/View/default/Admin/edit.html','./Application/Admin/View/default/Ad/edit.html','./Application/Admin/View/default/Jobs/index.html','./Application/Admin/Controller/AdminController.class.php','./Application/Admin/Controller/PersonalController.class.php','./Application/Subsite/View/default/Admin/edit.html','./Application/Subsite/View/default/Admin/add.html','./Application/Home/Controller/UploadController.class.php','./Application/Home/Controller/CompanyController.class.php','./Application/Home/Controller/IndexController.class.php','./Application/Home/View/default/Company/index.html','./Application/Home/View/default/Jobs/index.html','./Application/Home/View/default/Resume/index.html','./Application/Admin/Controller/CompanyImgController.class.php','./Application/Admin/Controller/AdminController.class.php','./Application/Home/View/default/Jobs/index.html','./Application/Home/View/default/Jobs/jobs_list.html','./Application/Home/View/default/Resume/index.html','./Application/Home/View/default/Resume/resume_list.html','./Application/Home/Controller/CompanyController.class.php','./Application/Home/Controller/AjaxCompanyController.class.php','./Application/Home/View/default/public/meta.html','./Application/Home/View/default/Personal/index.html','./Application/Home/View/default/Company/pms_sys.html','./Application/Home/View/default/Personal/msg_pms.html','./Application/Home/View/default/Resume/resume_list.html','./Application/Home/View/default/Personal/resume_edit.html','./Application/Home/View/default/public/header_min.html','./Application/Home/View/default/Company/service/explain.html','./Application/Home/View/default/Index/index_blue.html','./Application/Home/View/tpl_company/default/header.html','./Application/Home/View/default/Company/jobs_apply.html','./Application/Home/View/default/Company/service/order_pay_finish.html','./Application/Home/View/tpl_resume/default/resume_show.html','./Application/Home/Controller/ResumeController.class.php','./Application/Home/View/tpl_company/default/com_show.html','./Application/Admin/View/default/Personal/index.html','./Application/Admin/View/default/Article/edit.html','./Application/Admin/Controller/ArticleController.class.php','./Application/Admin/View/default/Personal/match.html','./Application/Admin/Controller/PageController.class.php','./Application/Home/Controller/CompanyController.class.php','./Application/Home/Controller/PersonalController.class.php','./Application/Admin/Controller/CompanyMembersController.class.php','./Application/Admin/Controller/PersonalController.class.php','./Application/Admin/View/default/Personal/index.html','./Application/Home/View/tpl_company/default/com_jobs_list.html','./Application/Home/View/default/Company/jobs_add.html','./Application/Home/View/default/AjaxCommon/index_resume_list.html','./Application/Home/View/default/public/js/jquery.modal.dialog.js','./Application/Home/View/default/public/js/jquery.modal.search.js','./Application/Home/View/default/public/css/common.css','./Application/Home/View/default/public/css/news.css','./Application/Home/View/default/public/css/notice.css','./Application/Home/View/default/public/css/resume.css','./Application/Home/View/default/Company/company_tpl.html','./Application/Home/View/default/Personal/index.html','./Application/Home/View/default/public/css/company/company_points.css','./Application/Home/View/default/Index/index.html','./Application/Home/View/default/public/css/index.css','./Application/Home/View/default/Members/login.html','./Application/Home/View/default/AjaxCommon/login.html','./Application/Home/View/default/AjaxCommon/login_job.html','./Application/Home/View/default/AjaxCommon/resume_add_dig.html','./Application/Home/View/default/Members/user_getpass.html','./Application/Home/View/default/Company/index_footer.html','./Application/Home/View/default/Personal/index_footer.html','./Application/Home/View/default/public/footer.html','./Application/Home/View/default/public/css/common.css ','./Application/Home/View/default/public/css/company/common.css','./Application/Home/View/default/public/css/personal/common.css','./Application/Home/View/default/public/js/jquery.modal.userselectlayer.js','./Application/Home/View/default/Personal/resume_edit.html','./Application/Home/View/default/public/css/personal/personal_resume.css','./Application/Home/View/default/public/css/index.css','./Application/Home/View/default/Personal/resume_edit.html','./Application/Admin/View/default/Weixin/index.html','./Application/Admin/View/default/public/css/common.css','./Application/Admin/View/default/AdminRole/auth.html','./Application/Admin/View/default/Sms/config_edit.html','./Application/Home/View/default/Company/service/order_pay_finish.html','./Application/Common/Model/OrderModel.class.php','./Application/Home/View/default/Company/jobs_list_all.html','./Application/Home/Controller/PersonalServiceController.class.php','./Application/Home/View/default/Personal/resume_list.html','./Application/Admin/View/default/Payment/index.html','./Application/Home/View/default/News/index.html','./Application/Home/View/default/News/news_list.html','./Application/Home/View/default/News/news_show.html','./Application/Admin/View/default/Company/index.html','./Application/Mobile/View/default/Jobs/index.html','./Application/Mobile/View/default/Resume/index.html','./Application/Mobile/View/default/Company/index.html','./Application/Mobile/View/default/public/meta.html','./Application/Mobile/Controller/CompanyController.class.php','./Application/Mobile/Controller/IndexController.class.php','./Application/Mobile/View/default/Members/login.html','./Application/Mobile/View/default/Admin/index.html','./Application/Mobile/View/default/Resume/index.html','./Application/Mobile/View/default/Wzp/com.html','./Application/Mobile/View/default/Wzp/comred.html','./Application/Mobile/View/default/Index/index.html','./Application/Mobile/View/default/Personal/resume_add.html','./Application/Mobile/View/default/public/js/popWin.js','./Application/Mobile/View/default/Company/jobs_add.html','./Application/Mobile/View/default/public/footer_min.html','./Application/Mobile/View/default/public/footer.html','./Application/Mobile/View/default/AjaxCommon/jobs_interview_add.html','./Application/Mobile/View/default/Company/com_info.html','./Application/Mobile/View/default/Jobs/comshow.html','./Application/Mobile/View/default/Jobs/show.html','./Application/Mobile/View/default/Members/bind_reg_com.html','./Application/Mobile/View/default/Members/reg_company.html','./Application/Mobile/View/default/Personal/resume_edit.html','./Application/Mobile/View/default/Personal/resume_replenish.html','./Application/Mobile/View/default/public/js/zepto.min.js','./Application/Mobile/View/default/Personal/ajax_tpl/ajax_get_work_list.html','./Application/Mobile/View/default/public/search.html','./Application/Mobile/View/default/Personal/service/order_list.html','./Application/Mobile/View/default/Jobfair/comlist.html','./Application/Mobile/Conf/mobile_page_config.php','./Application/Mobile/Controller/PersonalServiceController.class.php','./Application/Mobile/View/default/Personal/service/service_stick.html','./Application/Mobile/View/default/Personal/service/service_tag.html','./Application/Mobile/View/default/public/header.html','./Application/Mobile/Controller/CompanyController.class.php','./Application/Mobile/Controller/PersonalController.class.php','./Application/Mobile/View/default/public/js/qsCategory.js','./Application/Mobile/View/default/public/css/common.css','./Application/Mobile/View/default/public/css/personal.css','./Application/Mobile/View/default/public/css/resume.css','./Application/Mobile/View/default/Resume/show.html','./Application/Mobile/View/default/public/css/company.css','./Application/Mobile/View/default/Personal/resume_list.html','./Application/Mobile/View/default/Members/login.html','./Application/Mobile/View/default/Members/login_mobile.html','./Application/Mobile/View/default/AjaxCommon/resume_add_dig.html','./Application/Mobile/View/default/Members/user_getpass_email.html','./Application/Mobile/View/default/Members/reg_personal_email.html','./Application/Mobile/View/default/Members/reg.html','./Application/Mobile/View/default/Company/service/gold_add.html','./Application/Mobile/View/default/Company/service/service_emergency.html','./Application/Mobile/View/default/Company/service/service_famous.html','./Application/Mobile/View/default/Company/service/service_refresh.html','./Application/Mobile/View/default/Company/service/service_refresh_jobs_one.html','./Application/Mobile/View/default/Company/service/service_resume.html','./Application/Mobile/View/default/Company/service/service_sms.html','./Application/Mobile/View/default/Company/service/service_stick.html','./Application/Mobile/View/default/Company/service/setmeal_add.html','./Application/Mobile/View/default/Personal/service/service_stick.html','./Application/Mobile/View/default/Personal/service/service_tag.html','./Application/Mobile/Controller/CompanyServiceController.class.php','./Application/Mobile/Controller/MobileController.class.php','./Application/Mobile/Controller/PersonalServiceController.class.php','./Application/Mobile/View/default/Ajax_tpl/guide_pay_refresh_jobs.html','./Application/Mobile/View/default/Ajax_tpl/guide_pay_resume.html','./Application/Mobile/View/default/public/images/238.png','./Application/Mobile/View/default/public/css/common.css','./Application/Mobile/Controller/PersonalServiceController.class.php','./Application/Mobile/View/default/Personal/resume_list.html','./Application/Jobfair/View/default/Index/jobfair_reserve.html','./Application/Mall/View/default/Index/header.html');
    	foreach ($arr as $key => $val) {
    		$d[$val] = 1;
    	}
    	foreach ($d as $key => $val) {
    		$path = QSCMS_DATA_PATH.str_replace('./','setup/',$key);
    		$file = dirname($path);
    		if(!is_dir($file)) mkdir($file,0777,true);
    		if(copy($key,$path)){
                $n++;
            }else{
            	dump($key);
            }
    	}
    	dump(count($arr));
    	dump(count($d));
    	dump($n);
    }
	/**
	 * [index 首页]
	 */
	public function index(){
		if(!I('get.org','','trim') && C('PLATFORM') == 'mobile' && $this->apply['Mobile']){
            redirect(build_mobile_url());
		}
		if($this->apply['Subsite'] && $district = D('Subsite')->get_subsite_domain()){
			$ipInfos = GetIpLookup();
			foreach ($district as $key => $val) {
				if(strpos($val['s_districtname'],$ipInfos['district'])){
					$temp = $val;
					$district_org = $ipInfos['district'];
					break;
				}
				if(strpos($val['s_districtname'],$ipInfos['city'])){
					$temp = $val;
					$district_org = $ipInfos['city'];
					break;
				}
				if(strpos($val['s_districtname'],$ipInfos['province'])){
					$temp = $val;
					$district_org = $ipInfos['province'];
					break;
				}
			}
			if(!cookie('_subsite_domain') && C('SUBSITE_VAL.s_id') != $temp['s_id']){
				unset($district[$temp['s_id']]);
				$this->assign('subsite_org',$temp);
				$this->assign('district_org',$district_org);
				$domain = C('PLATFORM')=='mobile' && C('SUBSITE_VAL.s_m_domain') ? C('SUBSITE_VAL.s_m_domain') : C('SUBSITE_VAL.s_domain');
				cookie('_subsite_domain','http://'.$domain);
			}
			unset($district[C('SUBSITE_VAL.s_id')]);
			$this->assign('district',$district);
		}
		if(false === $oauth_list = F('oauth_list')){
            $oauth_list = D('Oauth')->oauth_cache();
        }
        $this->assign('verify_userlogin',$this->check_captcha_open(C('qscms_captcha_config.user_login'),'error_login_count'));
		$this->assign('oauth_list',$oauth_list);
		$this->display();
	}
	/**
	 * [ajax_user_info ajax获取用户登录信息]
	 */
	public function ajax_user_info(){
		if(IS_AJAX){
			!$this->visitor->is_login && $this->ajaxReturn(0,'请登录！');
			$uid = C('visitor.uid');
			if(C('visitor.utype') == 1){
				$info = M('CompanyProfile')->field('companyname,logo')->where(array('uid'=>$uid))->find();
				$views = M('ViewJobs')->where(array('jobs_uid'=>C('visitor.uid')))->group('uid')->getfield('uid',true);
				$info['views'] = count($views);
				$join = 'join '.C('DB_PREFIX') .'jobs j on j.id='.C('DB_PREFIX').'personal_jobs_apply.jobs_id';
				$info['apply'] = M('PersonalJobsApply')->join($join)->where(array('company_uid'=>$uid,'is_reply'=>array('eq',0)))->count();
			}else{
				$info['realname'] = M('MembersInfo')->where(array('uid'=>$uid))->getfield('realname');
				$info['pid'] = M('Resume')->where(array('uid'=>$uid,'def'=>1))->getfield('id');
				$info['countinterview'] = M('CompanyInterview')->where(array('resume_uid'=>$uid))->count();
				//谁看过我
				$rids = M('Resume')->where(array('uid'=>$uid))->getField('id',true);
				if($rids){
					$info['views'] = M('ViewResume')->where(array('resumeid'=>array('in',$rids)))->count();
				}else{
					$info['views'] = 0;
				}
			}
			$issign = D('MembersHandsel')->check_members_handsel_day(array('uid'=>$uid,'htype'=>'task_sign'));
        	$this->assign('issign',$issign ? 1 : 0);
			$this->assign('info',$info);
			$hour=date('G');
			if($hour<11){
				$am_pm = '早上好';
	        }
	        else if($hour<13)
	        {
	        	$am_pm = '中午好';
	        }
	        else if($hour<17)
	        {
	        	$am_pm = '下午好';
	        }
	        else
	        {
	        	$am_pm = '晚上好';
	        }
	        $this->assign('am_pm',$am_pm);
			$data['html'] = $this->fetch('ajax_user_info');
        	$this->ajaxReturn(1,'',$data);
		}
	}
	/**
	 * [index 首页搜索跳转]
	 */
	public function search_location(){
		$act = I('get.act','','trim');
		$key = I('get.key','','trim');
		$this->ajaxReturn(1,'',url_rewrite($act,array('key'=>$key)));
	}
	/**
	 * 保存到桌面
	 */
	public function shortcut(){
		$Shortcut = "[InternetShortcut]
		URL=".C('qscms_site_domain').C('qscms_site_dir')."?lnk
		IDList= 
		IconFile=".C('qscms_site_domain').C('qscms_site_dir')."favicon.ico
		IconIndex=100
		[{000214A0-0000-0000-C000-000000000046}]
		Prop3=19,2";
		header("Content-type: application/octet-stream"); 
		$ua = $_SERVER["HTTP_USER_AGENT"];
		$filename=C('qscms_site_name').'.url';
		$filename = urlencode($filename);
		$filename = str_replace("+", "%20", $filename);
		if (preg_match("/MSIE/", $ua)) {
		    header('Content-Disposition: attachment; filename="' . $filename . '"');
		} else if (preg_match("/Firefox/", $ua)) {
		    header('Content-Disposition: attachment; filename*="utf8\'\'' . $filename . '"');
		} else {
		    header('Content-Disposition: attachment; filename="' . $filename . '"');
		}
		exit($Shortcut);
	}
}
?>