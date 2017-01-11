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
	var URL = '/ls/index.php/Admin/Company',
		SELF = '/ls/index.php?m=Admin&amp;c=Company&amp;a=edit_company&amp;id=1&amp;_k_v=1',
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
  <div class="toptit">修改企业资料 - <span style="color:#0066CC"><?php echo ($info["companyname"]); ?></span></div>
  <form id="Form1" name="Form1" method="post" action="<?php echo U('company/edit_company');?>" >
    <table width="100%" border="0" cellpadding="4" cellspacing="0"   >
      <tr>
        <td height="30" align="right"  style=" border-bottom:1px #CCCCCC dashed">所属会员：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed">
          <?php echo ($info['user']['username']); ?>
        </td>
      </tr>
      <tr>
        <td height="30" align="right"  style=" border-bottom:1px #CCCCCC dashed">添加时间：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed">
          <?php echo (date("Y-m-d",$info['addtime'])); ?>
        </td>
      </tr>
      <tr>
        <td height="30" align="right"  style=" border-bottom:1px #CCCCCC dashed">添加方式：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed">
          <?php if($info['robot'] == '0'): ?>人工<?php endif; ?>
          <?php if($info['robot'] == '1'): ?>采集<?php endif; ?>
        </td>
      </tr>
      <tr>
        <td height="30" align="right"  style=" border-bottom:1px #CCCCCC dashed">营业执照：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed" class="link_lan">
          <?php if($info['certificate_img']): ?><a href="<?php echo attach($info['certificate_img'],'certificate_img');?>" target="_blank" title="点击查看"> 已上传</a>
          <?php else: ?>
          未上传<?php endif; ?>
        </td>
      </tr>
      <tr>
        <td height="30" align="right"  style=" border-bottom:1px #CCCCCC dashed"> 认证状态：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed">
          <label><input name="audit"  type="radio" value="1" <?php if($info['audit'] == '1'): ?>checked="checked"<?php endif; ?> />认证通过</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <label><input name="audit"  type="radio" value="2" <?php if($info['audit'] == '2'): ?>checked="checked"<?php endif; ?> />等待认证</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <label><input name="audit"  type="radio" value="3" <?php if($info['audit'] == '3'): ?>checked="checked"<?php endif; ?> />认证未通过</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <label><input name="audit"  type="radio" value="0" <?php if($info['audit'] == '0'): ?>checked="checked"<?php endif; ?> />未认证</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
      </tr>
      
      <tr>
        <td width="110" height="30" align="right"   style=" border-bottom:1px #CCCCCC dashed"><span style="color:#FF3300; font-weight:bold">*</span>公司名称：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed"><input name="companyname" type="text" class="input_text_200" id="companyname" maxlength="30"  style="width:350px;" value="<?php echo ($info["companyname"]); ?>" /></td>
      </tr>
      <tr>
        <td height="30" align="right"  style=" border-bottom:1px #CCCCCC dashed"><span style="color:#FF3300; font-weight:bold">*</span>企业性质：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed">
          <div>
            <input type="text" value="<?php echo ((isset($info["nature_cn"]) && ($info["nature_cn"] !== ""))?($info["nature_cn"]):"请选择"); ?>"  readonly="readonly" name="nature_cn" id="nature_cn" class="input_text_200 input_text_selsect"/>
            <input name="nature" id="nature" type="hidden" value="<?php echo ($info["nature"]); ?>" />
            <div id="menu1" class="menu">
              <ul>
                <?php if(is_array($category['QS_company_type'])): $i = 0; $__LIST__ = $category['QS_company_type'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li id="<?php echo ($key); ?>" title="<?php echo ($list); ?>"><?php echo ($list); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </div>
          </div>
          
        </td>
      </tr>
      <tr>
        <td height="30" align="right"  style=" border-bottom:1px #CCCCCC dashed"><span style="color:#FF3300; font-weight:bold;">*</span>所属行业：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed">
          <div>
            <input type="text" value="<?php echo ((isset($info["trade_cn"]) && ($info["trade_cn"] !== ""))?($info["trade_cn"]):"请选择"); ?>"  readonly="readonly" name="trade_cn" id="trade_cn" class="input_text_200 input_text_selsect"/>
            <input name="trade" id="trade" type="hidden" value="<?php echo ($info["trade"]); ?>" />
            <div id="menu2" class="dmenu shadow">
              <ul>
                <?php if(is_array($category['QS_trade'])): $i = 0; $__LIST__ = $category['QS_trade'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$trade): $mod = ($i % 2 );++$i;?><li id="<?php echo ($key); ?>" title="<?php echo ($trade); ?>"><?php echo ($trade); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </div>
          </div>
          
        </td>
      </tr>
      <tr>
        <td height="30" align="right" style=" border-bottom:1px #CCCCCC dashed"><span style="color:#FF3300; font-weight:bold">*</span>所在地区：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed">
          <div>
            <input type="text" value="<?php echo ((isset($info["district_cn"]) && ($info["district_cn"] !== ""))?($info["district_cn"]):"请选择"); ?>"  readonly="readonly" name="district_cn" id="district_cn" data-title="请选择工作地区" data-multiple="false" data-maxnum="0" <?php if(C('qscms_category_district_level') > 2): ?>data-width="667"<?php else: ?>data-width="520"<?php endif; ?> data-category="<?php echo C('qscms_category_district_level');?>" class="input_text_200 input_text_selsect J_resuletitle_city"/>
            <input class="J_resultcode_city" name="districtcategory" id="districtcategory" type="hidden" value="<?php echo ($info["district"]); ?>.<?php echo ($info["sdistrict"]); ?>.<?php echo ($info["tdistrict"]); ?>" />
          </div>
          
        </td>
      </tr>
      <tr>
        <td height="30" align="right" style=" border-bottom:1px #CCCCCC dashed"><span style="color:#FF3300; font-weight:bold">*</span>公司规模：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed">
          <div>
            <input type="text" value="<?php echo ((isset($info["scale_cn"]) && ($info["scale_cn"] !== ""))?($info["scale_cn"]):"请选择"); ?>"  readonly="readonly" name="scale_cn" id="scale_cn" class="input_text_200 input_text_selsect"/>
            <input name="scale" id="scale" type="hidden" value="<?php echo ($info["scale"]); ?>" />
            <div id="menu4" class="menu">
              <ul>
                <?php if(is_array($category['QS_scale'])): $i = 0; $__LIST__ = $category['QS_scale'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$scale): $mod = ($i % 2 );++$i;?><li id="<?php echo ($key); ?>" title="<?php echo ($scale); ?>"><?php echo ($scale); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td height="30" align="right"  style=" border-bottom:1px #CCCCCC dashed">注册资金：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed"><input name="registered" type="text" class="input_text_200" id="registered" maxlength="5" value="<?php echo ($info["registered"]); ?>"  style="width:80px;" onKeyUp="if(event.keyCode !=37 && event.keyCode != 39) value=value.replace(/\D/g,'');"onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/\D/g,''))"/>
        万
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>
          <input name="currency" type="radio" value="人民币"  <?php if($info['currency'] == '' || $info['currency'] == '万人民币'): ?>checked="checked"<?php endif; ?> />
        人民币</label>
        &nbsp;&nbsp;&nbsp;
        <label>
          <input type="radio" name="currency" value="美元" <?php if($info['currency'] == '万美元'): ?>checked="checked"<?php endif; ?>/>
        美元</label>    </td>
      </tr>
       <tr>
          <td height="30" align="right" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed">企业福利：</td>
          <td bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed">
     
     <div>
      <input type="text" value="<?php echo ((isset($tagStr['cn']) && ($tagStr['cn'] !== ""))?($tagStr['cn']):"请选择"); ?>"  readonly="readonly" name="tag" id="tag" data-title="请选择职位亮点" data-multiple="true" data-maxnum="6" data-width="582" class="input_text_300 input_text_selsect J_resuletitle_jobtag"/>
      <input class="J_resultcode_jobtag" name="tag" id="tag" type="hidden" value="<?php echo ($tagStr['id']); ?>" />
      </div>
      </td>
            </tr>
      <tr>
        <td height="30" align="right"  style=" border-bottom:1px #CCCCCC dashed"><span style="color:#FF3300; font-weight:bold">*</span>联 系 人：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed">
          <input name="contact" type="text" class="input_text_200" id="contact" maxlength="25" value="<?php echo ($info["contact"]); ?>"/>
          <label><input name="contact_show"  type="checkbox" value="1" <?php if($info['contact_show'] == '1'): ?>checked="checked"<?php endif; ?> />联系人在企业详细页中显示
        </td>
      </tr>
      <tr>
        <td height="30" align="right"  style=" border-bottom:1px #CCCCCC dashed"><span style="color:#FF3300; font-weight:bold">*</span>联系电话：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed">
          <input name="telephone" type="text" class="input_text_200" id="telephone" maxlength="25" value="<?php echo ($info["telephone"]); ?>"/>
          <label><input name="telephone_show"  type="checkbox" value="1" <?php if($info['telephone_show'] == '1'): ?>checked="checked"<?php endif; ?> />联系电话在企业详细页中显示
        </td>
      </tr>
        <tr>
        <td height="30" align="right"  style=" border-bottom:1px #CCCCCC dashed">固定电话：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed">
          <input type="text" id="landline_tel_first" name="landline_tel_first" class="input_text_50" style="width:40px;" maxlength="4"   value="<?php echo ($info['landline_tel_first']); ?>"/>&nbsp;-
          <input id="landline_tel_next" name="landline_tel_next" type="text" class="input_text_100" style="width:90px;" maxlength="11"   value="<?php echo ($info['landline_tel_next']); ?>"/>&nbsp;-
          <input id="landline_tel_last" name="landline_tel_last" type="text" class="input_text_50" style="width:40px;" maxlength="6"   value="<?php echo ($info['landline_tel_last']); ?>"/> <label><input name="landline_tel_show"  type="checkbox" value="1" <?php if($info['landline_tel_show'] == 1): ?>checked="checked"<?php endif; ?> />固定电话在企业详细页中显示</label>
        </td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td height="30" align="right"  style=" border-bottom:1px #CCCCCC dashed"><span style="color:#FF3300; font-weight:bold">*</span>联系邮箱：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed">
          <input name="email" type="text" class="input_text_200" id="email" maxlength="25" value="<?php echo ($info["email"]); ?>"/>
          <label><input name="email_show"  type="checkbox" value="1" <?php if($info['email_show'] == '1'): ?>checked="checked"<?php endif; ?> />联系邮箱在企业详细页中显示
        </td>
      </tr>
      <tr>
        <td height="30" align="right" style=" border-bottom:1px #CCCCCC dashed">公司网址：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed"><input name="website" type="text" class="input_text_200" id="website" maxlength="80" value="<?php echo ($info["website"]); ?>"/></td>
      </tr>
      <tr>
        <td height="30" align="right"  style=" border-bottom:1px #CCCCCC dashed"><span style="color:#FF3300; font-weight:bold">*</span>通讯地址：</td>
        <td  style=" border-bottom:1px #CCCCCC dashed">
          <input name="address" type="text" class="input_text_200" id="address" maxlength="80"  style="width:447px;" value="<?php echo ($info["address"]); ?>"/>
        </td>
      </tr>
      <tr>
        <td align="right" valign="top"  style=" border-bottom:1px #CCCCCC dashed">
          <span style="color:#FF3300; font-weight:bold">*</span> 公司介绍：
        </td>
        <td style=" border-bottom:1px #CCCCCC dashed"><textarea name="contents" class="company_mb_textarea" id="introduction" style="width:450px; height:150px;"onpropertychange="if(this.value.length&gt;2000){this.value=this.value.slice(0,2000)}"><?php echo ($info["contents"]); ?></textarea>
          <br />
          <div style="line-height:30px; height:30px;"> <span style="color:#333333">请将字数控制在2000字以内进行填写</span></div>
          </td>
      </tr>
      <tr>
        <td height="30" align="right"   >&nbsp;</td>
        <td height="120"   >
          <input type="hidden" name="id"  value="<?php echo ($info["id"]); ?>" />
          <input type="hidden" name="uid"  value="<?php echo ($info["uid"]); ?>" />
          <input type="hidden" name="_k_v" value="<?php echo ($_GET['_k_v']); ?>">
          <input name="submit3" type="submit" class="admin_submit"    value="保存修改"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="submit22" type="button" class="admin_submit"    value="返 回" onclick="history.go(-1)"/>
        </span></td>
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
<?php $tag_load_class = new \Common\qscmstag\loadTag(array('type'=>'category','cache'=>'0','列表名'=>'list',));$list = $tag_load_class->category();?>
<script type="text/javascript" src="../public/js/jquery.modal.userselectlayer.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
  showmenu("#nature_cn","#menu1","#nature");
  showmenu("#trade_cn","#menu2","#trade");
    showmenu("#scale_cn","#menu4","#scale");
});
</script>
</body>
</html>