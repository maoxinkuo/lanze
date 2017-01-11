<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo ($page_seo["title"]); ?></title>
<meta name="keywords" content="<?php echo ($page_seo["keywords"]); ?>"/>
<meta name="description" content="<?php echo ($page_seo["description"]); ?>"/>
<meta name="author" content="骑士CMS"/>
<meta name="copyright" content="74cms.com"/>
<?php if($apply['Subsite']): ?><base href="<?php echo C('SUBSITE_DOMAIN');?>"/><?php endif; ?>
<link rel="shortcut icon" href="<?php echo C('qscms_site_dir');?>favicon.ico"/>
<script src="__HOMEPUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript">
	var app_spell = "<?php echo APP_SPELL;?>";
	var qscms = {
		base : "<?php echo C('SUBSITE_DOMAIN');?>",
		domain : "http://<?php echo ($_SERVER['HTTP_HOST']); ?>",
		root : "/ls/index.php",
		companyRepeat:"<?php echo C('qscms_company_repeat');?>",
		is_subsite : <?php if($apply['Subsite'] and C('SUBSITE_VAL.s_id') > 0): ?>1<?php else: ?>0<?php endif; ?>,
		subsite_level : "<?php echo C('SUBSITE_VAL.s_level');?>"
	};
	$(function(){
		$.getJSON("<?php echo U('Home/AjaxCommon/get_header_min');?>",function(result){
			if(result.status == 1){
				$('#J_header').html(result.data.html);
			}
		});
	})
</script>
		<link href="../public/css/company/common.css" rel="stylesheet" type="text/css" />
		<link href="../public/css/company/company_jobs.css" rel="stylesheet" type="text/css" />
		<link href="../public/css/company/company_ajax_dialog.css" rel="stylesheet" type="text/css" />
		<script src="../public/js/company/jquery.common.js" type="text/javascript" language="javascript"></script>
		<?php $tag_load_class = new \Common\qscmstag\loadTag(array('type'=>'category','cache'=>'0','列表名'=>'list',));$list = $tag_load_class->category();?>
	</head>
	<body>
		<div class="header_min" id="header">
	<div class="header_min_top">
		<div id="J_header" class="itopl font_gray6 link_gray6">
			<span class="link_yellow">欢迎登录<?php echo C('qscms_site_name');?>！请 <a href="<?php echo U('home/members/login');?>">登录</a> 或 <a href="<?php echo U('home/members/register');?>">免费注册</a></span>
		</div>
		<div class="itopr font_gray9 link_gray6 substring"> <a href="/ls/" class="home">网站首页</a>|<a href="<?php echo url_rewrite('QS_m');?>" class="m">手机访问</a>|<a href="<?php echo url_rewrite('QS_help');?>" class="help">帮助中心</a>|<?php if(!empty($apply['Mall'])): ?><a href="<?php echo url_rewrite('QS_mall_index');?>" class="shop"><?php echo C("qscms_points_byname");?>商城</a>|<?php endif; ?><a href="<?php echo U('Home/Index/shortcut');?>" class="last">保存到桌面</a> </div>
	    <div class="clear"></div>
	</div>
</div>
<div class="user_head">
  <div class="insidebox">
	<div class="logobox">
		<a href="/ls/"><img src="<?php if(C('qscms_logo_user')): echo attach(C('qscms_logo_user'),'resource'); else: ?>__HOMEPUBLIC__/images/logo_user.png<?php endif; ?>" border="0"/></a>
	</div>
	<div class="nav link_white">
			<div class="list <?php if($company_nav == 'index'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/index');?>'"><a href="<?php echo U('company/index');?>">企业中心</a></div>
			<div class="list <?php if($company_nav == 'jobs_list'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/jobs_list');?>'"><a href="<?php echo U('company/jobs_list');?>">职位管理</a></div>
			<div class="list <?php if($company_nav == 'jobs_apply'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/jobs_apply');?>'"><a href="<?php echo U('company/jobs_apply');?>">简历管理</a></div>
			<div class="list <?php if(CONTROLLER_NAME == 'CompanyService' || $company_nav == 'service'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('companyService/index');?>'"><a href="<?php echo U('companyService/index');?>">会员服务</a></div>
			<?php if(!empty($apply['Jobfair'])): ?><div class="list <?php if($company_nav == 'jobfair_list'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/jobfair_list');?>'"><a href="<?php echo U('company/jobfair_list');?>">招聘会</a></div><?php endif; ?>
			<div class="list <?php if($company_nav == 'com_info'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/com_info');?>'"><a href="<?php echo U('company/com_info');?>">账号管理</a></div>
	        <div class="clear"></div>
	</div>
  </div>
