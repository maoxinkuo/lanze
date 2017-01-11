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
		<link href="../public/css/company/company_points.css" rel="stylesheet" type="text/css" />
		<link href="../public/css/company/company_ajax_dialog.css" rel="stylesheet" type="text/css" />
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
					<div class="pat_l">微信招聘</div>
					<div class="clear"></div>
				</div>
				<div class="cutoff_line"></div>
				<div class="wx_jobbox">
					<div class="title">什么是微信招聘？</div>
					<div class="describe">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;微信招聘是通过调取您的职位信息和企业资料一键生成手机端招聘页面，您可通过分享朋友圈等途径让更多人了解关注，快速提高企业职位浏览量以获得更出色的招聘体验。</div>
					<div class="describe_wxbox">
						<div class="wxbox_left">
							<div class="wx_text">
								<div class="wx_text_line highlight">您的移动招聘主页已生成</div>
								<div class="wx_text_line">请扫描二维码关注“<?php echo C('qscms_site_name');?>”公众号，</div>
								<div class="wx_text_line">绑定企业账号，</div>
								<div class="wx_text_line">查看您的专属企业移动招聘主页，</div>
								<div class="wx_text_line">立即分享，让数万用户为你传播，马上行动吧</div>
							</div>
							<div class="wx_img">
								<div class="img"><img src="<?php echo attach(C('qscms_weixin_img'),'weixin');?>"></div>
								<div class="img_txt">
									<div>微信扫一扫  关注公众号</div>
									<div>一键生成移动招聘主页！</div>
								</div>
							</div>
						</div>
						<div class="wxbox_right">
							<div id="slide" class="slide">
								<ul>
									<li><img src="<?php echo attach('1.jpg','mobilerecruit');?>"></li>
									<li><img src="<?php echo attach('2.jpg','mobilerecruit');?>"></li>
									<li><img src="<?php echo attach('3.jpg','mobilerecruit');?>"></li>
									<li><img src="<?php echo attach('4.jpg','mobilerecruit');?>"></li>
									<li><img src="<?php echo attach('5.jpg','mobilerecruit');?>"></li>
									<li><img src="<?php echo attach('6.jpg','mobilerecruit');?>"></li>
								</ul>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="wx_introduce">
					<div class="wx_introduce_group">
						<div class="wx_introduce_list">
							<div class="iconbox icon1"></div>
							<div class="txtbox"><div>企业模版</div><div class="down">H5模版任意切换</div></div>
							<div class="clear"></div>
						</div>
						<div class="wx_introduce_list">
							<div class="iconbox icon2"></div>
							<div class="txtbox"><div>企业头像</div><div class="down">上传企业形象LOGO</div></div>
							<div class="clear"></div>
						</div>
						<div class="wx_introduce_list">
							<div class="iconbox icon3"></div>
							<div class="txtbox"><div>公司福利</div><div class="down">编辑企业福利与基本资料同步</div></div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="wx_introduce_group">
						<div class="wx_introduce_list">
							<div class="iconbox icon4"></div>
							<div class="txtbox"><div>微信招聘简历</div><div class="down">微信招聘收到的简历</div></div>
							<div class="clear"></div>
						</div>
						<div class="wx_introduce_list">
							<div class="iconbox icon5"></div>
							<div class="txtbox"><div>发红包悬赏</div><div class="down">全面提高人才库储备</div></div>
							<div class="clear"></div>
						</div>
						<div class="wx_introduce_list">
							<div class="iconbox icon6"></div>
							<div class="txtbox"><div>悬赏明细</div><div class="down">认真记录每位职位推广员</div></div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="wx_introduce_group">
						<div class="wx_introduce_list">
							<div class="iconbox icon7"></div>
							<div class="txtbox"><div>留言反馈</div><div class="down">反馈您遇到的任何问题</div></div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="wx_tongji">
					<div class="title">
						<div class="tlist">昨日访问： <span class="highlight"><?php echo ($click); ?></span></div>
						<div class="tlist">昨日获得点赞： <span class="highlight"><?php echo ($praise); ?></span></div>
						<div class="tlist link_blue"><a href="<?php echo U('mobile_recruit_statistics');?>">查看效果数据</a></div>
						<div class="clear"></div>
					</div>
					<?php if(!empty($apply['Mobile'])): ?><div class="share_link">
							<div class="share_left">分享链接：</div>
							<div class="share_right qshowaBoxD"><?php echo ($w_url); ?></div>
							<div class="clear"></div>
						</div>
						<div class="share_btn link_blue">
							<div class="btn_left"><a href="javascript:;" class="qshowa">点击复制分享链接</a></div>
							<div class="btn_right"><a href="<?php echo C('qscms_site_dir');?>index.php?m=Home&c=Qrcode&a=index&url=<?php echo urlencode($w_url);?>&download=1">下载企业主页二维码</a></div>
							<div class="clear"></div>
						</div><?php endif; ?>
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
		<script src="../public/js/company/jquery.zclip.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.qshowa').zclip({
					path: '../public/flash/ZeroClipboard.swf',
					copy: function(){
						return $('.qshowaBoxD').html();
					},
					afterCopy: function(){
						$('.qshowa').html('复制成功!');
					}
				});

				// 自动滚动
				var _scrolling = setInterval("AutoScroll()", 3000);
				$("#slide>ul").hover(function() {
					//鼠标移动DIV上停止
					clearInterval(_scrolling);
				}, function() {
					//离开继续调用
					_scrolling = setInterval("AutoScroll()", 3000);
				});
			});
			function AutoScroll() {
				var _scroll = $("#slide>ul");
				//ul往左边移动300px
				_scroll.animate({
					marginLeft : "-208px"
				}, 1000, function() {
					//把第一个li丢最后面去
					_scroll.css({
						marginLeft : 0
					}).find("li:first").appendTo(_scroll);
				});
			}
		</script>
	</body>
</html>