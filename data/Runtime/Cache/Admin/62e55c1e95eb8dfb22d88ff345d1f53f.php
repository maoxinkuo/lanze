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
	var URL = '/ls/index.php/Admin/Admin',
		SELF = '/ls/index.php?m=Admin&amp;c=Admin&amp;a=index',
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
    <div class="toptip">
        <h2>提示：</h2>
        <p>通过管理员设置，您可以进行编辑管理员资料、角色、密码以及删除管理员等操作；</p>
    </div>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" id="list" class="link_lan">
		<tr>
			<td class="admin_list_tit admin_list_first">用户名</td>
			<td  class="admin_list_tit">头衔</td>
			<td  class="admin_list_tit">创建时间</td>
			<td  class="admin_list_tit">最后登录时间</td>
			<td  class="admin_list_tit">最后登录ip</td>
			<td width="230" align="center" class="admin_list_tit">操作</td>
		</tr>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
				<td class="admin_list admin_list_first"><?php echo ($list["username"]); ?></td>
				<td class="admin_list"><?php echo ($list["role"]["name"]); ?></td>
				<td class="admin_list"><?php echo date("Y-m-d",$list['add_time']);?></td>
				<td class="admin_list">
					<?php if($list['last_login_time'] == 0): ?>从未
					<?php else: ?>
						<?php echo date("Y-m-d",$list['last_login_time']); endif; ?>
					<span class="view login_log" title="最新10次登录记录" parameter="id=<?php echo ($_SESSION['admin']['id']); ?>">&nbsp;&nbsp;&nbsp;&nbsp;</span>
				</td>
				<td class="admin_list">
					<?php echo ($list["last_login_ip"]); ?>
					<span class="view login_log" title="最新10次登录记录" parameter="id=<?php echo ($_SESSION['admin']['id']); ?>">&nbsp;&nbsp;&nbsp;&nbsp;</span>
				</td>
				<td class="admin_list" align="center">
					<a href="<?php echo U('adminLog/index',array('admin_name'=>$list['username']));?>" >日志</a>
					&nbsp;&nbsp;
					<?php if($list['id'] != 1): if($apply['Subsite']): ?><a class="J_subsite" href="javascript:;" parameter="id=<?php echo ($list['id']); ?>">分站</a>
						<?php else: ?>
							<a href="<?php echo U('admin/details',array('id'=>$list['id']));?>" >详情</a><?php endif; ?>
						&nbsp;&nbsp;<?php endif; ?>
					<a href="<?php echo U('admin/edit',array('id'=>$list['id']));?>" >编辑</a>
					<?php if($list['id'] != 1): ?>&nbsp;&nbsp;
						<a href="<?php echo U('admin/delete',array('id'=>$list['id']));?>" onclick="return confirm('确定要删除吗？')">删除</a><?php endif; ?>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<table width="100%" border="0" cellspacing="10" cellpadding="0" class="admin_list_btm">
		<tr>
			<td>
				<input name="ButADD" type="button" class="admin_submit" id="ButADD" value="添加管理员"  onclick="window.location='<?php echo U('admin/add');?>'"/>
			</td>
			<td width="305" align="right"></td>
		</tr>
	</table>
	<div class="qspage"><?php echo ($page); ?></div>
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
<script type="text/javascript">
	$(".login_log").QSdialog({
		DialogTitle:"登录日志",
		DialogContentType:"url",
		DialogContent:"<?php echo U('ajax/admin_login_log');?>&"
	});
	$(".J_subsite").QSdialog({
        DialogTitle:"分站选择",
        DialogContentType:"url",
        DialogContent:"<?php echo U('ajax/ajax_subsite');?>&"
    });
</script>
</body>
</html>