</div>
		<div class="user_main">
			<div class="mleft">
				<div class="left_jobs">
	<?php if($upper_limit == 1): ?><div class="J_addJobsDig li link_gray6 J_hoverbut t1 <?php if(ACTION_NAME == 'jobs_add'): ?>select<?php endif; ?>" href="javascript:;"><a href="javascript:;">发布职位</a></div>
	<?php else: ?>
		<div class="li link_gray6 J_hoverbut t1 <?php if(ACTION_NAME == 'jobs_add'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/jobs_add');?>'"><a href="<?php echo U('company/jobs_add');?>">发布职位</a></div><?php endif; ?>
  <div class="li link_gray6 J_hoverbut t2 <?php if(ACTION_NAME == 'jobs_list' || ACTION_NAME == 'jobs_edit'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/jobs_list');?>'"><a href="<?php echo U('company/jobs_list');?>">管理职位</a></div>
  <div class="li link_gray6 J_hoverbut t3 <?php if(ACTION_NAME == 'mobile_recruit' || ACTION_NAME == 'mobile_recruit_statistics'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('mobile_recruit');?>'"><a href="<?php echo U('mobile_recruit');?>">手机招聘</a></div>
  <div class="li link_gray6 J_hoverbut t4 <?php if($statistics_nav == 'statistics_visitor'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/statistics_visitor');?>'"><a href="<?php echo U('company/statistics_visitor');?>">招聘效果统计</a></div>
  <!-- -->
  <link href="../public/css/common_ajax_dialog.css" rel="stylesheet" type="text/css" />
<?php if(!empty($consultant)): ?><div class="service">
	<div class="tit"><strong>专属客服</strong></div>
	<div class="photo"><img src="<?php echo attach($consultant['pic'],'consultant');?>"  width="70"  height="70"   border="0"/></div>
	<div class="name"><?php echo ($consultant["name"]); ?></div>
	<div class="qq"><a target="blank" href="tencent://message/?uin=<?php echo ($consultant["qq"]); ?>&Site=menu&Menu=yes"><img border="0" SRC=http://wpa.qq.com/pa?p=1:<?php echo ($consultant["qq"]); ?>:1 alt="点击这里给我发消息"></a></div>
	<?php if($consultant['mobile'] || $consultant['tel']): ?><div class="tel">
		<?php if($consultant['mobile']): echo ($consultant["mobile"]); ?><br /><?php endif; ?>
		<?php if($consultant['tel']): echo ($consultant["tel"]); endif; ?>
	</div><?php endif; ?>
	<div class="btnbox">
	  <div class="btn_complaint J_hoverbut ">投诉TA</div>
	</div>
</div>
<script type="text/javascript">
	$(".btn_complaint").click(function(){
    	var url = "<?php echo U('Company/complaint_consultant');?>";
        var qsDialog = $(this).dialog({
            title: '投诉客服',
            loading: true,
            border: false,
            yes: function () {
            	var notes = $("#notes").val();
                $.post(url, {notes:notes},function (result) {
	                if (result.status == 1) {
	                	disapperTooltip('success', result.msg);
	                    qsDialog.setCloseDialog(true);
	                } else {
	                    disapperTooltip('remind', result.msg);
	                    qsDialog.setCloseDialog(false);
	                }
	            },'json');
            }
        });
        $.getJSON(url, function (result) {
            if (result.status == 1) {
                qsDialog.setContent(result.data);
            } else {
                disapperTooltip('remind', result.msg);
            }
        });
    });
</script><?php endif; ?>
 <!-- -->
