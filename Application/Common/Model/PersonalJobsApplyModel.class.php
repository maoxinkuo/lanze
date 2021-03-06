<?php
namespace Common\Model;
use Think\Model;
class PersonalJobsApplyModel extends Model{
	public $state_arr = array('1'=>'合适','2'=>'不合适','3'=>'待定','4'=>'未接通');
	protected $_validate = array(
		array('resume_id,resume_name,personal_uid,jobs_id,jobs_name,company_id,company_name,company_uid','identicalNull','',0,'callback'),
		array('resume_id,personal_uid,jobs_id,huntet_id,huntet_uid','identicalEnum','',0,'callback'),
	);
	protected $_auto = array ( 
		array('apply_addtime','time',1,'function'),
		array('personal_look',1),
		array('is_apply',2),
	);
	/*
		获取 申请职位列表
		$data  查询条件
		$data['personal_uid']=session('uid');
		$data['resume_id']=$resume_id;
		$data['personal_look']=$personal_look;
		$data['apply_addtime']=array('gt',$time);
		$data['is_reply']=$is_reply;
		
		返回值 数组
		$rst['list'] 数据列表 array
		$rst['page'] 分页

	*/
	public function get_apply_jobs($data,$utype=2,$state=0,$pagesize=10)
	{
		$db_pre = C('DB_PREFIX');
		$this_t = $db_pre.'personal_jobs_apply';
		foreach($data as $key=>$val){
			$data[$this_t.'.'.$key] = $val;
			unset($data[$key]);
		}
		if($state)
		{
			$data[$this_t.'.is_reply']=$state;
		}
		if(C('apply.Subsite')){
			if(false === $subsite_district = F('subsite_district')) $subsite_district = D('Subsite')->subsite_district_cache();
		}
		if($utype==2)//个人查看
		{
			$join = 'join '.$db_pre .'jobs j on j.id='.$this_t.'.jobs_id';
			$count = $this->where($data)->join($join)->count();
			$pager =  pager($count, $pagesize);
			$rst['list'] = $this->where($data)->join($join)->field($this_t.'.*,j.tdistrict,j.sdistrict,j.district,j.addtime,j.company_id,j.companyname,j.company_addtime,j.minwage,j.maxwage,j.district_cn,j.deadline,j.refreshtime,j.click')->order($this_t.'.is_reply asc,did desc')->limit($pager->firstRow . ',' . $pager->listRows)->select();
			
			foreach ($rst['list'] as $key => $val) 
			{
				if (empty($val['companyname']))
				{
					$jobs= M('JobsTmp')->where(array('id'=>$val['jobs_id']))->find();
					$val['addtime']=$jobs['addtime'];
					$val['companyname']=$jobs['companyname'];
					$val['company_addtime']=$jobs['company_addtime'];
					$val['company_id']=$jobs['company_id'];
					$val['minwage']=$jobs['minwage'];
					$val['maxwage']=$jobs['maxwage'];
					$val['tdistrict'] = $jobs['tdistrict'];
					$val['sdistrict'] = $jobs['sdistrict'];
					$val['district'] = $jobs['district'];
					$val['district_cn']=$jobs['district_cn'];
					$val['deadline']=$jobs['deadline'];
					$val['refreshtime']=$jobs['refreshtime'];
					$val['click']=$jobs['click'];
				}
				
				$val['company_url']=url_rewrite('QS_companyshow',array('id'=>$val['company_id']));
				$val['belong_name'] = $val['company_name'];
				C('apply.Subsite') && $subsite_id = $subsite_district[$val['tdistrict']]?:($subsite_district[$val['sdistrict']]?:$subsite_district[$val['district']]);
				$val['jobs_url']=url_rewrite('QS_jobsshow',array('id'=>$val['jobs_id']),$subsite_id);
				//答复状态
				if($val['personal_look']=='1')
				{
					$val['reply_status'] = "企业未查看";
				}
				else
				{
					if($val['is_reply']=='0')
					{
						$val['reply_status'] = "待反馈";
					}
					elseif($val['is_reply']=='1')
					{
						$val['reply_status'] = "合适";
					}
					elseif($val['is_reply']=='2')
					{
						$val['reply_status'] = "不合适";
					}
					elseif($val['is_reply']=='3')
					{
						$val['reply_status'] = "待定";
					}
					elseif($val['is_reply']=='4')
					{
						$val['reply_status'] = "未接通";
					}
				}
				$rst['list'][$key] = $val;
			}
		}
		elseif($utype==1)//企业查看
		{
			$join = 'left join '.$db_pre .'resume r on r.id='.$this_t.'.resume_id';
			$join1 = 'join '.$db_pre .'jobs j on j.id='.$this_t.'.jobs_id';
			$count = $this->where($data)->join($join)->join($join1)->count();
			$pager =  pager($count, $pagesize);
			$rst['list'] = $this->where($data)->join($join)->join($join1)->field($this_t.'.*,j.tdistrict,j.sdistrict,j.district,j.company_id,j.companyname,j.company_addtime,j.deadline,j.click,r.id,r.uid as ruid,r.fullname,r.display_name,r.sex_cn,r.sex,r.education_cn,r.experience_cn,r.major_cn,r.intention_jobs,r.district_cn,r.wage_cn,r.trade_cn,r.nature_cn,r.birthdate,r.addtime,r.refreshtime,r.display')->order('did desc')->limit($pager->firstRow . ',' . $pager->listRows)->select();
			foreach ($rst['list'] as $key => $val) 
			{
				$resume = M('Resume')->where(array('id'=>$val['resume_id']))->find();
				if($resume)
				{
					$val['resume_name'] = $resume['title'];
				}
				else
				{
					$val['resume_name'] = "该简历已经删除";
				}
				if (empty($val['companyname']))
				{
					$jobs= M('JobsTmp')->where(array('id'=>$val['jobs_id']))->find();
					$val['companyname']=$jobs['companyname'];
					$val['company_addtime']=$jobs['company_addtime'];
					$val['company_id']=$jobs['company_id'];
					$val['tdistrict'] = $jobs['tdistrict'];
					$val['sdistrict'] = $jobs['sdistrict'];
					$val['district'] = $jobs['district'];
					$val['deadline']=$jobs['deadline'];
					$val['click']=$jobs['click'];
				}
				$setmeal=D('MembersSetmeal')->get_user_setmeal($val['company_uid']);
				if($setmeal['show_apply_contact']=="0"){
					if ($val['display_name']=="2")
					{
						$val['fullname']="N".str_pad($val['id'],7,"0",STR_PAD_LEFT);
					}
					elseif ($val['display_name']=="3")
					{
						if($val['sex']==1){
							$val['fullname']=cut_str($val['fullname'],1,0,"先生");
						}
						elseif($val['sex']==2){
							$val['fullname']=cut_str($val['fullname'],1,0,"女士");
						}
					}
				}
				C('apply.Subsite') && $subsite_id = $subsite_district[$val['tdistrict']]?:($subsite_district[$val['sdistrict']]?:$subsite_district[$val['district']]);
				$val['jobs_url']=url_rewrite('QS_jobsshow',array('id'=>$val['jobs_id']),$subsite_id);
				$val['jobs_name_']=cut_str($val['jobs_name'],7,0,"...");
				$val['specialty_']=$val['specialty'];
				$val['specialty']=cut_str($val['specialty'],30,0,"...");
				$y=date("Y");
				if(intval($val['birthdate']) == 0)
				{
					$val['age']='';
				}
				else
				{
					$val['age']=$y-$val['birthdate'];
				}
				/* 教育经历 培训经历 */
				// $val['resume_education_list']=M('ResumeEducation')->where(array('uid'=>$val['ruid'],'pid'=>$val['resume_id']))->select();
				// $val['resume_work_list']=M('ResumeWork')->where(array('uid'=>$val['ruid'],'pid'=>$val['resume_id']))->select();
				/*
					获取简历标记
				*/
				// $val_state= M('CompanyLabelResume')->where(array('uid'=>$data['company_uid'],'resume_id'=>$val['resume_id']))->find();
				// $val['resume_state']=$val_state['resume_state'];
				// $val['resume_state_cn']=$val_state['resume_state_cn'];
				$rst['list'][$key] = $val;
			}
		}
		$rst['count'] = $count;
		$rst['page'] = $pager->fshow();
		return $rst;
	}
	/*
		删除 申请的职位
		@$del_id 删除id 多个用,分割
		@$user 会员信息 uid,username,utype 
		
		返回值 数组
		@state 删除状态 0 失败，1成功
		@error 错误信息
		@num   删除行数
	*/
	public function del_jobs_apply($del_id,$user)
	{
		if (!is_array($del_id)) $del_id=array($del_id);
		$sqlin=implode(",",$del_id);
		if (!preg_match("/^(\d{1,10},)*(\d{1,10})$/",$sqlin)) return array('state'=>0,'error'=>'del_id 错误！');
		$where['did']=array('in',$sqlin);
		if($user['utype']==1)
		{
			$where['company_uid']=$user['uid'];
		}
		elseif($user['utype']==2)
		{
			$where['personal_uid']=$user['uid'];
		}
		$num = $this->where($where)->delete();
		if(false === $num) return array('state'=>0,'error'=>'删除失败！');
		//写入会员日志
		write_members_log($user,1013,$sqlin);
		return array('state'=>1,'num'=>$num);
	}
	/*
		获取今天投递简历数
		@$uid 会员uid

		返回值 $total 投递次数 int
	*/
	public function get_now_applyjobs_num($uid)
	{
		$now = mktime(0,0,0,date("m"),date("d"),date("Y"));
		$where['personal_uid']=intval($uid);
		$where['apply_addtime']=array('gt',$now);
		$num = $this->where($where)->count();
		$num1 = M('PersonalHunterJobsApply')->where($where)->count();
		return $num+$num1;
	}
	/*
		企业对申请职位的简历进行 设为已看
	*/
	public function set_apply($did,$user,$setlook)
	{
		if (!is_array($did)) $did=array($did);
		$where['did']=array('in',$did);
		$where['company_uid']=$user['uid'];
		$num = $this->where($where)->setField('personal_look',intval($setlook));
		if(false === $num) return array('state'=>0,'error'=>'设置失败！');
		//写入会员日志
		write_members_log($user,1016,implode(",", $did));
		return array('state'=>1,'num'=>$num);
	}
	
