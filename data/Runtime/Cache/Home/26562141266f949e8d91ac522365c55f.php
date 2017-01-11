<?php if (!defined('THINK_PATH')) exit();?><div class="modify_user_dialog">
	<div class="tip">
		短信到达需要1~2分钟，若长时间未收到请点击重新发送！
	</div>
	<div id="J_mobileWrap" class="content">
		<div class="err J_errbox"></div>
		<div class="td1"><span class="asterisk"></span>&nbsp;手机号码：</div>
		<div class="td2">
			<input type="text" data-original="<?php echo ($visitor["mobile"]); ?>" value="<?php echo ($visitor["mobile"]); ?>" class="input_245_34" name="mobile">
			<input type="hidden" name="audit" id="audit" value="<?php echo ($audit); ?>">
		</div>
		<div class="clear"></div>
		<div class="td1"><span class="asterisk"></span>&nbsp;验证码：</div>
		<div class="td2">
			<div class="code">
				<input type="text" class="" name="verifycode">
			</div>
	        <div class="codebtn"><input type="button" id="J_mobileVerifyCode" class="btn_verficode J_hoverbut" value="获取验证码"></div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div id="popup-captcha"></div>
<input type="hidden" id="btnCheck" />
<script src="../public/js/gt.js"></script>
<script type="text/javascript">
	$.ajax({
        // 获取id，challenge，success（是否启用failback）
        url: "<?php echo U('/captcha');?>?m=Home&c=Captcha&t=" + (new Date()).getTime(), // 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function (data) {
            // 使用initGeetest接口
            // 参数1：配置参数
            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
            initGeetest({
                gt: data.gt,
                challenge: data.challenge,
                product: "popup", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
            }, handlerAuthMob);
        }
    });
    var handlerAuthMob = function(captchaObj) {
        captchaObj.appendTo("#popup-captcha");
        captchaObj.bindOn("#btnCheck");
        captchaObj.onSuccess(function() {
            $.post("<?php echo U('Members/send_mobile_code');?>",{mobile:$.trim($('#J_mobileWrap input[name="mobile"]').val())},function(result){
				if(result.status == 1){
					disapperTooltip('success',result.msg);
					timer=setInterval(ountdown,1000);
				}else{
					$('#J_mobileWrap .J_errbox').text(result.msg).show();
				}
			},'json');
        });
        captchaObj.onFail(function() {
            
        });
        captchaObj.onError(function() {
            
        });
        captchaObj.getValidate()
    };

	var timer,ountdownVal = 180,
	ountdown = function(){
		ountdownVal--;
		if(ountdownVal<=0){
			clearInterval(timer);
			$('#J_mobileVerifyCode').val('获取验证码').removeClass('disabled').prop('disabled', 0);
		}else{
			$('#J_mobileVerifyCode').val('重新发送'+ ountdownVal +'秒').addClass('disabled').prop('disabled', !0);
		}
	};
	var regularMobileAuth = /^13[0-9]{9}$|14[0-9]{9}$|15[0-9]{9}$|18[0-9]{9}$|17[0-9]{9}$/; // 验证手机号正则
	$('#J_mobileVerifyCode').click(function(){
		var mobile = $.trim($('#J_mobileWrap input[name="mobile"]').val());
		var audit = $.trim($('input[name="audit"]').val());
		if(mobile == ''){
			$('#J_mobileWrap .J_errbox').text('手机号不能不空！').show();
			return false;
		}
		if (mobile != "" && !regularMobileAuth.test(mobile)) {
			$('#J_mobileWrap .J_errbox').text('手机号码格式不正确！').show();
			return false;
		}
		if (eval(audit)) {
			if (mobile == $('#J_mobileWrap input[name="mobile"]').data('original')) {
				$('#J_mobileWrap .J_errbox').text('你的手机号 ' + mobile + ' 已经通过认证！').show();
				return false;
			}
		}
		$('#J_mobileWrap .J_errbox').text('').hide();
		<?php if(C('qscms_captcha_open') == 1 && C('qscms_captcha_config.varify_mobile') == 1): ?>$("#btnCheck").click();
        <?php else: ?>
            $.post("<?php echo U('Members/send_mobile_code');?>",{mobile:mobile},function(result){
				if(result.status == 1){
					disapperTooltip('success',result.msg);
					timer=setInterval(ountdown,1000);
				}else{
					$('#J_mobileWrap .J_errbox').text(result.msg).show();
				}
			},'json');<?php endif; ?>
	});
</script>