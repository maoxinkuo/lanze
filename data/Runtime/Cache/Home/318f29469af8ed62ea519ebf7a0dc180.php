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
				<div class="user_pagetitle safety_user_pagetitle">
					<div class="pat_l">账号安全</div>
					<div class="clear"></div>
				</div>
				<div class="user_tab">
					<a href="<?php echo U('company/user_security');?>" class="tabli select" >账号安全</a>
					<a href="<?php echo U('company/user_loginlog');?>" class="tabli">登录日志</a>
					<div class="clear"></div>
				</div>
				<div class="user_tip w680">
					<div class="tiptit">小提示</div>
					<div class="tiptxt link_blue">
					手机号、邮箱认证通过后可增强您账号的安全性，也可通过已认证的手机号、邮箱快速登录帐号。
					</div>
				</div>
				<div class="safety J_hoverbut link_blue">
					<div class="td1">用户名</div>
					<div id="J_unameWrap" class="td2"><?php echo ($visitor["username"]); ?></div>
					<div class="td3">&nbsp;</div>
					<div class="td4"><a id="J_edit_uname" href="javascript:;">修改</a></div>
					<div class="clear"></div>
				</div>
				<div class="safety J_hoverbut link_blue">
					<div class="td1 t1">密码</div>
					<div class="td2">上次登录时间：<span><?php echo date('Y-m-d H:i:s',$visitor['last_login_time']);?></span></div>
					<div class="td3"><a href="<?php echo U('user_loginlog');?>">[查看登录日志]</a></div>
					<div class="td4"><a id="J_edit_password" href="javascript:;">修改</a></div>
					<div class="clear"></div>
				</div>
				<div class="safety J_hoverbut link_blue">
					<div class="td1 t2">手机</div>
					<div id="J_mobileWrap" class="td2"><?php if($members_info['mobile']): echo ($members_info["mobile"]); else: ?>手机未填写<?php endif; ?><span>（认证后可用于登录账号、找回密码）</span></div>
					<div id="J_mobileStatus" class="td3">
						<?php if($members_info['mobile_audit']): ?><div class="yes">已认证</div>
						<?php else: ?>
							<div class="no">未认证</div><?php endif; ?>
					</div>
					<div class="td4">
						<a id="J_auth_mobile" href="javascript:;" data-auth="<?php if($members_info['mobile_audit']): ?>1<?php else: ?>0<?php endif; ?>">
							<?php if($members_info['mobile_audit']): ?>修改
							<?php else: ?>
								立即认证<?php endif; ?>
						</a>
					</div>
					<div class="clear"></div>
				</div>
				<div class="safety J_hoverbut link_blue">
					<div class="td1 t3">邮箱</div>
					<div id="J_emailWrap" class="td2"><?php if($members_info['email']): echo ($members_info["email"]); else: ?>邮箱未填写<?php endif; ?><span>（认证后用于登录账号、找回密码）</span></div>
					<div id="J_emailStatus" class="td3">
						<?php if($members_info['email_audit']): ?><div class="yes">已认证</div>
						<?php else: ?>
							<div class="no">未认证</div><?php endif; ?>
					</div>
					<div class="td4">
						<a id="J_auth_email" href="javascript:;" data-auth="<?php if($members_info['email_audit']): ?>1<?php else: ?>0<?php endif; ?>">
							<?php if($members_info['email_audit']): ?>修改
							<?php else: ?>
								立即认证<?php endif; ?>
						</a>
					</div>
					<div class="clear"></div>
				</div>
	        	<div class="safety_btit">账号绑定<span>（授权绑定后，可使用第三方帐号快速登录）</span></div>
	        	<div class="safety_binding">
	 				<?php if(is_array($oauth_list)): $i = 0; $__LIST__ = $oauth_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$oauth): $mod = ($i % 2 );++$i;?><div class="td1">
							<?php if($user_bind[$oauth['alias']] == ''): ?><div class="<?php echo ($oauth["alias"]); ?>"><?php echo ($oauth["name"]); ?></div>
						    	<div class="txt link_blue"><a id="J_bind_<?php echo ($oauth["alias"]); ?>" href="<?php echo U('callback/index',array('mod'=>$oauth['alias'],'type'=>'bind'));?>">立即绑定</a></div>
							<?php else: ?>
								<div class="<?php echo ($oauth["alias"]); ?> ok"><?php echo ($oauth["name"]); ?></div>
								<div class="txt link_blue"><a class="J_unlogin" href="javascript:;" url="<?php echo U('callback/index',array('mod'=>$oauth['alias'],'type'=>'unbind'));?>" name="<?php echo ($oauth["name"]); ?>">解除绑定</a></div><?php endif; ?>
		 		   		</div><?php endforeach; endif; else: echo "" ;endif; ?>
					<div class="clear"></div>
				</div>
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
		<script type="text/javascript">
			$('#J_edit_password').click(function(){
				var qsDialog = $(this).dialog({
	        		title: '修改密码',
					loading: true,
					showFooter: false,
					yes: function() {
						var options = {};
						options['oldpassword'] = $('#J_passwordWrap').find('input[name="oldpassword"]').val();
						options['password'] = $('#J_passwordWrap').find('input[name="password"]').val();
						options['password1'] = $('#J_passwordWrap').find('input[name="password1"]').val();
						$.post("<?php echo U('Members/save_password');?>",options,function(r){
							if(r.status == 1){
								disapperTooltip('success',r.msg);
								qsDialog.hide();
							}else{
								disapperTooltip("remind", r.msg);
							}
						},'json');
					}
				});
				$.getJSON("<?php echo U('Members/save_password');?>",function(result){
					if(result.status == 1){
						qsDialog.setCloseDialog(false);
						qsDialog.setContent(result.data.html);
        				qsDialog.showFooter(true);
					}else{
						qsDialog.setContent('<div class="confirm">' + result.msg + '</div>');
					}
				});
			});
			var regularUsername = /^(?=[\u4e00-\u9fa5a-zA-Z])(?!\d+)[\u4e00-\u9fa5\w.]{6,18}$/;
			$('#J_edit_uname').click(function(){
				var qsDialog = $(this).dialog({
	        		title: '修改用户名',
					loading: true,
					showFooter: false,
					yes: function() {
						var username = $.trim($('#J_usernameInput').val());
						if (!username.length) {
							disapperTooltip("remind", '请填写新用户名');
							$('#J_usernameInput').focus();
							return false;
						}
						if (username.length && !regularUsername.test(username)) {
							disapperTooltip("remind", "用户名中英文开头6-18位，无特殊符号");
							$('#J_usernameInput').focus();
							return false;
						}
						$.post("<?php echo U('Members/save_username');?>",{username:username},function(r){
							if(r.status == 1){
								$('#J_unameWrap').text(username);
								disapperTooltip('success',r.msg);
								qsDialog.hide();
							}else{
								disapperTooltip("remind", r.msg);
							}
						},'json');
					}
				});
				$.getJSON("<?php echo U('Members/save_username');?>",function(result){
					if(result.status == 1){
						qsDialog.setCloseDialog(false);
						qsDialog.setContent(result.data.html);
        				qsDialog.showFooter(true);
					}else{
						qsDialog.setContent('<div class="confirm">' + result.msg + '</div>');
					}
				});
			});
			$('#J_auth_mobile').click(function(){
				var f = $(this);
				var auth = f.data('auth');
				var title = '认证手机';
				if(auth == 1){
					title = '修改已认证手机';
				}
				var qsDialog = $(this).dialog({
			        title: title,
	                loading: true,
	                border: false,
	                footer: false
	            });
				$.getJSON("<?php echo U('Members/user_mobile');?>",function(result){
		    		if(result.status == 1){
		    			qsDialog.hide();
						var qsDialogSon = $(this).dialog({
			        		title: title,
	                		border: false,
			        		content: result.data,
							yes: function() {
								var regularMobileAuth = /^13[0-9]{9}$|14[0-9]{9}$|15[0-9]{9}$|18[0-9]{9}$|17[0-9]{9}$/; // 验证手机号正则
								var mobile = $.trim($('#J_mobileWrap input[name="mobile"]').val());
								if(mobile == ''){
									$('#J_mobileWrap .J_errbox').text('手机号不能不空！').show();
									return false;
								}
								if (mobile != "" && !regularMobileAuth.test(mobile)) {
									$('#J_mobileWrap .J_errbox').text('手机号码格式不正确！').show();
									return false;
								}
								var verifycode  = $.trim($('#J_mobileWrap input[name="verifycode"]').val());
								if(!verifycode){
									$('#J_mobileWrap .J_errbox').text('请填写验证码！').show();
									return false;
								}
								$.post("<?php echo U('Members/verify_mobile_code');?>",{verifycode:verifycode},function(result){
									if(result.status == 1){
										qsDialogSon.hide();
										f.text('修改');
										$('#J_mobileStatus').html('<div class="yes">已认证</div>');
										$('#J_mobileWrap').html(result.data.mobile+'<span>（认证后可使用该手机登录账号、找回密码）</span>');
										if(result.data.points){
											disapperTooltip("goldremind", '验证手机号增加'+result.data.points+'<?php echo C('qscms_points_byname');?><span class="point">+'+result.data.points+'</span>');
										}else{
											disapperTooltip('success',result.msg);
										}
									} else {
										$('#J_mobileWrap .J_errbox').text(result.msg).show();
									}
								},'json');
							}
						});
						qsDialogSon.setCloseDialog(false);
		    		}else{
		    			qsDialog.hide();
		    			disapperTooltip('remind',result.msg);
		    		}
		    	});
			});
			$('#J_auth_email').click(function(){
				var f = $(this);
				var auth = $(this).data('auth');
				var title = '认证邮箱';
				if(auth == 1){
					title = '修改已认证邮箱';
				}
				var qsDialog = $(this).dialog({
			        title: title,
	                loading: true,
	                border: false,
	                footer: false
	            });
				$.getJSON("<?php echo U('Members/user_email');?>",function(result){
		    		if(result.status == 1){
						qsDialog.hide();
						var qsDialogSon = $(this).dialog({
				    		title: title,
	                		border: false,
							content: result.data,
							footer: false
						});
		    		}else{
		    			qsDialog.hide();
    					disapperTooltip('remind',result.msg);
		    		}
		    	});
			});
			var qrcode_bind_time,
				waiting_weixin_bind = function(){
					$.getJSON("<?php echo U('Members/waiting_weixin_bind');?>",function(result){
						if(result.status == 1){
							location.reload();
						}
					});
				};
			$('#J_bind_weixin').click(function(){
				clearInterval(qrcode_bind_time);
				var qsDialog = $(this).dialog({
	        		title: '微信绑定',
					loading: true,
					showFooter: false,
					footer: false
				});
				$.getJSON("<?php echo U('Qrcode/get_weixin_qrcode');?>",{type:'bind'},function(result){
					if(result.status == 1){
						qsDialog.setContent(result.data);
	        	qsDialog.showFooter(true);
						qrcode_bind_time=setInterval(waiting_weixin_bind,5000);
						$('.J_dismiss_modal').on('click', function () {
							clearInterval(qrcode_bind_time);
						})
					}else{
						qsDialog.setContent('<div class="confirm">' + result.msg + '</div>');
					}
				});
				return !1;
			});
			$('.J_unlogin').click(function(){
				var url = $(this).attr('url'),
					name = $(this).attr('name'),
					qsDialog=$(this).dialog({
						title: '取消绑定',
						loading: false,
						border: false,
						content : '当前帐号已绑定<'+name+'><br/>确定解绑吗？',
						yes: function() {
							window.location.href=url;
						}
					});
			});
		</script>
	</body>
</html>