    /*添加个人申请职位
	 * $data POST 值
	 */
	public function jobs_apply_add($jids,$user,$rid){
		$points = 0;
		$jids = is_array($jids)?$jids:explode(",",$jids);
		$count = $this->where(array('personal_uid'=>$user['uid'],'apply_addtime'=>array('egt',strtotime('today'))))->count('did');
		if(C('qscms_apply_jobs_max') < $count+count($jids)) return array('state'=>0,'error'=>"您每天可以投递".C('qscms_apply_jobs_max')."个职位，今天已投递了{$count}个");
		if($rid){
			$resume = M('Resume')->field('id,fullname,title,district_cn as district,experience,experience_cn,education,intention_jobs as jobs')->where(array('id'=>$rid,'uid'=>$user['uid']))->find();
		}else{
			$resume = M('Resume')->field('id,fullname,title,district_cn as district,experience,experience_cn,education,intention_jobs as jobs')->where(array('uid'=>$user['uid']))->order('def desc')->find();
		}
		if(!$resume) return array('state'=>0,'error'=>'请先添加简历！','create'=>1);
		$resume['work'] = M('ResumeWork')->where(array('id'=>$resume['id']))->getfield('id');
		$resume['educations'] = M('ResumeEducation')->where(array('id'=>$resume['id']))->getfield('id');
		$jobs = M('Jobs')->where(array('id'=>array('in',$jids)))->getfield('id as jobs_id,uid as company_uid,jobs_name,company_id,companyname as company_name');
		
		if(count($jobs) < $count = count($jids)) $jobs_tmpl = M('PersonalFavorites')->where(array('personal_uid'=>$user['uid'],'jobs_id'=>array('in',$jids)))->getfield('jobs_id,jobs_name');
		$check_jobs = $this->where(array('jobs_id'=>array('in',$jids),'resume_id'=>$resume['id']))->getfield('jobs_id,resume_id');
		foreach($jids as $val){
			$jobs_name = $jobs[$val] ? $jobs[$val]['jobs_name'] : $jobs_tmpl[$val];
			$list[$val] = array('id'=>$val,'jobs_name'=>$jobs_name,'company_id'=>$jobs[$val]['company_id'],'company_name'=>$jobs[$val]['company_name'],'status'=>0);
			if(!$jobs[$val]){
				$list[$val]['tip'] = '该职位已关闭';
				$list[$val]['status'] = 2;
				continue;
			}
			if($check_jobs[$val]){
				$list[$val]['tip'] = '您已经申请过这个职位了';
				$list[$val]['status'] = 3;
				continue;
			}
			$jobs[$val]['resume_id'] = $resume['id'];
			$jobs[$val]['resume_name'] = $resume['title'];
			$jobs[$val]['personal_uid'] = $user['uid'];
			if(false !== $this->create($jobs[$val])){
				if(false !== $insertid = $this->add()){
					$list[$val]['tip'] = '投递成功';
					$list[$val]['status'] = 1;
					$success++;
					$reg = D('TaskLog')->do_task($user,4);//做任务记录积分操作,4:投递简历
					$reg['state'] && $points+=$reg['data'];

					$jobs_contact = D('JobsContact')->where(array('pid'=>$val))->find();
					$statistics_data['comid'] = $jobs[$val]['company_id'];
			        $statistics_data['jobid'] = $val;
			        $statistics_data['uid'] = $user['uid'];
			        $statistics_data['apply'] = 1;
			        $statistics_model = D('CompanyStatistics');
			        $statistics_model->create($statistics_data);
			        $statistics_model->add();
					//发送邮件
					$mailconfig=D('Mailconfig')->get_cache();//获取邮件规则
					$sms=D('SmsConfig')->get_cache();
					if($mailconfig['set_applyjobs'] == 1 && $jobs_contact['notify']==1){
						$useremail = D('Members')->get_user_one(array('uid'=>$jobs[$val]['company_uid']));
						$resume_tpl = D('Resume')->get_outward_resumes_tpl($resume['uid'],$resume['id']);
			            $send_mail['sendto_email']=$useremail['email'];
			            $send_mail['subject']=$resume['fullname'];
			            $send_mail['body']=$resume_tpl;
			            D('Mailconfig')->send_mail($send_mail);
					}
					//sms
					if(C('qscms_sms_open')==1 && $sms['set_applyjobs']== 1 && $jobs_contact['notify_mobile'] == 1){
						$send_sms = true;
						if(C('qscms_company_sms')==1){
							$user_sms_num = D('Members')->where(array('uid'=>$jobs[$val]['company_uid']))->getField('sms_num');
							if($user_sms_num==0){
								$send_sms = false;
							}
						}
						if($send_sms==true){
							$usermobile = D('Members')->get_user_one(array('uid'=>$jobs[$val]['company_uid']));
							$r = D('Sms')->sendSms('notice',array('mobile'=>$usermobile['mobile'],'tpl'=>'set_applyjobs','data'=>array('jobsname'=>$jobs_name)));
							if($r===true){
								D('Members')->where(array('uid'=>$jobs[$val]['company_uid']))->setDec('sms_num');
							}
						}
					}
					//微信
					if(false === $module_list = F('apply_list')) $module_list = D('Apply')->apply_cache();
					if($module_list['Weixin']){
						D('Weixin/TplMsg')->set_applyjobs($jobs[$val]['company_uid'],$resume['id'],$jobs_name,$resume['fullname'],$resume['experience_cn']);
					}
					continue;
				}
			}
			$list[$val]['tip'] = $this->getError();//'投递失败';
		}
		return array('state'=>1,'data'=>array('count_jids'=>count($jids),'list'=>$list,'total'=>$count,'points'=>$points,'success'=>$success,'failure'=>$count - $success));
	}
	/**
	 * 获取申请职位总数
	 */
	public function count_jobs_apply($uid){
		return $this->where(array('personal_uid'=>$uid))->count();
	}
	/**
	 * 检测是否申请过职位
	 */
	public function check_jobs_apply($resume_id,$company_uid,$jobs_id=false){
		$where['resume_id'] = $resume_id;
		$where['company_uid'] = $company_uid;
		$jobs_id && $where['jobs_id'] = $jobs_id;
		return $this->where($where)->find();
	}
	/**
	 * 获取申请过职位的简历id
	 */
	public function get_jobs_apply_resume_id($rid,$company_uid,$jobs_id=false){
		$where['resume_id'] = array('in',$rid);
		$where['company_uid'] = $company_uid;
		$jobs_id && $where['jobs_id'] = $jobs_id;
		return $this->where($where)->getField('resume_id,did');
	}
}
?>