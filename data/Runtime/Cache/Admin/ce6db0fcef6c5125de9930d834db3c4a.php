<?php if (!defined('THINK_PATH')) exit();?><div class="admin_management">
<?php if($userinfo[utype] == 1): ?><div style="height:60px;">对 <strong  style="color:#FF6600"><?php echo ($company_profile['companyname']); ?></strong>进行以下操作&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="<?php echo ($manage_url); ?>">进入会员中心>></a><br />
<span class="admin_note"><br />
用户名：<?php echo ($userinfo['username']); ?>，uid:<?php echo ($userinfo['uid']); ?>，招聘顾问：<?php echo ($consultant['name']); ?></span></div>
	<div class="mantit">业务管理</div>
	<div class="manitem"><a href="<?php echo U('CompanyMembers/user_points_edit',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>"><?php echo C('qscms_points_byname');?>管理</a></div>
	<div class="manitem"><a href="<?php echo U('CompanyMembers/user_setmeal_edit',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">套餐管理</a></div>
	<div class="manitem"><a href="<?php echo U('CompanyMembers/user_order',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">充值/订单</a></div>
	<div class="manitem"><a href="<?php echo U('CompanyMembers/user_increment',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">增值服务</a></div>
	<div class="manitem"><a href="<?php echo U('CompanyMembers/user_down',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">下载的简历</a></div>
	<div class="manitem"><a href="<?php echo U('CompanyMembers/user_jobs_apply',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">收到的简历</a></div>
	<div class="manitem"><a href="<?php echo U('CompanyMembers/user_interview',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">面试邀请</a></div>
	<div class="clear"></div>
	<div class="mantit">资料管理</div>
	<div class="manitem"><a href="<?php echo U('Jobs/index',array('key_type_cn'=>'会员ID','key_type'=>5,'key'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">职位管理</a></div>
	<div class="manitem"><a href="<?php echo U('Company/edit_company',array('id'=>$company_profile['id'],'_k_v'=>$company_profile['id']));?>">企业资料</a></div>
	<div class="manitem"><a href="<?php echo U('Company/license',array('id'=>$company_profile['id'],'_k_v'=>$company_profile['id']));?>">营业执照</a></div>
	<div class="manitem"><a href="<?php echo U('Company/img',array('id'=>$company_profile['id'],'_k_v'=>$company_profile['id']));?>">企业风采</a></div>
	<div class="manitem"><a href="<?php echo U('Company/tpl',array('id'=>$company_profile['id'],'_k_v'=>$company_profile['id']));?>">企业模板</a></div>
	<div class="manitem"><a href="<?php echo U('CompanyMembers/edit',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">会员资料</a></div>
	<div class="manitem"><a href="<?php echo U('CompanyMembers/edit',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">修改密码</a></div>
	<div class="clear"></div>
	<div class="mantit">分析统计</div>
	<div class="manitem"><a href="<?php echo U('Analyze/Admin/analyze_list_com',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">行为分析</a></div>
	<div class="manitem"><a href="<?php echo U('CompanyMembers/user_log',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">会员日志</a></div>
	<div class="manitem"><a href="<?php echo U('Company/mobile_recruit_statistics',array('id'=>$company_profile['id'],'_k_v'=>$company_profile['id']));?>">微信招聘</a></div>
	<div class="manitem"><a href="<?php echo U('Company/statistics_visitor',array('id'=>$company_profile['id'],'uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">招聘效果</a></div>
	<div class="clear"></div>
	<div class="mantit">联系会员<span>（手机:<?php if(!empty($userinfo['mobile'])): echo ($userinfo['mobile']); else: ?>未填写<?php endif; ?>，邮箱:<?php if(!empty($userinfo['email'])): echo ($userinfo['email']); else: ?>未填写<?php endif; ?>）</span></div>
	<div class="manitem"><a class="ajax_send_sms" href="javascript:;" parameter="mobile=<?php echo ($userinfo['mobile']); ?>&uid=<?php echo ($userinfo['uid']); ?>">发送短信</a></div>
	<div class="manitem"><a class="ajax_send_email" href="javascript:;" parameter="email=<?php echo ($userinfo['email']); ?>&uid=<?php echo ($userinfo['uid']); ?>">发送邮件</a></div>
	<div class="manitem"><a class="ajax_send_pms" href="javascript:;" parameter="tousername=<?php echo ($userinfo['username']); ?>">发站内信</a></div>
	<div class="clear"></div>
