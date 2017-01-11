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
		SELF = '/ls/index.php?m=Admin&amp;c=Page&amp;a=edit&amp;id=11',
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
  <p>若修改了伪静态规则，请修改服务器伪静态规则文件的对应规则。</p>
</div>
  <form action="<?php echo U('edit');?>" method="post"   name="form1" id="form1">
  <div class="toptit">基础设置</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="4" class="link_lan">
      <tr>
        <td style=" line-height:220%; color:#666666;"><table width="700" border="0" cellspacing="5" cellpadding="1" style=" margin-bottom:3px;">
          <tr>
            <td width="150" align="right">
      <input name="id" type="hidden" value="<?php echo ($info['id']); ?>" />
      <input name="systemclass" type="hidden" value="<?php echo ($info['systemclass']); ?>" />
      页面类型：</td>
            <td> 
            <?php if($info['systemclass'] == 1): ?><span style="color:#FF0000">系统内置</span>
              <?php else: ?>
              自定义页面<?php endif; ?>
              </td>
          </tr>
      <tr>
            <td width="150" align="right">调用ID：</td>
            <td>
            <?php if($info['systemclass'] == 1): ?><strong><?php echo ($info['alias']); ?></strong>
              <input name="alias" type="hidden" value="<?php echo ($info['alias']); ?>" />
              <?php else: ?>
             <input name="alias" type="text"  class="input_text_200" id="alias" value="<?php echo ($info['alias']); ?>" maxlength="30"  />
              自定义页面调用名称不可以用 &quot;QS_&quot; 开头<?php endif; ?>
            </td>
          </tr>
          <tr>
            <td width="150" align="right">页面名称：</td>
            <td><input name="pname" type="text"  class="input_text_200" id="title" value="<?php echo ($info['pname']); ?>" maxlength="60"  /></td>
          </tr>
          <tr>
            <td width="150" align="right">导航关联标记：</td>
            <td><input name="tag" type="text"  class="input_text_200" id="tag" value="<?php echo ($info['tag']); ?>" maxlength="60"  /></td>
          </tr>
          <tr>
            <td align="right">链接优化：</td>
            <td>
       <table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="120"><label >
              <input type="radio" name="url" value="0" <?php if($info['url'] == 0): ?>checked=checked<?php endif; ?>/>
              原始链接 </label></td>
                    <td><label >
              <input type="radio" name="url" value="1" <?php if($info['url'] == 1): ?>checked=checked<?php endif; ?>/>
              伪静态</label></td>
                  </tr>
                </table></td>
          </tr>
          <tr>
            <td align="right">页面类型：</td>
            <td> 
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120">
    <label >
    <input type="radio" name="pagetpye" value="1" <?php if($info['pagetpye'] == 1): ?>checked=checked<?php endif; ?>  onclick="show_seo('seo');"  <?php if($info['systemclass'] == 1): ?>disabled<?php endif; ?>/>首页或频道首页 </label>
    </td>
    <td width="120"><label >
<input type="radio" name="pagetpye" value="2" <?php if($info['pagetpye'] == 2): ?>checked=checked<?php endif; ?> onclick="show_seo('seo');"  <?php if($info['systemclass'] == 1): ?>disabled<?php endif; ?>/>
信息列表页 </label>
</td>
    <td><label >
<input type="radio" name="pagetpye" value="3"   <?php if($info['pagetpye'] == 3): ?>checked=checked<?php endif; ?>  onclick="show_seo('seo');"  <?php if($info['systemclass'] == 1): ?>disabled<?php endif; ?>/>
信息内容页</label></td>
  </tr>
</table></td>
          </tr>
        </table></td>
      </tr>
    </table>
     <div class="toptit">页面设置</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="4" class="link_lan">
 
    <tr>
      <td  ><table width="700" border="0" cellspacing="5" cellpadding="1" style=" margin-bottom:3px;">
          <tr>
              <td width="150" align="right">模块：</td>
              <td width="210"><input name="module" type="text"  class="input_text_200" id="module" value="<?php echo ($info['module']); ?>" /></td>
              <td><span style="color:#666666">(模块开头字母要大写)</span>&nbsp;</td>
            </tr>
            <tr>
              <td width="150" align="right">控制器：</td>
              <td width="210"><input name="controller" type="text"  class="input_text_200" id="controller" value="<?php echo ($info['controller']); ?>" /></td>
              <td><span style="color:#666666">(控制器开头字母要大写)</span>&nbsp;</td>
            </tr>
            <tr>
              <td width="150" align="right">方法：</td>
              <td width="210"><input name="action" type="text"  class="input_text_200" id="action" value="<?php echo ($info['action']); ?>" /></td>
            </tr>
  <!--<tr>
    <td width="150" align="right">伪静态规则：</td>
    <td><input name="rewrite" type="text"  class="input_text_200" id="rewrite" value="<?php echo ($info['rewrite']); ?>" /></td>
    <td><span style="color:#666666">(修改后请修改服务器伪静态配置文件)</span>&nbsp;</td>
  </tr>-->
 
  <tr>
    <td align="right"><a  href="javascript:isdisplay('caching_help')" >(?)</a>&nbsp;&nbsp;缓存时间：</td>
    <td><input name="caching" type="text"  class="input_text_200" id="caching" value="<?php echo ($info['caching']); ?>" maxlength="30"/></td>
    <td>分钟 <span style="color:#666666">(0为不缓存) </span></td>
  </tr>
    
        </table>
    <table width="100%" border="0" cellpadding="0" style="line-height:180%; padding-left:15px; display:none" id="caching_help">
          <tr>
            <td><span style="color:#666666">
              <strong style="color:#003399">缓存说明</strong><br />缓存是当查询数据时，会把结果序列化后保存到文件中，以后同样的查询就不用查询数据库，而是从缓存中获得。这一改进使得程序速度得以太幅度提升。<br />
              缓存时间是缓存重新加载周期，周期越长，数据库的负荷越小，缓存周期假设为50秒，则每50秒刷新缓存一次。</span><br /></td>
          </tr>
        </table>
    </td>
      </tr>
    </table>