</div>
 
			</div>
			<div class="mright">
				<div class="user_pagetitle">
					<div class="pat_l"><?php if($jobs['id']): ?>修改职位<?php else: ?>发布职位<?php endif; ?></div>
					<div class="pat_r">(注：带&nbsp;<span class="asterisk"></span> 号为必填项)</div>
					<div class="clear"></div>
				</div>
				<div class="user_tip w680">
					<div class="tiptit">小提示</div>
					<div class="tiptxt link_blue">
					亲爱的HR，您的帐号可同时发布 <?php echo ($setmeal["jobs_meanwhile"]); ?> 个职位，现已发布 <?php echo ($total); ?> 个职位。
					</div>
				</div>
				<div class="modTitle">职位信息</div>
				<form id="jobs_form" action="<?php echo U('company/jobs');?>" method="post">
					<div class="mod J_focus">
						<div class="mb16">
							<div class="modKey"><span></span>职位名称：</div>
							<div class="modVal">
								<div class="fl">
									<input name="jobs_name" id="jobs_name" type="text" class="input_245_34 fl" value="<?php echo ($jobs["jobs_name"]); ?>">
								</div>
								<div class="radio_list fl J_radioitme_parent">
									<?php if(is_array($category['QS_jobs_nature'])): $i = 0; $__LIST__ = $category['QS_jobs_nature'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nature): $mod = ($i % 2 );++$i;?><div class="rli <?php if($jobs['nature'] == $key or ($jobs['nature'] == 0 and $i == 1)): ?>checked<?php endif; ?> J_radioitme" data-code="<?php echo ($key); ?>"><?php echo ($nature); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
									<input class="J_radioitme_code" name="nature" id="nature" type="hidden" value="<?php echo ((isset($jobs["nature"]) && ($jobs["nature"] !== ""))?($jobs["nature"]):key($category['QS_jobs_nature'])); ?>"/>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="mb16">
							<div class="modKey"><span></span>职位类别：</div>
							<div class="modVal">
								<div class="select_input_multi select_205_34 fl J_hoverinput" id="J_showmodal_jobs" data-title="请选择职位类别" data-multiple="false" data-addjob="true" data-maxnum="0" <?php if(C('qscms_category_jobs_level') > 2): ?>data-width="667"<?php else: ?>data-width="520"<?php endif; ?> data-category="<?php echo C('qscms_category_jobs_level');?>">
									<span title="" class="result J_resuletitle_jobs"><?php echo ((isset($jobs['category_cn']) && ($jobs['category_cn'] !== ""))?($jobs['category_cn']):'请选择'); ?></span>
									<input class="J_resultcode_jobs" name="jobcategory" id="jobcategory" type="hidden" value="<?php if($jobs['topclass']): echo ($jobs["topclass"]); ?>.<?php echo ($jobs["category"]); ?>.<?php echo ($jobs["subclass"]); else: endif; ?>">
									<div class="clear"></div>
								</div>
								<div class="fl">
									<div class="modKey"><span></span>工作地区：</div>
									<div class="modVal">
										<div class="select_input_multi select_205_34 J_hoverinput" id="J_showmodal_city" data-title="请选择工作地区" data-multiple="false" data-addjob="true" data-maxnum="0" <?php if(C('qscms_category_district_level') > 2): ?>data-width="667"<?php else: ?>data-width="520"<?php endif; ?> data-category="<?php echo C('qscms_category_district_level');?>">
                      <span title="" class="result J_resuletitle_city"><?php echo ((isset($jobs['district_cn']) && ($jobs['district_cn'] !== ""))?($jobs['district_cn']):'请选择'); ?></span>
                      <input class="J_resultcode_city" name="districtcategory" id="districtcategory" type="hidden" value="<?php if($jobs['district']): echo ($jobs["district"]); ?>.<?php echo ($jobs["sdistrict"]); ?>.<?php echo ($jobs["tdistrict"]); else: endif; ?>">
                      <div class="clear"></div>
                    </div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="mb16">
							<div class="modKey"><span></span>薪资待遇：</div>
							<div class="modVal">
								<div class="input_unit nopl w110 fl">
									<input name="minwage" id="minwage" data-title="<?php echo ($jobs["minwage"]); ?>" value="<?php echo ($jobs["minwage"]); ?>" class="input_val pdl w110" type="text" placeholder="最低薪资" onkeyup="if(event.keyCode !=37 &amp;&amp; event.keyCode != 39) value=value.replace(/\D/g,'');" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/\D/g,''))">
									<div class="unit">元/月</div>
								</div>
								<div class="fl partition">-</div>
								<div class="input_unit nopl w110 fl">
									<input name="maxwage" id="maxwage" data-title="<?php echo ($jobs["maxwage"]); ?>" value="<?php echo ($jobs["maxwage"]); ?>" class="input_val pdl w110" type="text" placeholder="最高薪资" onkeyup="if(event.keyCode !=37 &amp;&amp; event.keyCode != 39) value=value.replace(/\D/g,'');" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/\D/g,''))">
									<div class="unit">元/月</div>
								</div>
								<label class="checkBox ml20 fl" for="J_negotiable"><input id="J_negotiable" class="J_switch" name="negotiable" id="negotiable" value="1" type="checkbox" <?php if($jobs['negotiable']): ?>checked="checked"<?php endif; ?>>面议</label>
							</div>
							<div class="clear"></div>
						</div>
						<div class="mb16">
							<div class="modKey">条件限制：</div>
							<div class="modVal">
								<div class="select_input w113 fl mr10 J_hoverinput J_dropdown J_listitme_parent">
									<span class="J_listitme_text"><?php if($jobs['education_cn'] == '不限'): ?>学历不限<?php else: echo ((isset($jobs["education_cn"]) && ($jobs["education_cn"] !== ""))?($jobs["education_cn"]):'学历不限'); endif; ?></span>
									<div class="dropdowbox13 J_dropdown_menu">
							            <div class="dropdow_inner13">
							                <ul class="nav_box">
							                	<li><a class="J_listitme" href="javascript:;" data-code="0">不限</a></li>
							                	<?php if(is_array($category['QS_education'])): $i = 0; $__LIST__ = $category['QS_education'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$education): $mod = ($i % 2 );++$i;?><li><a class="J_listitme" href="javascript:;" data-code="<?php echo ($key); ?>"><?php echo ($education); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							                </ul>
							            </div>
							        </div>
									<input class="J_listitme_code" name="education" id="education" type="hidden" value="<?php echo ((isset($jobs["education"]) && ($jobs["education"] !== ""))?($jobs["education"]):'0'); ?>" />
								</div>
								<div class="select_input w113 fl mr10 J_hoverinput J_dropdown J_listitme_parent">
									<span class="J_listitme_text"><?php if($jobs['experience_cn'] == '不限'): ?>经验不限<?php else: echo ((isset($jobs["experience_cn"]) && ($jobs["experience_cn"] !== ""))?($jobs["experience_cn"]):'经验不限'); endif; ?></span>
									<div class="dropdowbox13 J_dropdown_menu">
							            <div class="dropdow_inner13">
							                <ul class="nav_box">
							                	<li><a class="J_listitme" href="javascript:;" data-code="0">不限</a></li>
							                	<?php if(is_array($category['QS_experience'])): $i = 0; $__LIST__ = $category['QS_experience'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$experience): $mod = ($i % 2 );++$i;?><li><a class="J_listitme" href="javascript:;" data-code="<?php echo ($key); ?>"><?php echo ($experience); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							                </ul>
							            </div>
							        </div>
									<input class="J_listitme_code" name="experience" id="experience" type="hidden" value="<?php echo ((isset($jobs["experience"]) && ($jobs["experience"] !== ""))?($jobs["experience"]):'0'); ?>" />
								</div>
								<div class="select_input w113 fl mr10 J_hoverinput J_dropdown J_listitme_parent">
									<span class="J_listitme_text"><?php if($jobs['sex_cn'] == '不限'): ?>性别不限<?php else: echo ((isset($jobs["sex_cn"]) && ($jobs["sex_cn"] !== ""))?($jobs["sex_cn"]):'性别不限'); endif; ?></span>
									<div class="dropdowbox13 J_dropdown_menu">
							            <div class="dropdow_inner13">
							                <ul class="nav_box">
							                	<li><a class="J_listitme" href="javascript:;" data-code="0">不限</a></li>
							                	<li><a class="J_listitme" href="javascript:;" data-code="1">男</a></li>
							                	<li><a class="J_listitme" href="javascript:;" data-code="2">女</a></li>
							                </ul>
							            </div>
							        </div>
									<input class="J_listitme_code" name="sex" id="sex" type="hidden" value="<?php echo ((isset($jobs["sex"]) && ($jobs["sex"] !== ""))?($jobs["sex"]):'0'); ?>" />
								</div>
								<input name="amount" id="amount" type="text" class="input_110_34 w113 fl" value="<?php if($jobs['amount'] == 0): else: echo ($jobs["amount"]); endif; ?>" onkeyup="if(event.keyCode !=37 &amp;&amp; event.keyCode != 39) value=value.replace(/\D/g,'');" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/\D/g,''))" placeholder="招聘人数">
							</div>
							<div class="clear"></div>
						</div>
						<div class="mb16">
							<div class="modKey">年龄要求：</div>
							<div class="modVal">
								<div class="w205 fl">
									<div class="input_unit nopl unit_30 fl">
										<input name="minage" id="minage" class="input_val pdl w35" type="text" value="<?php if($jobs['age'][0] > 0): echo ($jobs['age'][0]); endif; ?>" onkeyup="if(event.keyCode !=37 &amp;&amp; event.keyCode != 39) value=value.replace(/\D/g,'');" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/\D/g,''))">
										<div class="unit">岁</div>
									</div>
									<div class="fl partition">-</div>
									<div class="input_unit nopl unit_30 fl">
										<input name="maxage" id="maxage" class="input_val pdl w35" type="text" value="<?php if($jobs['age'][1] > 0): echo ($jobs['age'][1]); endif; ?>" onkeyup="if(event.keyCode !=37 &amp;&amp; event.keyCode != 39) value=value.replace(/\D/g,'');" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/\D/g,''))">
										<div class="unit">岁</div>
									</div>
								</div>
								<div class="modKey">所属部门：</div>
								<div class="modVal">
									<input name="department" id="department" type="text" class="input_205_34" value="<?php echo ($jobs["department"]); ?>">
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="mb16">
							<div class="modKey">职位亮点：</div>
							<div class="modVal">
								<div class="select_input_multi w518 J_hoverinput" id="J_showmodal_jobtag" data-title="请选择职位亮点" data-multiple="true" data-maxnum="6" data-width="582">
									<span title="" class="result J_resuletitle_jobtag"><?php if($jobs['tag_cn'] == '' && $tagStr['cn'] != ''): echo ($tagStr['cn']); else: echo ((isset($jobs["tag_cn"]) && ($jobs["tag_cn"] !== ""))?($jobs["tag_cn"]):'请选择'); endif; ?></span>
									<input class="J_resultcode_jobtag" name="tag" type="hidden" id="tag" value="<?php if($jobs['tag'] == '' && $tagStr['id'] != ''): echo ($tagStr['id']); else: echo ((isset($jobs["tag"]) && ($jobs["tag"] !== ""))?($jobs["tag"]):'请选择'); endif; ?>">
									<div class="clear"></div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="mb16">
							<div class="modKey"><span></span>职位描述：</div>
							<div class="modVal">
								<textarea name="contents" id="contents" cols="" rows="" class="textarea_638_80 w518"><?php echo ($jobs["contents"]); ?></textarea>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="modTitle contact">联系方式</div>
					<div class="mod J_focus">
						<div class="J_contact contact">
							<div class="mb16">
								<div class="modKey"><span></span>联系人：</div>
								<div class="modVal">
									<input name="contact" id="contact" type="text" class="input_245_34 fl" value="<?php echo ($company_profile["contact"]); ?>">
									<label class="checkBox ml20 fl"><input name="contact_show" id="contact_show" class="J_dontopen" type="checkbox" <?php if($company_profile['contact_show'] == 0): ?>checked="checked" value="0"<?php else: ?>value="1"<?php endif; ?>>不公开</label>
								</div>
								<div class="clear"></div>
							</div>
							<div class="mb16">
								<div class="modKey"><span></span>联系电话：</div>
								<div class="modVal">
									<input name="telephone" id="telephone" type="text" class="input_245_34 fl" value="<?php echo ($company_profile["telephone"]); ?>" placeholder="请输入联系手机"  onkeyup="if(event.keyCode !=37 &amp;&amp; event.keyCode != 39) value=value.replace(/\D/g,'');" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/\D/g,''))">
									<label class="checkBox ml20 fl"><input name="telephone_show" id="telephone_show" class="J_dontopen" type="checkbox" <?php if($company_profile['telephone_show'] == 0): ?>checked="checked" value="0"<?php else: ?>value="1"<?php endif; ?>>不公开</label>
								</div>
								<div class="clear"></div>
							</div>
							<div class="mb16">
								<div class="modKey">&nbsp;</div>
								<div class="modVal">
									<input type="text" value="<?php echo ($telarray[0]); ?>" class="input_110_34 w60 mr4 fl" name="tel_first" id="tel_first" placeholder="区号" onkeyup="if(event.keyCode !=37 &amp;&amp; event.keyCode != 39) value=value.replace(/\D/g,'');" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/\D/g,''))">
									<input type="text" value="<?php echo ($telarray[1]); ?>" class="input_110_34 w89 mr4 fl" name="tel_next" id="tel_next" placeholder="固定电话" onkeyup="if(event.keyCode !=37 &amp;&amp; event.keyCode != 39) value=value.replace(/\D/g,'');" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/\D/g,''))">
									<input type="text" value="<?php echo ($telarray[2]); ?>" class="input_110_34 w52 fl" name="tel_last" id="tel_last" placeholder="分机号" onkeyup="if(event.keyCode !=37 &amp;&amp; event.keyCode != 39) value=value.replace(/\D/g,'');" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/\D/g,''))">
									<label class="checkBox ml20 fl"><input name="landline_tel_show" id="landline_tel_show" class="J_dontopen" type="checkbox" <?php if($company_profile['landline_tel_show'] == 0): ?>checked="checked" value="0"<?php else: ?>value="1"<?php endif; ?>>不公开</label>
								</div>
								<div class="clear"></div>
							</div>
							<div class="mb16">
								<div class="modKey">联系邮箱：</div>
								<div class="modVal reg-form-content">
									<input name="email" id="email" type="text" class="input_245_34 fl inputElem" value="<?php echo ($company_profile["email"]); ?>">
									<label class="checkBox ml20 fl"><input name="notify" id="notify" value="1" class="J_dontopen" type="checkbox" <?php if($company_profile['notify'] == 1): ?>checked="checked"<?php endif; ?>>接收投递的简历</label>
								</div>
								<div class="clear"></div>
							</div>
							<div class="mb16">
								<div class="modKey"><span></span>联系地址：</div>
								<div class="modVal">
									<input name="address" id="address" type="text" class="input_245_34 w518" value="<?php echo ($company_profile["address"]); ?>">
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="mb16">
							<div class="modKey">&nbsp;</div>
							<div class="modVal">
								<label class="checkBox fl"><input name="basis_contact" id="basis_contact" class="J_basic" type="checkbox" checked="checked">跟企业资料中的联系方式同步</label>
								<a href="javascript:;" class="J_other other fl">使用其它联系方式</a>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="modTitle advanced">高级设置</div>
					<div class="mod">
						<div>
							<div class="modKey">&nbsp;</div>
							<div class="modVal">
								<label class="checkBox fl"><input name="is_entrust" id="is_entrust" class="J_switch" type="checkbox" value="1" <?php if($jobs['is_entrust']): ?>checked="checked"<?php endif; ?>>接收委托投递的简历</label>
							</div>
							<div class="clear"></div>
						</div>
						<?php if(C('qscms_sms_open') == 1): ?><div class="mb30">
							<div class="modKey">&nbsp;</div>
							<div class="modVal">
								<label class="checkBox fl"><input name="notify_mobile" id="notify_mobile" class="J_switch" type="checkbox" value="0" <?php if($company_profile['notify_mobile'] && $visitor['sms_num'] > 0): ?>checked="checked"<?php endif; ?> <?php if($visitor['sms_num'] == 0): ?>disabled<?php endif; ?>>联系手机接收投递简历的通知</label>
								<?php if(C('qscms_company_sms') == 1): ?><div href="javascript:;" class="buySms fl">
									（您的可用短信条数为 <i class="smsMun"><?php echo ($visitor["sms_num"]); ?></i> 条
									<?php if(($visitor['sms_num']) == "0"): ?>，<a target="_blank" href="<?php echo U('CompanyService/increment_add',array('cat'=>'sms'));?>" class="buy">立即购买</a><?php endif; ?>）
								</div><?php endif; ?>
							</div>
							<div class="clear"></div>
						</div><?php endif; ?>
						<div class="mb16">
							<div class="modKey">&nbsp;</div>
							<div class="modVal">
							<input type="button" id="J_release" class="btn_blue J_hoverbut btn_80_38 w140" data-title="<?php if($jobs['id']): ?>保存职位<?php else: ?>发布职位<?php endif; ?>" value="<?php if($jobs['id']): ?>保存职位<?php else: ?>发布职位<?php endif; ?>">
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<input name="id" type="hidden" id="id" value="<?php echo ($jobs["id"]); ?>">
				</form>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