<?php else: ?>
	<div style="height:30px;">对 <strong  style="color:#FF6600"><?php echo ((isset($userinfo["realname"]) && ($userinfo["realname"] !== ""))?($userinfo["realname"]):$userinfo['username']); ?></strong>进行以下操作<span class="admin_note">用户名：<?php echo ($userinfo['username']); ?>，uid:<?php echo ($userinfo["uid"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="<?php echo ($manage_url); ?>">进入会员中心>></a></div>
	<div class="mantit">会员管理</div>
	<div class="manitem"><a target="_blank" href="<?php echo ($resume_manage); ?>">简历管理</a></div>
	<div class="manitem"><a href="<?php echo U('Personal/user_points_edit',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>"><?php echo C('qscms_points_byname');?>管理</a></div>
	<div class="manitem"><a href="<?php echo U('Order/index_per',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">充值/订单</a></div>
	<div class="manitem"><a href="<?php echo U('Personal/promotion',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">简历推广</a></div>
	<div class="manitem"><a href="<?php echo U('Personal/user_apply_jobs',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">申请的职位</a></div>
	<div class="manitem"><a href="<?php echo U('Personal/member_edit',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">个人资料</a></div>
	<div class="manitem"><a href="<?php echo U('Personal/member_edit',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">修改密码</a></div>
	<div class="clear"></div>
	<div class="mantit">分析统计</div>
	<div class="manitem"><a href="<?php echo U('Analyze/Admin/analyze_list_per',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">行为分析</a></div>
	<div class="manitem"><a href="<?php echo U('Personal/user_log',array('uid'=>$userinfo['uid'],'_k_v'=>$userinfo['uid']));?>">会员日志</a></div>
	<div class="clear"></div>
	<div class="mantit">联系会员<span>（手机:<?php if(!empty($userinfo['mobile'])): echo ($userinfo['mobile']); else: ?>未填写<?php endif; ?>，邮箱:<?php if(!empty($userinfo['email'])): echo ($userinfo['email']); else: ?>未填写<?php endif; ?>）</span></div>
	<div class="manitem"><a class="ajax_send_sms" href="javascript:;" parameter="mobile=<?php echo ($userinfo['mobile']); ?>&uid=<?php echo ($userinfo['uid']); ?>">发送短信</a></div>
	<div class="manitem"><a class="ajax_send_email" href="javascript:;" parameter="email=<?php echo ($userinfo['email']); ?>&uid=<?php echo ($userinfo['uid']); ?>">发送邮件</a></div>
	<div class="manitem"><a class="ajax_send_pms" href="javascript:;" parameter="tousername=<?php echo ($userinfo['username']); ?>">发站内信</a></div>
	<div class="clear"></div><?php endif; ?>
</div>
<script type="text/javascript">
	$(".ajax_send_sms").QSdialog({
	  DialogTitle:"发送短信",
	  DialogContentType:"url",
	  DialogContent:"<?php echo U('Ajax/ajax_send_sms');?>&"
	  });
	$(".ajax_send_email").QSdialog({
	  DialogTitle:"发送邮件",
	  DialogContentType:"url",
	  DialogContent:"<?php echo U('Ajax/ajax_send_email');?>&"
	  });
	$(".ajax_send_pms").QSdialog({
	  DialogTitle:"发送站内信",
	  DialogContentType:"url",
	  DialogContent:"<?php echo U('Ajax/ajax_send_pms');?>&"
	  });
</script>