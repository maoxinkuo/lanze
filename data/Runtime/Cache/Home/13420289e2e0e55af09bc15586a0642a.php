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
					<div class="pat_l">管理职位</div>
					<div class="clear"></div>
				</div>
				<div class="user_tab mt15">
					<a href="<?php echo U('company/jobs_list');?>" class="tabli <?php if($_GET['type']== ''): ?>select<?php endif; ?>">全部职位</a>
					<a href="<?php echo U('company/jobs_list',array('type'=>1));?>" class="tabli <?php if($_GET['type']== 1): ?>select<?php endif; ?>">发布中的职位</a>
					<a href="<?php echo U('company/jobs_list',array('type'=>2));?>" class="tabli <?php if($_GET['type']== 2): ?>select<?php endif; ?>">未显示的职位</a>
					<div class="clear"></div>
					<?php if($upper_limit == 1): ?><div class="btnbox"><div class="btn_yellow J_hoverbut btn_add J_addJobsDig" href="javascript:;">发布职位</div></div>
					<?php else: ?>
					<div class="btnbox"><div class="btn_yellow J_hoverbut btn_add" onclick="window.location='<?php echo U('jobs_add');?>'">发布职位</div></div><?php endif; ?>
				</div>
				<div class="user_tip w680">
					<div class="tiptit">小提示</div>
					<div class="tiptxt link_blue">
					亲爱的HR，您的帐号可同时发布 <?php echo ($setmeal["jobs_meanwhile"]); ?> 个职位，现已发布 <?php echo ($total); ?> 个职位。
					</div>
				</div>
				<?php if(!empty($jobs_list['list'])): ?><form id="form1" action="<?php echo U('jobs_perform');?>" class="J_allListBox" method="post">
					<div class="jobsWrap">
						<?php if(is_array($jobs_list['list'])): $i = 0; $__LIST__ = $jobs_list['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jobs): $mod = ($i % 2 );++$i;?><div class="jobsList">
								<div class="selWrap">
									<input name="y_id[]" class="selStatus J_allList" type="checkbox" value="<?php echo ($jobs['id']); ?>">
								</div>
								<div class="jobs fl">
									<div class="title">
										<a target="_blank" href="<?php echo ($jobs["jobs_url"]); ?>" class=""><?php echo ($jobs["jobs_name"]); ?></a>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($jobs["district_cn"]); ?>
										<?php if($jobs['audit'] == 2 && C('qscms_jobs_display') == 1): ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="font_yellow">审核中</span><?php endif; ?>
									</div>
									<div class="update">
										待处理简历：
										<a href="<?php echo U('company/jobs_apply',array('jobs_id'=>$jobs['id']));?>" class=""><?php echo ($jobs["applys"]); ?></a>
										&nbsp;&nbsp; | &nbsp;&nbsp;更新时间：<?php echo date('Y-m-d H:i',$jobs['refreshtime']);?>
										<a href="javascript:;" class="jobs_refresh" data-type="0" url="<?php echo U('CompanyService/jobs_refresh',array('yid'=>$jobs['id']));?>">[刷新]</a>
									</div>
									<div class="J_operation btns">
										<a href="<?php echo U('jobs_edit',array('id'=>$jobs['id']));?>">修改</a>
										<a href="<?php echo url_rewrite('QS_resumelist',array('jobcategory'=>$jobs['jobcategory']));?>"  target="_blank">匹配</a>
										<?php if($jobs['auto_refresh'] == 1): ?><a href="javascript:;" class="for_hover">
											<font style="color:#999">智能刷新</font>
											<div class="des_box">
												<div class="desarrow"></div>
												<div class="des_txt">
													<!-- -->
													<strong>已购买【智能刷新】服务</strong><br />
													有效时间：<?php echo ($jobs['auto_refresh_starttime']); ?> 至 <?php echo ($jobs['auto_refresh_endtime']); ?>
												</div>
											</div>
										</a>
										<?php else: ?>
										<a href="javascript:;" class="jobs_refresh" data-type="1" url="<?php echo U('CompanyService/jobs_refresh',array('yid'=>$jobs['id'],'increment'=>1));?>">智能刷新</a><?php endif; ?>
										<a href="javascript:;" url="<?php echo U('jobs_close',array('y_id'=>$jobs['id'],'list_type'=>$_GET['type']));?>" class="close">关闭</a>
										<a href="javascript:;" url="<?php echo U('jobs_delete',array('y_id'=>$jobs['id'],'list_type'=>$_GET['type']));?>" class="delete">删除</a>
										<a href="javascript:;" class="friend" url="<?php echo urlencode(build_mobile_url(array('c'=>'Wzp','a'=>'com','params'=>'id='.$jobs["company_id"])));?>">分享到朋友圈</a>
									</div>
								</div>
								<div class="aloneOperation fl">
									<div class="box">
										<?php if($jobs['stick']): ?><div class="for_hover">
												<div class="btn_lightgray J_hoverbut btn_inline_small btn_border mr10">职位置顶</div>
												<div class="des_box">
													<div class="desarrow"></div>
													<div class="des_txt">
														<!-- -->
														<strong>已购买【职位置顶】服务</strong><br />
														有效时间：<?php echo date('Y-m-d',$jobs['promotion']['stick']['starttime']);?> 至 <?php echo date('Y-m-d',$jobs['promotion']['stick']['endtime']);?>
													</div>
												</div>
											</div>
											购买置顶推广<i><?php echo ($jobs["promotion"]["stick"]["total_days"]); ?></i>天，剩余<i><?php echo ($jobs["promotion"]["stick"]["surplus"]); ?></i>天
											<div class="clear"></div>
										<?php else: ?>
											<div class="btn_green J_hoverbut btn_inline_small mr10 stick_btn" data="<?php echo ($jobs['id']); ?>">职位置顶</div>
											职位排名始终靠前，<i><?php echo ($promotion[0]['price']); ?></i>元/<?php echo ($promotion[0]['value']); ?>天<?php endif; ?>
									</div>
									<div class="box borderTop">
										<?php if($jobs['emergency']): ?><div class="for_hover">
												<div class="btn_lightgray J_hoverbut btn_inline_small btn_border mr10">紧急招聘</div>
												<div class="des_box">
													<div class="desarrow"></div>
													<div class="des_txt">
														<!-- -->
														<strong>已购买【紧急招聘】服务</strong><br />
														有效时间：<?php echo date('Y-m-d',$jobs['promotion']['emergency']['starttime']);?> 至 <?php echo date('Y-m-d',$jobs['promotion']['emergency']['endtime']);?>
													</div>
												</div>
											</div>
											购买紧急招聘<i><?php echo ($jobs["promotion"]["emergency"]["total_days"]); ?></i>天，剩余<i><?php echo ($jobs["promotion"]["emergency"]["surplus"]); ?></i>天
										<?php else: ?>
											<div class="btn_yellow J_hoverbut btn_inline_small mr10 emergency_btn" data="<?php echo ($jobs['id']); ?>">紧急招聘</div>
											紧急标识更加醒目，<i><?php echo ($promotion[1]['price']); ?></i>元/<?php echo ($promotion[1]['value']); ?>天<?php endif; ?>
									</div>
								</div>
								<div class="clear"></div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div class="jobsWrap">
						<div class="allSelWrap">
							<input name="" class="allSel J_allSelected" type="checkbox">
						</div>
						<div class="btn_blue J_hoverbut btn_inline" id="refresh_all" >刷新职位</div>
						<div class="btn_blue J_hoverbut btn_inline" id="close_all">关闭职位</div>
						<div class="btn_lightgray J_hoverbut btn_inline btn_border" id="delete_all">删除职位</div>
						<div class="qspage"><?php echo ($jobs_list["page"]); ?></div>
						<div class="clear"></div>
					</div>
				</form>
				<?php else: ?>
					<div class="jobsWrap">
						<div class="res_empty">
							亲爱的HR，您还没有显示中的职位，若已发布，请您查看审核中的职位<br>
							想要快速找到合适的人才，就赶紧发布职位招揽人才吧~
						</div>
						<div class="res_empty_addbox">
							<div class="btn_blue J_hoverbut btn_115_38" onclick="window.location='<?php echo U('jobs_add');?>'">发布职位>></div>
						</div>
					</div><?php endif; ?>
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
		<script type="text/javascript" src="../public/js/jquery.allselected.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#delete_all").click(function(){
					var listCheckedArray = $('.J_allListBox .J_allList:checked');
					if (!listCheckedArray.length) {
						disapperTooltip("remind",'请选择职位');
						return false;
					}
					var url = "<?php echo U('jobs_delete');?>";
		            var qsDialog = $(this).dialog({
		                title: '删除职位',
		                loading: true,
		                border: false,
		                yes: function () {
		                    $("#form1").attr('action',"<?php echo U('jobs_delete');?>");
							$("#form1").submit();
		                }
		            });
		            $.getJSON(url, function (result) {
		                if (result.status == 1) {
		                    qsDialog.setContent(result.data.html);
		                } else {
		                    disapperTooltip('remind', result.msg);
		                }
		            });
				});
				$("#refresh_all").click(function(){
					var listCheckedArray = $('.J_allListBox .J_allList:checked');
					if (!listCheckedArray.length) {
						disapperTooltip("remind",'请选择职位');
						return false;
					}
					var checkedValArr = [];
					$.each(listCheckedArray, function(index, val) {
						checkedValArr[index] = $(this).val();
					});
					var url = "<?php echo U('CompanyService/jobs_refresh');?>";
					var yid = checkedValArr.join(',');
					var qsDialog = $(this).dialog({
		        		title: '职位刷新',
		        		loading:true,
						showFooter: false,
						yes:function(){
							$.post(url,{yid:yid},function(result){
								if(result.status){
									disapperTooltip("success",result.msg);
                					setTimeout(function () {
				                        window.location.reload();
				                    }, 2000);
								}else{
					                disapperTooltip("remind",result.msg);
					                return false;
					            }
							},'json');
						}
					});
					$.getJSON(url,{yid:yid},function(result){
						if(result.status==2){
							qsDialog.hide();
		        			var son_qsDialog = $(this).dialog({
				                title: '批量刷新职位',
				                loading: true,
				                border: false
				            });
				            son_qsDialog.setBtns(['单条刷新', '取消']);
				            son_qsDialog.setContent('<div class="refresh_jobs_all_confirm">' + result.msg + '</div>');
						}else{
							if(result.data.show_footer==0){
								qsDialog.showFooter(false);
							}else{
								qsDialog.showFooter(true);
							}
							if(result.status==0){
								qsDialog.showFooter(false);
							}
							qsDialog.setContent(result.msg);
						}
					});
				});
				$("#close_all").click(function(){
					var listCheckedArray = $('.J_allListBox .J_allList:checked');
					if (!listCheckedArray.length) {
						disapperTooltip("remind",'请选择职位');
						return false;
					}
					var url = "<?php echo U('jobs_close');?>";
		            var qsDialog = $(this).dialog({
		                title: '关闭职位',
		                loading: true,
		                border: false,
		                yes: function () {
		                    $("#form1").attr('action',"<?php echo U('jobs_close');?>");
							$("#form1").submit();
		                }
		            });
		            $.getJSON(url, function (result) {
		                if (result.status == 1) {
		                    qsDialog.setContent(result.data.html);
		                } else {
		                    disapperTooltip('remind', result.msg);
		                }
		            });
				});
				$(".close").click(function(){
					var url = $(this).attr('url');
		            var qsDialog = $(this).dialog({
		                title: '关闭职位',
		                loading: true,
		                border: false,
		                yes: function () {
		                    $.post(url, function (result) {
				                if (result.status == 1) {
				                	disapperTooltip("success",result.msg);
				                	setTimeout(function () {
				                        location.href=result.data;
				                    }, 2000);
				                } else {
				                    disapperTooltip('remind', result.msg);
				                }
				            },'json');
		                }
		            });
		            $.getJSON(url, function (result) {
		                if (result.status == 1) {
		                    qsDialog.setContent(result.data.html);
		                } else {
		                    disapperTooltip('remind', result.msg);
		                }
		            });
				});
				$(".delete").click(function(){
					var url = $(this).attr('url');
		            var qsDialog = $(this).dialog({
		                title: '删除职位',
		                loading: true,
		                border: false,
		                yes: function () {
		                    $.post(url, function (result) {
				                if (result.status == 1) {
				                	disapperTooltip("success",result.msg);
				                    setTimeout(function () {
				                        location.href=result.data;
				                    }, 2000);
				                } else {
				                    disapperTooltip('remind', result.msg);
				                }
				            },'json');
		                }
		            });
		            $.getJSON(url, function (result) {
		                if (result.status == 1) {
		                    qsDialog.setContent(result.data.html);
		                } else {
		                    disapperTooltip('remind', result.msg);
		                }
		            });
				});
				// 分享到朋友圈
				$(".friend").click(function(){
					var qsDialog = $(this).dialog({
		        		loading: true,
						footer: false,
						header: false,
						border: false,
						backdrop: false
					});
					var url = $(this).attr('url');
					qsDialog.hide();
					var qsDialogSon = $(this).dialog({
		        		title: '分享到朋友圈',
		        		content: '<img width="200" height="200" src="<?php echo C("qscms_site_dir");?>index.php?m=Home&c=Qrcode&a=index&url='+url+'" />',
						footer: false
					});
				});
				$(".jobs_refresh").click(function(){
					var url = $(this).attr('url');
					var footerShow = eval($(this).data('type'));
					var qsDialog = $(this).dialog({
		        		title: '职位刷新',
		        		loading:true,
						showFooter: false,
						yes:function(){
							$.post(url,function(result){
								if(result.status){
									disapperTooltip("success",result.msg);
                					setTimeout(function () {
				                        window.location.reload();
				                    }, 2000);
								}else{
					                disapperTooltip("remind",result.msg);
					                return false;
					            }
							},'json');
						}
					});
					$.getJSON(url,function(result){
						if(result.data.show_footer==0){
							qsDialog.showFooter(false);
						}else{
							if (!footerShow) {
								qsDialog.showFooter(true);
							}
						}
						qsDialog.setContent(result.msg);
					});
				});
				$(".stick_btn").click(function(){
					var qsDialog = $(this).dialog({
		        		title: '职位置顶',
		        		loading:true,
						showFooter: false
					});
					var url = "<?php echo U('CompanyService/jobs_stick');?>";
					var jobs_id = $(this).attr('data');
					$.getJSON(url,{jobs_id:jobs_id},function(result){
						qsDialog.setContent(result.msg);
					});
				});
				$(".emergency_btn").click(function(){
					var qsDialog = $(this).dialog({
		        		title: '职位紧急',
		        		loading:true,
						showFooter: false
					});
					var url = "<?php echo U('CompanyService/jobs_emergency');?>";
					var jobs_id = $(this).attr('data');
					$.getJSON(url,{jobs_id:jobs_id},function(result){
						qsDialog.setContent(result.msg);
					});
				});
			});
		</script>
	</body>
</html>