<div id="seo">
  <div class="toptit">搜索引擎优化(SEO)</div>
    <table width="100%" border="0" cellspacing="0" cellpadding="4" class="link_lan"  >

        <td style=" line-height:220%; color:#666666;">
        <table width="700" border="0" cellspacing="5" cellpadding="1" style=" margin-bottom:3px;">
     <tr>
              <td width="150" align="right">可用标签：</td>
              <td>
          <div id="{site_name}" class="sellabel">网站名称</div>
          <div id="{site_domain}" class="sellabel">网站域名</div>
          <?php if(is_array($info['variate'])): $i = 0; $__LIST__ = $info['variate'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div id="{<?php echo ($key); ?>}" class="sellabel"><?php echo ($vo); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="clear"></div>
        </td>
            </tr>
      <tr>
            <tr>
              <td width="150" align="right">title：</td>
              <td><input name="title" type="text"  class="input_text_400" id="labtitle" value="<?php echo ($info['title']); ?>"  /></td>
            </tr>
            <tr>
              <td width="150" align="right">keywords：</td>
              <td><textarea name="keywords" class="input_text_400" id="labkeywords" style="height:60px;"><?php echo ($info['keywords']); ?></textarea></td>
            </tr>
            <tr>
              <td width="150" align="right">description：</td>
              <td><textarea name="description" class="input_text_400" id="labdescription" style="height:60px;"><?php echo ($info['description']); ?></textarea></td>
            </tr>
        </table></td>
      </tr>
    </table>
  </div>
    <table width="100%" border="0" cellspacing="0" cellpadding="4" class="link_lan">
      <tr>
        <td height="80"  style=" padding-left:170px;"  >
        <input name="subsite_id" type="hidden" value="<?php echo ($info["subsite_id"]); ?>">
    <input type="submit" name="Submi1t2" value="保存修改" class="admin_submit"   />
          <input name="submit222" type="button" class="admin_submit"    value="返 回" onclick="window.location='<?php echo U('page/index');?>'"/>
      
      </td>
      </tr>
    </table>
  </form>
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
<script type="text/javascript" src="__ADMINPUBLIC__/js/jquery.caretInsert.js"></script>
<script language="JavaScript" type="text/javascript"> 
//获取单选的值
function radios_val(val)
{
    var radios=document.getElementsByName(val);
    for(var i=0;i<radios.length;i++)
    {
        if(radios[i].checked==true)
        {
  return radios[i].value;
        break;
        }
    }
}
//show_seo("seo");
function show_seo(showid)
{
var caching_val=radios_val("pagetpye");
if (caching_val!="3")
{
 document.getElementById(showid).style.display="";   
}
else
{
document.getElementById(showid).style.display="none";   
}
}
function isdisplay(i)     
{      
if(document.getElementById(i).style.display=="")     
{     
 document.getElementById(i).style.display="none";     
}     
else     
{     
document.getElementById(i).style.display="";     
  
}     
 }
(function($)
{
  $(".sellabel").hover(function(){$(this).css("background-color","#ffffff");},function()  {$(this).css("background-color","#F4FAFF");});
  $("#labtitle").unbind().focus(function() {
    $('#labtitle').setCaret();
     $('.sellabel').unbind("click").click(function(){ 
       $('#labtitle').insertAtCaret($(this).attr("id"));
     });
  });
  $("#labkeywords").unbind().focus(function() {
    $('#labkeywords').setCaret();
     $('.sellabel').unbind("click").click(function(){ 
       $('#labkeywords').insertAtCaret($(this).attr("id"));
     });
  });
  $("#labdescription").unbind().focus(function() {
    $('#labdescription').setCaret();
     $('.sellabel').unbind("click").click(function(){ 
       $('#labdescription').insertAtCaret($(this).attr("id"));
     });
  }); 
})($);   
</script>  
</body>
</html>