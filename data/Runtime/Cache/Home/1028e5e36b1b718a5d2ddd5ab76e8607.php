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
		<link href="../public/css/company/company_user.css" rel="stylesheet" type="text/css" />
		<link href="../public/css/company/company_ajax_dialog.css" rel="stylesheet" type="text/css" />
		<script src="../public/js/company/jquery.common.js" type="text/javascript" language="javascript"></script>
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
  <div class="li link_gray6 J_hoverbut t18 <?php if(ACTION_NAME == 'com_info'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/com_info');?>'"><a href="<?php echo U('company/com_info');?>">企业资料</a></div>
  <div class="li link_gray6 J_hoverbut t19 <?php if(ACTION_NAME == 'com_img'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/com_img');?>'"><a href="<?php echo U('company/com_img');?>">企业风采</a></div>
  <div class="li link_gray6 J_hoverbut t20 <?php if(ACTION_NAME == 'com_auth'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/com_auth');?>'"><a href="<?php echo U('company/com_auth');?>">企业认证</a></div>
  <div class="li link_gray6 J_hoverbut t21 <?php if(ACTION_NAME == 'user_security' || $left_nav == 'user_security'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/user_security');?>'"><a href="<?php echo U('company/user_security');?>">账号安全</a></div>
  <div class="li link_gray6 J_hoverbut t22 <?php if(ACTION_NAME == 'pms_sys' || ACTION_NAME == 'pms_consult'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/pms_sys');?>'"><a href="<?php echo U('company/pms_sys');?>">我的消息</a></div>
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
</div>
 </div>
			<div class="mright">
				<div class="user_pagetitle">
					<div class="pat_l">企业认证</div>
					<div class="clear"></div>
				</div>
				<div class="user_tip w680">
					<div class="tiptit">小提示</div>
					<div class="tiptxt link_blue">
					我们强烈建议您认证企业营业执照，因为求职者更信任认证过的企业。
					</div>
				</div>
				<?php if($_GET['anew']== 1 or $company_profile['audit'] == '0'): ?><!--提交表单-->
					<div class="plan default">
						<span class="s1">1 提交营业执照</span>
						<span class="s2">2 等待审核</span>
						<span class="s3">3 审核结果</span>
						<div class="clear"></div>
					</div>
					<div class="authentication">
						<form id="authentication_form" action="<?php echo U('company/com_auth');?>" method="post">
							<div class="mb16 J_validate_group">
								<div class="key">企业全称：</div>
								<div class="val">
									<input name="companyname" id="companyname" type="text" class="input_245_34" value="<?php echo ($company_profile["companyname"]); ?>">
								</div>
								<div class="tip_box J_showtip_box"></div>
								<div class="clear"></div>
							</div>
							<div class="mb16 J_validate_group">
								<div class="key">注册号：</div>
								<div class="val">
									<input name="license" id="license" type="text" class="input_245_34" value="<?php echo ($company_profile["license"]); ?>">
								</div>
								<div class="tip_box J_showtip_box"></div>
								<div class="clear"></div>
							</div>
							<div class="mb16 J_validate_group">
								<div class="key">法人代表：</div>
								<div class="val">
									<input name="legal_person" id="legal_person" type="text" class="input_245_34" value="<?php echo ($company_profile["legal_person"]); ?>">
								</div>
								<div class="tip_box J_showtip_box"></div>
								<div class="clear"></div>
							</div>
						
							<div class="mb40 J_validate_group">
								<div class="key">上传营业执照：</div>
								<div id="J_imgWrap" class="val <?php if(!empty($company_profile['certificate_img'])): ?>select<?php endif; ?>">
									<div class="imgs">
										<img src="<?php echo attach($company_profile['certificate_img'],'certificate_img');?>">
										<a href="javascript:;" class="J_del del"></a>
									</div>
									<div class="J_tipWrap tipWrap">
										<div class="tipor">图片需清晰：注册号、企业名称、法人代表、年检章等需清晰可辨</div>
									</div>
									<div class="fileWrap">
										<input id="certificate_img" name="certificate_img" type="file" class="" value="添加照片">
										最大支持<?php echo ($max_size); ?>，支持jpg/gif/png格式
									</div>
								</div>
								<input type="hidden" id="certificate_img_up" name="certificate_img_up" value="<?php echo attach($company_profile['certificate_img'],'certificate_img');?>">
								<div class="tip_box pl0 J_showtip_box"></div>
								<div class="clear"></div>
							</div>
							<div class="mb16">
								<div class="key">&nbsp;</div>
								<div class="val">
									<input type="submit" id="J_submit" class="btn_blue J_hoverbut btn_115_38" value="提 交">
								</div>
								<div class="clear"></div>
							</div>
						</form>
					</div>
				<?php else: ?>
					<?php switch($company_profile['audit']): case "1": ?><!--审核通过-->
							<div class="plan not">
								<span class="s1">1 提交营业执照</span>
								<span class="s2">2 等待审核</span>
								<span class="s3">3 审核结果</span>
								<div class="clear"></div>
							</div>
							<div class="authentication pass">
								<div class="planIco">审核通过</div>
								<div class="planTip">恭喜您，您提交的营业执照通过审核了！</div>
							</div><?php break;?>
						<?php case "2": ?><!--等待审核-->
							<div class="plan wait">
								<span class="s1">1 提交营业执照</span>
								<span class="s2">2 等待审核</span>
								<span class="s3">3 审核结果</span>
								<div class="clear"></div>
							</div>
							<div class="authentication wait">
								<div class="planIco">认证资料已提交，等待审核中</div>
								<div class="planTip">我们会在1个工作日内审核您的资料，请耐心等待！</div>
							</div><?php break;?>
						<?php case "3": ?><!--审核不通过-->
							<div class="plan not">
								<span class="s1">1 提交营业执照</span>
								<span class="s2">2 等待审核</span>
								<span class="s3">3 审核结果</span>
								<div class="clear"></div>
							</div>
							<div class="authentication not">
								<div class="planIco">审核不通过</div>
								<div class="planTip">
									您好，您提交的企业认证资料未通过审核，请<a class="font_blue" href="<?php echo U('company/com_auth',array('anew'=>1));?>">重新认证</a>
									<span>原因：您上传的营业执由于被多个帐号认证，请勿重复提交！</span>
								</div>
							</div><?php break; endswitch; endif; ?>
			</div>
			<div class="clear"></div>
		</div>
	</body>
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
	<script src="../public/js/ajaxfileupload.js"></script>
	<script type="text/javascript" src="../public/js/jquery.validate.js"></script>
	<script src="../public/js/qscms.js"></script>
	<script type="text/javascript">
		$.upload('#certificate_img',{type:'certificate_img'},function(result){
			if(result.status == 1){
				$('#J_imgWrap').addClass('select').find('img').attr('src',result.data.url);
				$('input[name="certificate_img_up"]').val(result.data.img);
				$('#certificate_img_up').closest('.J_validate_group').find('.J_showtip_box').removeClass('pl0').html('<div class="ok"></div>');
			}else{
				alert(result.msg);
			}
		});
		$('.J_del').click(function(){
			$(this).prev('img').attr('src','');
			$('input[name="certificate_img_up"]').val('');
			$('#J_imgWrap').removeClass('select');
		});

		// 验证
		$("#authentication_form").validate({
	        rules: {
	            companyname: {
	                required: true
	            },
	            license: {
	                required: true
	            },
	            legal_person: {
	                required: true,
	                match: /^[\u4e00-\u9fa5]{2,20}$/
	            },
	            certificate_img_up: {
	                required: true
	            }
	        },
	        messages: {
	            companyname: {
	                required: '<div class="ftxt">请填写企业全称</div><div class="fimg"></div>'
	            },
	            license: {
	                required: '<div class="ftxt">请填写注册号</div><div class="fimg"></div>'
	            },
	            legal_person: {
	                required: '<div class="ftxt">请填写法人代表</div><div class="fimg"></div>',
	                match: '<div class="ftxt">法人代表格式不合法，请重新输入</div><div class="fimg"></div>'
	            },
	            certificate_img_up: {
	                required: '<div class="ftxt">请上传营业执照</div><div class="fimg"></div>'
	            }
	        },
	        errorClasses: {
	            companyname: {
	                required: 'tip err'
	            },
	            license: {
	                required: 'tip err'
	            },
	            legal_person: {
	                required: 'tip err',
	                match: 'tip err'
	            },
	            certificate_img_up: {
	                required: 'tip err'
	            }
	        },
	        errorElement: 'div',
	        errorPlacement: function(error, element) {console.log(element);
	            element.closest('.J_validate_group').find('.J_showtip_box').append(error);
	        },
	        success: function(label) {
	            label.append('<div class="ok"></div>');
	        }
	    });

	</script>
</html>