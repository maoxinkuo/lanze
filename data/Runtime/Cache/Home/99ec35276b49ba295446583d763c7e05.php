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
		<link href="../public/css/company/company_resumes.css" rel="stylesheet" type="text/css" />
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
  	<div class="li link_gray6 J_hoverbut t5 <?php if(ACTION_NAME == 'jobs_apply'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/jobs_apply');?>'"><a href="<?php echo U('company/jobs_apply');?>">收到的简历</a></div>
  	<div class="li link_gray6 J_hoverbut t6 <?php if(ACTION_NAME == 'jobs_interview'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/jobs_interview');?>'"><a href="<?php echo U('company/jobs_interview');?>">面试邀请</a></div>
  	<div class="li link_gray6 J_hoverbut t7 <?php if(ACTION_NAME == 'resume_down'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/resume_down');?>'"><a href="<?php echo U('company/resume_down');?>">已下载简历</a></div>
  	<div class="li link_gray6 J_hoverbut t8 <?php if(ACTION_NAME == 'resume_favorites'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/resume_favorites');?>'"><a href="<?php echo U('company/resume_favorites');?>">收藏的简历</a></div>
  	<div class="li link_gray6 J_hoverbut t9 <?php if(ACTION_NAME == 'resume_viewlog'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/resume_viewlog');?>'"><a href="<?php echo U('company/resume_viewlog');?>">浏览过的简历</a></div>
  	<div class="li link_gray6 J_hoverbut t10 <?php if(ACTION_NAME == 'jobs_viewlog'): ?>select<?php endif; ?>" onclick="window.location='<?php echo U('company/jobs_viewlog');?>'"><a href="<?php echo U('company/jobs_viewlog');?>">谁看过我</a></div>
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
					<div class="pat_l">收到的简历</div>
					<!--<div class="pat_r">系统保留三个月的记录，共<strong> <?php echo ($apply_list['count']); ?> </strong>条</div>-->
					<div class="clear"></div>
				</div>
				<div class="user_tab">
					<a href="<?php echo U('jobs_apply');?>" class="tabli <?php if($is_reply == 0): ?>select<?php endif; ?>" >待处理简历</a>
					<a href="<?php echo U('jobs_apply',array('is_reply'=>1));?>" class="tabli <?php if($is_reply == 1): ?>select<?php endif; ?>">已处理简历</a>
					<div class="clear"></div>
				</div>
				<div class="resume_receive_select">
					<div class="left">
						<div class="td1">应聘职位：</div>
						<div class="td2">
							<div class="input_140_30_div J_hoverinput J_dropdown J_listitme_parent">
								<span class="J_listitme_text line_substring">
									<?php if($jobs_id == 0): ?>全部职位
									<?php else: ?>
										<?php echo ($jobs_list[$jobs_id]); endif; ?>
								</span>
								<div class="dropdowbox6 J_dropdown_menu">
						            <div class="dropdow_inner6">
						                <ul class="nav_box">
						                	<li><a class="J_listitme" href="<?php echo P(array('jobs_id'=>0));?>" >全部职位</a></li>
						                	<?php if(is_array($jobs_list)): $i = 0; $__LIST__ = $jobs_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="J_listitme" href="<?php echo P(array('jobs_id'=>$key));?>" title="<?php echo ($vo); ?>"><?php echo ($vo); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						                </ul>
						            </div>
						        </div>
							</div>
						</div>
						<div class="td3">
							<label><input type="checkbox" <?php if($_GET['stop']== '1'): ?>checked="checked"<?php endif; ?> url="<?php if($_GET['stop']== '1'): echo U('jobs_apply',array('is_reply'=>$is_reply,'stop'=>0)); else: echo U('jobs_apply',array('is_reply'=>$is_reply,'stop'=>1)); endif; ?>" class="jump">包含停招职位</label>
						</div>
						<div class="clear"></div>
						<div class="td1">简历来源：</div>
						<div class="radio_list">
							<div class="li jump <?php if(!$_GET['is_apply']|| $_GET['is_apply']== '0'): ?>checked<?php endif; ?>" url="<?php echo P(array('is_apply'=>0));?>">全部</div>
							<div class="li jump <?php if($_GET['is_apply']== '2'): ?>checked<?php endif; ?>" url="<?php echo P(array('is_apply'=>2));?>">主动投递</div>
							<div class="li jump <?php if($_GET['is_apply']== '1'): ?>checked<?php endif; ?>" url="<?php echo P(array('is_apply'=>1));?>">委托投递</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="right">
						<div class="time">近两周<span>（<?php echo ($date); ?>&nbsp;-&nbsp;至今）</span></div>
						<div class="statistics">
							<div class="td1">
								<div class="val"><?php echo ($count[1]); ?></div>处理简历
							</div>
							<div class="line"></div>
							<div class="td1">
								<div class="val"><?php echo ($count[0]); ?></div>收到简历
							</div>
							<div class="line"></div>
							<div class="td1">
								<div class="val"><?php echo ($count[2]); ?>%</div>处理率
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="resume_receive_th">
					<?php if($is_reply == 0): ?><div class="th7">
	    					状态标签
						</div>
					<?php else: ?>
						<div class="th1">
							<div class="input_90_30_div J_hoverinput J_dropdown J_listitme_parent">
								<span class="J_listitme_text">
									<?php if($state == 0): ?>状态标签
									<?php else: ?>
										<?php echo ($state_arr[$state]); endif; ?>
								</span>
								<div class="dropdowbox11 J_dropdown_menu">
						            <div class="dropdow_inner11">
						                <ul class="nav_box">
						                	<li><a class="J_listitme" href="<?php echo P(array('state'=>0));?>" >全部状态</a></li>
						                	<?php if(is_array($state_arr)): $i = 0; $__LIST__ = $state_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="J_listitme" href="<?php echo P(array('state'=>$key));?>" ><?php echo ($vo); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						                </ul>
						            </div>
						        </div>
							</div>
						</div><?php endif; ?>
    				<div class="th2">姓名</div>
    				<div class="th3">基本信息</div>
    				<div class="th4">应聘职位</div>
    				<div class="th5">
    					<div class="input_90_30_div J_hoverinput J_dropdown J_listitme_parent">
							<span class="J_listitme_text">
								<?php if($_GET['settr']== 0): ?>应聘时间
								<?php else: ?>
									<?php echo ($_GET['settr']); ?>天内<?php endif; ?>
							</span>
							<div class="dropdowbox11 J_dropdown_menu">
					            <div class="dropdow_inner11">
					                <ul class="nav_box">
					                	<li><a class="J_listitme" href="<?php echo P(array('settr'=>0));?>" >不限时间</a></li>
					                	<li><a class="J_listitme" href="<?php echo P(array('settr'=>3));?>" >3天内</a></li>
					                	<li><a class="J_listitme" href="<?php echo P(array('settr'=>7));?>" >7天内</a></li>
					                	<li><a class="J_listitme" href="<?php echo P(array('settr'=>15));?>" >15天内</a></li>
					                	<li><a class="J_listitme" href="<?php echo P(array('settr'=>30));?>" >30天内</a></li>
					                </ul>
					            </div>
					        </div>
						</div>
    				</div>
    				<div class="th6">操作</div>
    				<div class="clear"></div>
    			</div>
				<form id="form1" action="<?php echo U('del_jobs_apply');?>" method="post" class="J_allListBox">
				<?php if(!empty($apply_list['list'])): if(is_array($apply_list['list'])): $i = 0; $__LIST__ = $apply_list['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="resume_receive" did="<?php echo ($vo['did']); ?>">
					<?php if($vo['fullname']): ?><div class="td1">
							<div class="input">
								<input name="y_id[]" class="J_allList" type="checkbox" value="<?php echo ($vo['did']); ?>" resume_id="<?php echo ($vo['resume_id']); ?>"> &nbsp;
							</div>
	    					<div class="look_icon <?php if($vo['personal_look'] == 1): ?>unlook<?php endif; ?>" title="<?php if($vo['personal_look'] == 1): ?>未查看<?php else: ?>已查看<?php endif; ?>"></div>
	    					<div title="<?php if($vo['is_reply'] > 0): echo ($state_arr[$vo['is_reply']]); endif; ?>" class="replay_icon J_dropdown <?php if($vo['is_reply'] > 0): ?>s<?php echo ($vo['is_reply']); endif; ?>">
							<div class="dropdowboxapply J_dropdown_menu">
					            <div class="dropdow_innerapply">
					                <ul class="nav_box">
					                	<?php if(is_array($state_arr)): $i = 0; $__LIST__ = $state_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$st): $mod = ($i % 2 );++$i;?><li><a class="J_listitme label_resume s<?php echo ($key); ?>" href="<?php echo U('company_label_resume_apply',array('y_id'=>$vo['did'],'state'=>$key));?>" ><?php echo ($st); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					                </ul>
					            </div>
					        </div>
	    					</div>
	    					<div class="clear"></div>
	    				</div>
						<div class="td2 link_blue substring"><a target="_blank" href="<?php echo url_rewrite('QS_resumeshow',array('id'=>$vo['resume_id'],'jobs_id'=>$vo['jobs_id'],'from_apply'=>1));?>"><?php echo ($vo['fullname']); ?></a></div>
	    				<div class="td3"><?php echo ($vo['age']); ?>岁/<?php echo ($vo['sex_cn']); ?>/<?php echo ($vo['education_cn']); ?>/<?php echo ($vo['experience_cn']); ?></div>
	    				<div class="td4 link_blue substring"><a target="_blank" href="<?php echo ($vo["jobs_url"]); ?>"><?php echo ($vo['jobs_name_']); ?></a></div>
	    				<div class="td5"><?php echo fdate($vo['apply_addtime']);?></div>
	    				<div class="td6 link_blue J_tooltip">
	    					<a href="javascript:;" class="clink">操作</a>
	    					<div class="dropdowbox2 J_tooltip_menu">
					            <div class="dropdow_inner2">
					                <ul class="nav_box">
					                    <li><a class="J_interview" href="javascript:;" resume_id="<?php echo ($vo['resume_id']); ?>">邀请面试</a></li>
					                    <li><a class="J_del_resume" href="javascript:;" url="<?php echo U('company/del_jobs_apply',array('y_id'=>$vo['did']));?>">删除</a></li>
					                </ul>
					            </div>
					        </div>
	    				</div>
    				<?php else: ?>
						<div class="td1 empty">
							<div class="input">
								<input name="y_id[]" class="J_allList" type="checkbox" value="<?php echo ($vo['did']); ?>"> &nbsp;该简历不存在或已被删除
							</div>
	    				</div>
	    				<div class="td6 link_blue"><a href="javascript:;" url="<?php echo U('company/del_jobs_apply',array('y_id'=>$vo['did']));?>" class="clink J_del_resume">删除</a></div><?php endif; ?>
    				<div class="clear"></div>					
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="resume_but">
		 			<div class="td1"><input class="J_allSelected" type="checkbox" value="" /></div>
		 			<div class="td2">
		 				<div class="btn_blue J_hoverbut btn_inline" id="save_as_doc_word">保存到电脑</div>
				  		<div class="btn_blue J_hoverbut btn_inline" id="send_to_email">转发到邮箱</div>
						<div class="btn_lightgray J_hoverbut btn_inline" id="deleteall">删除</div>
		 			</div>
		 			<div class="clear"></div>
	    		</div>
				<div class="qspage"><?php echo ($apply_list['page']); ?></div>
				<?php else: ?>
					<?php if($hasget): ?><div class="res_empty">
						抱歉，没有找到符合您条件的简历，建议您修改筛选条件后重试
					</div>
					<?php else: ?>
					<div class="res_empty link_blue">
						收到的简历不够多？不如主动出击找人才！<br />
						海量优质简历任您选，快速招人不再难。立即 <a href="<?php echo url_rewrite('QS_resume');?>" target="_blank">搜人才</a>
					</div><?php endif; endif; ?>
				</form>
			</div>
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
		<script type="text/javascript" src="../public/js/laydate/laydate.js"></script>
		<script type="text/javascript" src="../public/js/jquery.allselected.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".label_resume").click(function(){
					var url = $(this).attr('href');
					$.getJSON(url,function(result){
						if(result.status==1){
							if(result.data!=0){
								disapperTooltip("goldremind", '处理3天内收到的简历增加'+result.data+'<?php echo C('qscms_points_byname');?><span class="point">+'+result.data+'</span>');
							}else{
								disapperTooltip('success',result.msg);
							}
							setTimeout(function () {
		                        window.location.reload();
		                    }, 2000);
						}else{
							disapperTooltip('remind', result.msg);
						}
					});
					return false;
				});
				$(".jump").click(function(){
					location.href=$(this).attr('url');
				});
				$("#save_as_doc_word").click(function(){
					var $checkArr = $('.J_allList:checked');
					if($checkArr.length<=0){
						disapperTooltip('remind', '请选择简历');
						return false;
					}
					var valArr = new Array();
					$.each($checkArr, function(){
						if($(this).attr('resume_id')){
							valArr.push($(this).attr('resume_id'));
						}
					});
					if(valArr.length == 0){
						disapperTooltip('remind','选择的简历不存在或已被删除！');
						return false;
					}
					$("#form1").attr('action',"<?php echo U('resume_doc_for_apply');?>");
					$("#form1").attr('target',"_blank");
					$("#form1").submit();
				});
				$(".J_del_resume").click(function () {
		            var url = $(this).attr('url');
		            var qsDialog = $(this).dialog({
				        title: '删除收到的简历',
		                loading: true,
		                border: false,
		                footer: false
		            });
		            $.getJSON(url, function (result) {
		                if (result.status == 1) {
		                	qsDialog.hide();
		                	var qsDialogSon = $(this).dialog({
				                title: '删除收到的简历',
				                content: result.data.html,
				                border: false,
				                yes: function () {
				                    window.location.href = url;
				                }
				            });
		                } else {
		                	qsDialog.hide();
		                    disapperTooltip('remind', result.msg);
		                }
		            });
		        });
				// 批量删除
		        $('#deleteall').click(function () {
		            var listCheckedArray = $('.J_allListBox .J_allList:checked');
		            if (listCheckedArray.length) {
		            	var url = "<?php echo U('del_jobs_apply');?>";
		                var qsDialog = $(this).dialog({
					        title: '删除收到的简历',
			                loading: true,
			                border: false,
			                footer: false
			            });
		                $.getJSON(url, function (result) {
		                    if (result.status == 1) {
		                    	qsDialog.hide();
				                var qsDialogSon = $(this).dialog({
				                    title: '删除收到的简历',
				                    content: result.data.html,
				                    border: false,
				                    yes: function () {
				                    	$("#form1").attr('action',"<?php echo U('del_jobs_apply');?>");
		                				$("#form1").attr('target',"_self");
				                        $("#form1").submit();
				                    }
				                });
		                    } else {
		                    	qsDialog.hide();
		                        disapperTooltip('remind', result.msg);
		                    }
		                });
		            } else {
		                disapperTooltip("remind", "请选择要删除的简历");
		            }
		        });
				$('.J_interview').click(function(){
					var qsDialog = $(this).dialog({
		        		title: '邀请面试',
						loading: true,
						showFooter: false,
						yes: function() {
							var notesVal = $.trim($('input[name="notes"]').val());
							if (notesVal.length > 40) {
								$('input[name="notes"]').focus();
								disapperTooltip('remind','最多输入40个字');
								return false;
							}
							$('.J_btnyes').val('发送中...');
							$.post("<?php echo U('company/jobs_interview_add');?>",$('#J_interviewWrap').serialize(),function(result){
								if(result.status == 1){
									disapperTooltip('success',result.msg);
									setTimeout(function () {
										window.location.reload();
									}, 2000);
								} else {
									$('.J_btnyes').val('确定');
									disapperTooltip('remind',result.msg);
								}
							},'json');
						}
					});
					qsDialog.setCloseDialog(false);
					var resume_id = $(this).attr('resume_id');
					$.getJSON("<?php echo U('company/jobs_interview_add');?>",{id:resume_id},function(result){
			    		if(result.status == 1){
			    			qsDialog.setContent(result.data);
        					qsDialog.showFooter(true);
							laydate({
								elem: '#date',
                        		min: laydate.now()
							})
			    		}else{
			    			qsDialog.setContent('<div class="confirm">' + result.msg + '</div>');
			    		}
			    	});
				});
				$("#send_to_email").click(function(){
					var $checkArr = $('.J_allList:checked');
					if($checkArr.length<=0){
						disapperTooltip('remind', '请选择简历');
						return false;
					}
					var valArr = new Array();
					$.each($checkArr, function(){
						if($(this).attr('resume_id')){
							valArr.push($(this).attr('resume_id'));
						}
					});
					if(valArr.length == 0){
						disapperTooltip('remind','选择的简历不存在或已被删除！');
						return false;
					}
					var qsDialog = $(this).dialog({
		                title: '转发到邮箱',
		                loading: true,
		                border: false,
		                footer: false
		            });
					
					$.getJSON("<?php echo U('company/send_to_email');?>",{resume_id:valArr},function(result){
						if(result.status==1){
							qsDialog.hide();
							var qsDialogSon = $(this).dialog({
				                title: '转发到邮箱',
				                content: result.data,
				                btns: ['发送', '取消'],
				                border: false,
				                yes: function () {
				                	qsDialogSon.setCloseDialog(false);
				                	var email = $("#send_to_email_val").val();
				                	var regularEmail = /^[_\.0-9a-zA-Z-]+[_0-9a-zA-Z-]@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,3}$/;
				                	if(email==''){
				                		disapperTooltip('remind','请填写邮箱');
										return false;
				                	}
				                	if (email != "" && !regularEmail.test(email) || email.split("@")[0].length > 20) {
										disapperTooltip("remind", "邮箱格式不正确");
										return false;
									}
				                    $('.J_btnyes').val('发送中...').prop('disabled', !0);
				                    $.post("<?php echo U('company/send_to_email');?>",{email:email,resume_id:valArr},function(result){
				                    	if(result.status==1){
				                    		qsDialogSon.hide();
				                    		disapperTooltip('success',result.msg);
				                    	} else {
				                    		$('.J_btnyes').val('发送').prop('disabled', 0);
				                    		disapperTooltip('remind',result.msg);
				                    	}
				                    },'json');
				                }
				            });
						} else {
							qsDialog.hide();
							disapperTooltip('remind',result.msg);
						}
					});
				});
			});
		</script>
	</body>
</html>