<div class="user_foot font_gray9" id="footer">© 2016 74cms.com All Right Reserved</div>
<div class="floatmenu">
  <div class="item mobile">
    <a class="blk"></a>
    <div class="popover popover1">
      <div class="popover-bd">
        <label>手机APP</label>
        <span class="img-qrcode img-qrcode-mobile"><img src="<?php echo U('Home/Qrcode/index',array('url'=>C('qscms_android_download')));?>" alt=""></span>
      </div>
    </div>
    <div class="popover">
      <div class="popover-bd">
        <label class="wx">企业微信</label>
        <span class="img-qrcode img-qrcode-wechat"><img src="<?php echo attach(C('qscms_weixin_img'),'resource');?>" alt=""></span>
      </div>
      <div class="popover-arr"></div>
    </div>
  </div>
  <div class="item ask">
    <a class="blk" target="_blank" href="<?php echo url_rewrite('QS_suggest');?>"></a>
  </div>
  <div id="backtop" class="item backtop" style="display: none;"><a class="blk"></a></div>
</div>
<script type="text/javascript" src="../public/js/jquery.modal.dialog.js"></script>
<script type="text/javascript" src="../public/js/jquery.tooltip.js"></script>
<script type="text/javascript" src="../public/js/jquery.disappear.tooltip.js"></script>
<script type="text/javascript" src="../public/js/jquery.listitem.js"></script>
<script type="text/javascript" src="../public/js/jquery.dropdown.js"></script>
<!--[if lt IE 9]>
	<script type="text/javascript" src="../public/js/PIE.js"></script>
  (function($){
      $.pie = function(name, v){
          // 如果没有加载 PIE 则直接终止
          if (! PIE) return false;
          // 是否 jQuery 对象或者选择器名称
          var obj = typeof name == 'object' ? name : $(name);
          // 指定运行插件的 IE 浏览器版本
          var version = 9;
          // 未指定则默认使用 ie10 以下全兼容模式
          if (typeof v != 'number' && v < 9) {
              version = v;
          }
          // 可对指定的多个 jQuery 对象进行样式兼容
          if ($.browser.msie && obj.size() > 0) {
              if ($.browser.version*1 <= version*1) {
                  obj.each(function(){
                      PIE.attach(this);
                  });
              }
          }
      }
  })(jQuery);
  if ($.browser.msie) {
    $.pie('.pie_about');
  };
