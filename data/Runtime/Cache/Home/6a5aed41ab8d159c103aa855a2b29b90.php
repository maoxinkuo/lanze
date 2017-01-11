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
		<script type="text/javascript" src="../public/js/company/fusioncharts/fusioncharts.js"></script>
		<script type="text/javascript" src="../public/js/company/fusioncharts/fusioncharts.theme.fint.js"></script>
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
					<div class="pat_l">招聘效果统计</div>
					<div class="clear"></div>
				</div>
				<div class="user_tab mt15">
					<a href="<?php echo U('statistics_visitor');?>" class="tabli select">访客统计</a>
					<a href="<?php echo U('statistics_viewjobs');?>" class="tabli">职位浏览统计</a>
					<a href="<?php echo U('statistics_apply');?>" class="tabli">应聘统计</a>
					<div class="clear"></div>
				</div>
				<div class="line_wrap">
					<div class="line_top">
						<div class="select_input input_140_30_div J_hoverinput J_dropdown J_listitme_parent">
							<span class="J_listitme_text">
								最近<?php echo ($settr); ?>天
							</span>
							<div class="dropdowbox10 J_dropdown_menu">
					            <div class="dropdow_inner10">
					                <ul class="nav_box">
					                	<li><a class="J_listitme" href="<?php echo P(array('settr'=>'7'));?>" >最近7天</a></li>
					                	<li><a class="J_listitme" href="<?php echo P(array('settr'=>'15'));?>" >最近15天</a></li>
					                	<li><a class="J_listitme" href="<?php echo P(array('settr'=>'30'));?>" >最近30天</a></li>
					                </ul>
					            </div>
					        </div>
						</div>
						<div class="select_input input_140_30_div J_hoverinput J_dropdown J_listitme_parent">
							<span class="J_listitme_text">
								<?php if(!$_GET['source']|| $_GET['source']== ''): ?>全部来源
								<?php else: ?>
									<?php echo ($source_arr[$source]); endif; ?>
							</span>
							<div class="dropdowbox10 J_dropdown_menu">
					            <div class="dropdow_inner10">
					                <ul class="nav_box">
					                	<li><a class="J_listitme" href="<?php echo P(array('source'=>''));?>" >全部来源</a></li>
					                	<?php if(is_array($source_arr)): $i = 0; $__LIST__ = $source_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="J_listitme" href="<?php echo P(array('source'=>$key));?>" ><?php echo ($vo); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					                </ul>
					            </div>
					        </div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="line_main">
						<div id="line_box" style="margin:20px 0 0 10px;"></div>
						<script type="text/javascript">
							FusionCharts.ready(function(){
								var revenueChart = new FusionCharts({
									"type": "msline",
									"height":"280px",
									"renderAt": "line_box",
									"width":"99%",
									"dataFormat": "xml",
									"showLegend":"1",
									"dataSource": '<?php echo ($line_xml); ?>',
								});
								revenueChart.render();
							});
						</script>
					</div>
				</div>
				<div class="detail_wrap">
					<div class="detail_title">
						<div class="pat_l">
							用户详细数据
							<span class="num_tip">登录 <span class="num"><?php echo ($count_num['login']); ?></span> 人，未登录 <span class="num"><?php echo ($count_num['total']-$count_num['login']); ?></span> 人（列表内只显示登录用户）</span>
						</div>
						<div class="pat_r">
							<div class="radio_list">
								<div class="rli checked tab_select" data="chart">登录用户分布统计图</div>
								<div class="rli tab_select" data="list">登录用户详细列表</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="chart_wrap data_wrap">
						<div class="chart_item">
							<div id="sex_box" style="margin:20px 0 0;"></div>
							<script type="text/javascript">
								FusionCharts.ready(function(){
									var revenueChart = new FusionCharts({
										"type": "doughnut2d",
										"renderAt": "sex_box",
										"width":"350px",
										"dataFormat": "xml",
										"showLegend":"1",
										"dataSource": '<?php echo ($sex_xml); ?>',
									});
									revenueChart.render();
								});
							</script>
						</div>
						<div class="chart_item">
							<div id="experience_box" style="margin:20px 0 0;"></div>
							<script type="text/javascript">
								FusionCharts.ready(function(){
									var revenueChart = new FusionCharts({
										"type": "doughnut2d",
										"renderAt": "experience_box",
										"width":"350px",
										"dataFormat": "xml",
										"showLegend":"1",
										"dataSource": '<?php echo ($experience_xml); ?>',
									});
									revenueChart.render();
								});
							</script>
						</div>
						<div class="chart_item">
							<div id="education_box" style="margin:20px 0 0;"></div>
							<script type="text/javascript">
								FusionCharts.ready(function(){
									var revenueChart = new FusionCharts({
										"type": "doughnut2d",
										"renderAt": "education_box",
										"width":"350px",
										"dataFormat": "xml",
										"showLegend":"1",
										"dataSource": '<?php echo ($education_xml); ?>',
									});
									revenueChart.render();
								});
							</script>
						</div>
						<div class="chart_item">
							<div id="age_box" style="margin:20px 0 0;"></div>
							<script type="text/javascript">
								FusionCharts.ready(function(){
									var revenueChart = new FusionCharts({
										"type": "doughnut2d",
										"renderAt": "age_box",
										"width":"350px",
										"dataFormat": "xml",
										"showLegend":"1",
										"dataSource": '<?php echo ($age_xml); ?>',
									});
									revenueChart.render();
								});
							</script>
						</div>
					</div>
					<div class="list_wrap data_wrap" style="display:none;">
						<div class="list_th">
						    <div class="th1">姓名</div>
						    <div class="th2">基本信息</div>
						    <div class="th3">意向职位</div>
						    <div class="th4">来源</div>
						    <div class="th5">浏览时间</div>
						    <div class="clear"></div>
						</div>
						<div id="ajax_list">
							<?php if(!empty($table_data)): if(is_array($table_data)): $i = 0; $__LIST__ = $table_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list_td">
							    <div class="td1 link_blue"><a target="_blank" href="<?php echo url_rewrite('QS_resumeshow',array('id'=>$vo['id']));?>"><?php echo ($vo['fullname']); ?></a></div>
							    <div class="td2"><?php echo ($vo['sex_cn']); ?> | <?php echo ($vo['age']); ?>岁 | <?php echo ($vo['education_cn']); ?> | <?php echo ($vo['experience_cn']); ?></div>
							    <div class="td3"><?php echo ($vo['intention_jobs']); ?></div>
							    <div class="td4">
								    <?php switch($$view_time['time']['source']): case "1": ?>PC端<?php break;?>
									    <?php case "2": ?>触屏端<?php break;?>
									    <?php case "3": ?>移动端<?php break;?>
									    <?php default: ?>PC端<?php endswitch;?>
							    </div>
							    <div class="td5"><?php echo fdate($view_time['time'][$vo['uid']]);?></div>
							    <div class="clear"></div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
							<div class="qspage"><?php echo ($page); ?></div>
							<?php else: ?>
							<div class="res_empty">
								没有找到相应的信息！
							</div><?php endif; ?>
						</div>
					</div>
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
			$(document).ready(function(){
				$(".tab_select").click(function(){
					var tag = $(this).attr('data');
					$(this).siblings().removeClass('checked');
					$(this).addClass('checked');
					$(".data_wrap").hide();
					$("."+tag+"_wrap").show();
				});
				//分页ajax
				$(".page").live('click',function(){
					url = $(this).attr('href');
					$.getJSON(url,function(result){
						$("#ajax_list").html(result.data);
					});
					return false;
				});
			});
		</script>
	</body>
</html>