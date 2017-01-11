<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="<?php echo C('qscms_site_dir');?>favicon.ico" />
<meta name="author" content="骑士CMS" />
<meta name="copyright" content="74cms.com" />
<title> Powered by 74CMS</title>
<link href="__ADMINPUBLIC__/css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__ADMINPUBLIC__/js/jquery.min.js"></script>
<script>
	var URL = '/ls/index.php/Admin/Page',
		SELF = '/ls/index.php?m=Admin&amp;c=Page&amp;a=rewrite',
		ROOT_PATH = '/ls/index.php/Admin',
		APP	 =	 '/ls/index.php';
</script>
<script type="text/javascript" src="__ADMINPUBLIC__/js/jquery.QSdialog.js"></script>
<script type="text/javascript" src="__ADMINPUBLIC__/js/jquery.vtip-min.js"></script>
<script type="text/javascript" src="__ADMINPUBLIC__/js/jquery.grid.rowSizing.pack.js"></script>
<script type="text/javascript" src="__ADMINPUBLIC__/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="__ADMINPUBLIC__/js/common.js"></script>
</head>
<body style="background-color:#E0F0FE">
	<div class="admin_main_nr_dbox">
	    <div class="pagetit">
	        <div class="ptit"> <?php if($sub_menu['pageheader']): echo ($sub_menu["pageheader"]); else: ?>欢迎登录 <?php echo C('qscms_site_name');?> 管理中心！<?php endif; ?></div>
	        <?php if(!empty($sub_menu['menu'])): ?><div class="topnav">
			        <?php if(is_array($sub_menu['menu'])): $i = 0; $__LIST__ = $sub_menu['menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo U($val['module_name'].'/'.$val['controller_name'].'/'.$val['action_name']); echo ($val["data"]); if($isget and $_GET): echo get_first(); endif; if($_GET['_k_v']): ?>&_k_v=<?php echo ($_GET['_k_v']); endif; ?>" class="<?php echo ($val["class"]); ?>"><u><?php echo ($val["name"]); ?></u></a><?php endforeach; endif; else: echo "" ;endif; ?>
				    <div class="clear"></div>
				</div><?php endif; ?>
	        <div class="clear"></div>
	    </div>
	<div class="toptip link_g">
		<h2>提示：</h2>
		<p>系统默认使用“原始URL链接”进行访问，如需使用其它伪静态规则，请确保服务器正常开启伪静态服务！</p>
		<p>并且“./74cms40new/Application/Common/Conf/url.php”文件有可读写权限！</p>
		<p>骑士人才系统支持多种URL样式，无论您是<strong>asp , aspx , jsp ，shtml , ......</strong>程序都可以完美转换为骑士系统，且URL可以保持不变，具体请咨询<a href="http://www.74cms.com" target="_blank">骑士客服</a></p>
	</div>
	<table width="100%" border="0" cellpadding="0" cellspacing="0"  id="list" class="link_lan">
		<tr> 
			<td class="admin_list_tit  admin_list_first">规则名称</td>
			<td width="10%" align="center" class="admin_list_tit">版本号</td>
			<td width="12%" align="center" class="admin_list_tit">更新时间</td>
			<td width="10%" align="center" class="admin_list_tit">作者</td>
			<td width="8%" align="center" class="admin_list_tit"></td>
			<td width="12%" align="center" class="admin_list_tit">操作</td>
		</tr>
		<tr>
			<td class="admin_list admin_list_first"><?php echo ($normal["name"]); ?></td>
			<td align="center" class="admin_list"><?php echo ($normal["versions"]); ?></td>
			<td align="center" class="admin_list"><?php echo ($normal["update_time"]); ?></td>
			<td align="center" class="admin_list"><?php echo ($normal["author"]); ?></td>
			<td align="center" class="admin_list">
				<?php if(C('qscms_rewrite_type') == $normal['alias']): ?>使用中<?php endif; ?>
			</td>
			<td align="center" class="admin_list">
				<?php if(C('qscms_rewrite_type') != $normal['alias']): ?><a href="<?php echo U('page/rewrite_set',array('type'=>$normal['alias']));?>">应用</a><?php endif; ?>
			</td>
		</tr>
		<tr>
			<td class="admin_list admin_list_first"><?php echo ($base["name"]); ?></td>
			<td align="center" class="admin_list"><?php echo ($base["versions"]); ?></td>
			<td align="center" class="admin_list"><?php echo ($base["update_time"]); ?></td>
			<td align="center" class="admin_list"><?php echo ($base["author"]); ?></td>
			<td align="center" class="admin_list">
				<?php if(C('qscms_rewrite_type') == $base['alias']): ?>使用中<?php endif; ?>
			</td>
			<td align="center" class="admin_list">
				<?php if(C('qscms_rewrite_type') != $base['alias']): ?><a href="<?php echo U('page/rewrite_set',array('type'=>$base['alias']));?>" onclick="return confirm('请确保服务器正常开启伪静态服务！')">应用</a><?php endif; ?>
			</td>
		</tr>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
				<td class="admin_list admin_list_first"><?php echo ($list["name"]); ?></td>
				<td align="center" class="admin_list"><?php echo ($list["versions"]); ?></td>
				<td align="center" class="admin_list"><?php echo ($list["update_time"]); ?></td>
				<td align="center" class="admin_list"><?php echo ($list["author"]); ?></td>
				<td align="center" class="admin_list">
					<?php if(C('qscms_rewrite_type') == $list['alias']): ?>使用中<?php endif; ?>
				</td>
				<td align="center" class="admin_list">
					<a href="<?php echo U('page/rewrite_details',array('type'=>$list['filename']));?>">详情</a>
					&nbsp;
					<?php if(C('qscms_rewrite_type') != $list['alias']): ?><a href="<?php echo U('page/rewrite_set',array('type'=>$list['filename']));?>" onclick="return confirm('请确保服务器正常开启伪静态服务！')">应用</a>
						&nbsp;<?php endif; ?>
					<?php if($list['alias'] != 'default'): ?><a href="<?php echo U('page/rewrite_delete',array('type'=>$list['filename']));?>"  onclick="return confirm('你确定要删除吗？')">删除</a><?php endif; ?>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
</div>
<div class="footer link_lan">
Powered by <a href="http://www.74cms.com" target="_blank"><span style="color:#009900">74</span><span style="color: #FF3300">CMS</span></a> <?php echo C('QSCMS_VERSION');?>
</div>
<div class="admin_frameset" >
  <div class="open_frame" title="全屏" id="open_frame"></div>
  <div class="close_frame" title="还原窗口" id="close_frame"></div>
</div>
</body>
</html>
</body>
</html>