<![endif]-->
<script type="text/javascript">
	var global = {
    h:$(window).height(),
    st: $(window).scrollTop(),
    backTop:function(){
      global.st > (global.h*0.5) ? $("#backtop").show() : $("#backtop").hide();
    }
  }
  $('#backtop').on('click',function(){
    $("html,body").animate({"scrollTop":0},500);
  });
  global.backTop();
  $(window).scroll(function(){
      global.h = $(window).height();
      global.st = $(window).scrollTop();
      global.backTop();
  });
  $(window).resize(function(){
      global.h = $(window).height();
      global.st = $(window).scrollTop();
      global.backTop();
  })
</script>
		<script type="text/javascript" src="../public/js/jquery.modal.userselectlayer.js"></script>
		<script type="text/javascript" src="../public/js/emailAutoComplete.js"></script>
	</body>
	<script type="text/javascript">
		$('.J_other').click(function(){
			$(this).hide();
			$('.J_contact').show();
			$('.J_basic').attr('checked',false);
		});
		$('.J_basic').click(function(){
			if(!$(this).is(":checked")){
				$('.J_other').hide();
				$('.J_contact').show();
				$('.J_basic').attr('checked',false);
			}else{
				$('.J_other').show();
				$('.J_contact').hide();
				$('.J_basic').attr('checked',true);
			}
		});
		<?php if(ACTION_NAME == 'edit_jobs'): ?>$('.J_other').click();<?php endif; ?>

		// 单选值切换
		$('.J_switch').click(function(event) {
			if ($(this).is(':checked')) {
				$(this).val('1');
			} else {
				$(this).val('0');
			}
		});

		if ($('#J_negotiable').is(':checked')) {
			$('#J_negotiable').closest('.modVal').find('.input_val').val('').prop('disabled', !0);
		} 
		// 面议选中后，最低和最高薪资不能编辑
		$('#J_negotiable').die().live('click', function(event) {
			if ($(this).is(':checked')) {
				$(this).closest('.modVal').find('.input_val').val('').prop('disabled', !0);
			} else {
				$(this).closest('.modVal').find('.input_val').each(function(index, el) {
					$(this).val($(this).data('title')).prop('disabled', 0);
				});
			}
		});

		// 发布职位验证表单并提交
		var regularMobile = /^13[0-9]{9}$|14[0-9]{9}$|15[0-9]{9}$|18[0-9]{9}$|17[0-9]{9}$/; // 验证手机号
		var regularEmail = /^[_\.0-9a-zA-Z-]+[_0-9a-zA-Z-]@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,3}$/; // 验证邮箱
		var regularTelFirst = /^[0-9]{3}[0-9]?$/; // 验证区号
		var regularTelNext = /^[0-9]{6,11}$/; // 验证电话号码
		var regularTelLast = /^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/; // 验证分机号码
		$('#J_release').click(function(){
			var id = $.trim($('#id').val());
			var jobsnameValue = $.trim($('#jobs_name').val());
			var natureValue = $.trim($('#nature').val());
			var jobcategoryValue = $.trim($('#jobcategory').val());
			var districtcategoryValue = $.trim($('#districtcategory').val());
			var minwageValue = $.trim($('#minwage').val());
			var maxwageValue = $.trim($('#maxwage').val());
			var educationValue = $.trim($('#education').val());
			var experienceValue = $.trim($('#experience').val());
			var sexValue = $.trim($('#sex').val());
			var amountValue = $.trim($('#amount').val());
			var minageValue = $.trim($('#minage').val());
			var maxageValue = $.trim($('#maxage').val());
			var departmentValue = $.trim($('#department').val());
			var tagValue = $.trim($('#tag').val());
			var contentsValue = $.trim($('#contents').val());
			var contactValue = $.trim($('#contact').val());
			var telephoneValue = $.trim($('#telephone').val());
			var telfirstValue = $.trim($('#tel_first').val());
			var telnextValue = $.trim($('#tel_next').val());
			var tellastValue = $.trim($('#tel_last').val());
			var landlinetelValue = telfirstValue+'-'+telnextValue+'-'+tellastValue;
			var emailValue = $.trim($('#email').val());
			var addressValue = $.trim($('#address').val());
			var negotiableValue = $('#J_negotiable').is(":checked")?1:0;
			var contactshowValue = $('#contact_show').is(":checked")?0:1;
			var telephoneshowValue = $('#telephone_show').is(":checked")?0:1;
			var landlinetelshowValue = $('#landline_tel_show').is(":checked")?0:1;
			var emailshowValue = $('#email_show').is(":checked")?0:1;
			var isentrustValue = $('#is_entrust').is(":checked")?1:0;
			var notifyValue = $('#notify').is(":checked")?1:0;
			var notifymobileValue = $('#notify_mobile').is(":checked")?1:0;
			if (jobsnameValue == "") {
				disapperTooltip("remind", "请填写职位名称");
				return false;
			}
			if (natureValue == "") {
				disapperTooltip("remind", "请选择职位性质");
				return false;
			}
			if (jobcategoryValue == "") {
				disapperTooltip("remind", "请选择职位类别");
				return false;
			}
			if (districtcategoryValue == "") {
				disapperTooltip("remind", "请选择工作地区");
				return false;
			}
			if (!$('#J_negotiable').is(':checked')) {
				if (!minwageValue.length || minwageValue==0) {
					disapperTooltip("remind", "请填写最低薪资");
					return false;
				}
				if (minwageValue != "" && !regularTelLast.test(minwageValue)) {
					disapperTooltip("remind", "薪资应为数字");
					return false;
				}
				if (!maxwageValue.length) {
					disapperTooltip("remind", "请填写最高薪资");
					return false;
				}
				if (maxwageValue != "" && !regularTelLast.test(maxwageValue)) {
					disapperTooltip("remind", "薪资应为数字");
					return false;
				}
				if (minwageValue != "" && maxwageValue != "" && parseInt(minwageValue) > parseInt(maxwageValue)) {
					disapperTooltip("remind", "最低薪资不能大于最高薪资");
					return false;
				}
				if (parseInt(maxwageValue) > (parseInt(minwageValue) * 2)) {
					disapperTooltip("remind", "最高薪资不能超过最低薪资的2倍");
					return false;
				}
			}
			if (educationValue == "") {
				disapperTooltip("remind", "请选择学历");
				return false;
			}
			if (experienceValue == "") {
				disapperTooltip("remind", "请选择工作经验");
				return false;
			}
			if (sexValue == "") {
				disapperTooltip("remind", "请选择性别");
				return false;
			}
			if (amountValue != "" && !regularTelLast.test(amountValue)) {
				disapperTooltip("remind", "招聘人数应为数字");
				return false;
			}
			if (minageValue != "" && !regularTelLast.test(minageValue)) {
				disapperTooltip("remind", "年龄应为数字");
				return false;
			}
			if (minageValue != "" && parseInt(minageValue) < 16) {
				disapperTooltip("remind", "最小年龄不能小于16岁");
				return false;
			}
			if (minageValue != "" && parseInt(minageValue) > 65) {
				disapperTooltip("remind", "年龄不能大于65岁");
				return false;
			}
			if (maxageValue != "" && !regularTelLast.test(maxageValue)) {
				disapperTooltip("remind", "年龄应为数字");
				return false;
			}
			if (maxageValue != "" && parseInt(maxageValue) < 16) {
				disapperTooltip("remind", "年龄不能小于16岁");
				return false;
			}
			if (maxageValue != "" && parseInt(maxageValue) > 65) {
				disapperTooltip("remind", "最大年龄不能大于65岁");
				return false;
			}
			if (maxageValue != "" && minageValue != "" && parseInt(minageValue) > parseInt(maxageValue)) {
				disapperTooltip("remind", "最小年龄不能大于最大年龄");
				return false;
			}
			if (contentsValue == "") {
				disapperTooltip("remind", "请填写职位描述");
				return false;
			}
			if (contactValue == "") {
				disapperTooltip("remind", "请填写联系人");
				return false;
			}
			if (contactValue != "" && contactValue.length > 10) {
				disapperTooltip("remind", "联系人1-10个字");
				return false;
			}
			if(telnextValue=="" && telephoneValue=="") {
				disapperTooltip("remind", "请填写联系手机或座机");
				return false;
			} else {
				if (telephoneValue != "" && !regularMobile.test(telephoneValue)) {
					disapperTooltip("remind", "手机号格式不正确");
					return false;
				}
				if (telfirstValue != "" && !regularTelFirst.test(telfirstValue)) {
					disapperTooltip("remind", "请填写正确的区号");
					return false;
				}
				if (telnextValue != "" && !regularTelNext.test(telnextValue)) {
					disapperTooltip("remind", "电话号码为6-11位数字");
					return false;
				}
				if (tellastValue != "" && !regularTelLast.test(tellastValue)) {
					disapperTooltip("remind", "分机号码为数字");
					return false;
				}
				if (tellastValue != "" && !regularTelLast.test(tellastValue) || tellastValue.length > 4) {
					disapperTooltip("remind", "分机号码不能超出4位");
					return false;
				}
			}
			if (emailValue != "" && !regularEmail.test(emailValue) || emailValue.split("@")[0].length > 20) {
				disapperTooltip("remind", "邮箱格式不正确");
				return false;
			}
			if (addressValue == "") {
				disapperTooltip("remind", "联系地址不能为空");
				return false;
			}
			if (addressValue != "" && addressValue.length > 30) {
				disapperTooltip("remind", "联系地址不能大于30个字");
				return false;
			}
			$('#J_release').val('保存中...').addClass('btn_disabled').prop('disabled', !0);
			$.ajax({
				url: "<?php echo U('company/jobs_add');?>",
				type: 'POST',
				dataType: 'json',
				data: {id:id,jobs_name: jobsnameValue, nature: natureValue, jobcategory: jobcategoryValue, districtcategory: districtcategoryValue, minwage: parseInt(minwageValue), maxwage: parseInt(maxwageValue), negotiable: negotiableValue, education: educationValue, experience: experienceValue, sex: sexValue, amount: amountValue, minage: parseInt(minageValue), maxage: parseInt(maxageValue), department: departmentValue, tag: tagValue, contents: contentsValue, contact: contactValue, telephone: telephoneValue, landline_tel: landlinetelValue, email: emailValue, address: addressValue, contact_show: contactshowValue, telephone_show: telephoneshowValue, landline_tel_show: landlinetelshowValue, email_show: emailshowValue, is_entrust: isentrustValue, notify: notifyValue, notify_mobile: notifymobileValue}
			})
			.done(function(data) {
				if (parseInt(data.status)) {
					disapperTooltip('success',data.msg);
					location.href = data.data;
				} else {
					$('#J_release').val($('#J_release').data('title')).removeClass('btn_disabled').prop('disabled', 0);
					disapperTooltip("remind", data.msg);
				}
			})
			.fail(function(result) {
				$('#J_release').val($('#J_release').data('title')).removeClass('btn_disabled').prop('disabled', 0);
				disapperTooltip("remind", result.msg);
			});
		});
	</script>
</html>