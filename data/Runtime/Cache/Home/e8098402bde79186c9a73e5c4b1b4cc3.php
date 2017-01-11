<?php if (!defined('THINK_PATH')) exit();?><div class="guide_service_dialog">
    <div class="guide_resume_down">
        <?php if($is_free == '1'): ?><div class="guide_package_list_group">
            <div class="package_list_head">
                <div class="list_head_left">套餐资源</div>
                <div class="list_head_center">普通会员价</div>
                <div class="list_head_right">VIP会员价</div>
                <div class="clear"></div>
            </div>
            <?php if(is_array($increment_arr)): $i = 0; $__LIST__ = $increment_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="package_list_cell">
                <div class="list_cell_left"><label><input class="J_radioitme_order" type="radio" name="list_cell" <?php if($key == '0'): ?>checked<?php endif; ?>  my_price="<?php echo ($vo['my_price']); ?>" need_points="<?php echo ($vo['need_points']); ?>" project_id="<?php echo ($vo['id']); ?>"><?php echo ($vo['name']); ?></label></div>
                <div class="list_cell_center"><span class="yellow_light"><?php echo ($vo['my_price']); ?></span> 元 <span class="ft_12">(<?php echo ($vo['my_unit_price']); ?> 元/<?php echo ($unit_arr[$vo['cat']]); ?>)</span></div>
                <div class="list_cell_right"><span class="yellow_light"><?php echo ($vo['vip_price']); ?></span> 元 <span class="ft_12">(<?php echo ($vo['vip_unit_price']); ?> 元/<?php echo ($unit_arr[$vo['cat']]); ?>)</span></div>
                <div class="clear"></div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <?php else: ?>
        <div class="guide_package_list_group">
            <div class="package_list_head">
                <div class="list_head_left">套餐资源</div>
                <div class="list_head_center">会员专享价</div>
                <div class="list_head_right">折后优惠</div>
                <div class="clear"></div>
            </div>
            <?php if(is_array($increment_arr)): $i = 0; $__LIST__ = $increment_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="package_list_cell">
                <div class="list_cell_left"><label><input class="J_radioitme_order" type="radio" name="list_cell" <?php if($key == '0'): ?>checked<?php endif; ?> my_price="<?php echo ($vo['my_price']); ?>" need_points="<?php echo ($vo['need_points']); ?>" project_id="<?php echo ($vo['id']); ?>"><?php echo ($vo['name']); ?></label></div>
                <div class="list_cell_center"><span class="yellow_light"><?php echo ($vo['my_price']); ?></span> 元 <span class="ft_12">(<?php echo ($vo['my_unit_price']); ?> 元/<?php echo ($unit_arr[$vo['cat']]); ?>)</span></div>
                <div class="list_cell_right">省 <span class="yellow_light"><?php echo ($vo['my_saved_price']); ?></span> 元</div>
                <div class="clear"></div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endif; ?>
        <div class="dashed_line"></div>
        <div class="points_pay_increment">
            <div class="guide_list_group last">
                <div class="guide_list_left">所需<?php echo C('qscms_points_byname');?>：</div>
                <div class="guide_list_right">
                    <span class="yellow_light need_points"></span>&nbsp;&nbsp;&nbsp;&nbsp;您当前拥有 <span class="yellow_light"><?php echo ($mypoints); ?></span> <?php echo C('qscms_points_byname');?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="guide_btn_group">
                <div class="btn_guide" id="points_convert">立即兑换</div>
            </div>
        </div>
        <div class="cash_pay_increment">
            <div class="guide_list_group last">
                <div class="guide_list_left for_input">使用<?php echo C('qscms_points_byname');?>：</div>
                <div class="guide_list_right">
                    <input class="input_coin" id="J_integralforcash_input_increment" type="text" placeholder="请输入要抵扣的<?php echo C('qscms_points_byname');?>数" onkeyup="if(event.keyCode !=37 && event.keyCode != 39) value=value.replace(/\D/g,'');" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/\D/g,''))">&nbsp;&nbsp;&nbsp;&nbsp;您当前拥有 <span class="yellow_light"><?php echo ($mypoints); ?></span> <?php echo C('qscms_points_byname');?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="guide_list_group last">
                <div class="guide_list_left">应付金额：</div>
                <div class="guide_list_right">
                    <span class="yellow_light" id="pay_cash_increment"></span> 元&nbsp;&nbsp;&nbsp;&nbsp;<?php echo C('qscms_points_byname');?>已抵扣 <span class="yellow_light" id="J_integralforcashvalue_increment">0</span> 元
                </div>
                <div class="clear"></div>
            </div>
            <div class="cash_btn_group">
                <div class="cash_btn_cell">
                    <a href="javascript:;" class="cash_pay_submit" payment="wxpay" form_id="cash_pay_form_increment"  data-action="<?php echo U('CompanyService/increment_add_save');?>">
                        <div class="cell_icon"></div>
                        <div class="cell_txt">微信扫码支付</div>
                    </a>
                </div>
                <div class="cash_btn_cell">
                    <a href="javascript:;" class="cash_pay_submit" payment="alipay" form_id="cash_pay_form_increment"  data-action="<?php echo U('CompanyService/increment_add_save');?>">
                        <div class="cell_icon icon2"></div>
                        <div class="cell_txt">支付宝快捷支付</div>
                    </a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <form target="_blank" id="cash_pay_form_increment" method="post" action="<?php echo U('increment_add_save');?>">
    <input type="hidden" name="jobs_id" id="jobs_id_increment" value="<?php echo ($jobs_id); ?>">
    <input type="hidden" name="pay_type" value="cash">
    <!--增值服务类型唯一标识-->
    <input type="hidden" name="service_type" value="<?php echo ($cat); ?>">
    <!--需要支付的现金-->
    <input type="hidden" id="amount" name="amount" value="">
    <!--是否抵扣-->
    <input type="hidden" name="is_deductible" id="is_deductible_increment" value="0">
    <!-- 抵现积分数-->
    <input type="hidden" name="deductible" id="deductible_increment" value="">
    <input type="hidden" name="payment_name" id="payment_name_increment" value="wxpay">
    <input type="hidden" id="project_id" name="project_id" value="<?php echo ($increment_arr[0]['id']); ?>">
    <!--不抵扣的情况下需要支付的积分-->
    <input type="hidden" id="total_points" name="total_points" value="<?php echo ($increment_arr[0]['need_points']); ?>">
    <input type="hidden" id="need_cash" name="need_cash" value="">
    </form>
</div>

<script type="text/javascript">
    
    $(".cash_pay_submit").click(function(){
        $("#payment_name").val($(this).attr('payment'));
        $("#payment_name_increment").val($(this).attr('payment'));
        var formid = $(this).attr('form_id');
        var action_url = $(this).attr('data-action');
        if($(this).attr('payment')=='wxpay'){
            var qsDialog = $("#"+formid).dialog({
                title: '微信支付',
                loading:true,
                footer:false
            });
            $.ajax({
                cache: true,
                type: "POST",
                url:action_url,
                data:$('#'+formid).serialize(),
                dataType:"json",
                success: function(result) {
                    if(result.status==1){
                        qsDialog.setContent("<img src='"+result.data+"' alt='扫描二维码' width='250' height='250' />");
                        window.setInterval(run, 5000);
                    }else{
                        qsDialog.setContent(result.msg);
                        return false;
                    }
                }
            });
        }else{
            $("#"+formid).submit();
        }
    });
    select_pay_type();
    // 套餐列表点击
    var $radiobj = $('.J_radioitme_order');
    $radiobj.live('click', function(event) {
        $("#project_id").val($(this).attr("project_id"));
        $("#total_points").val($(this).attr("need_points"));
        select_pay_type();
    });
    function select_pay_type(){
        var mypoints = parseInt("<?php echo ($mypoints); ?>");
        var current_points = parseInt($("#total_points").val());
        if(mypoints<current_points){
            $(".points_pay_increment").hide();
            $(".cash_pay_increment").show();
            $('#J_integralforcash_input_increment').val(mypoints);
            $('#deductible_increment').val(mypoints);
        }else{
            $(".points_pay_increment").show();
            $(".cash_pay_increment").hide();
            $('#J_integralforcash_input_increment').val(current_points);
            $('#deductible_increment').val(current_points);
        }
        $(".need_points").html(current_points);
        if(parseInt($('#J_integralforcash_input_increment').val())>0){
            $("#is_deductible_increment").val(1);
        }else{
            $("#is_deductible_increment").val(0);
        }
        var need_cash = current_points/parseInt("<?php echo ($payment_rate); ?>");
        $("#need_cash").val(need_cash.toFixed(1));
        $("#amount").val(need_cash.toFixed(1));
        $('#J_integralforcashvalue_increment').text(($('#J_integralforcash_input_increment').val()/parseInt("<?php echo ($payment_rate); ?>")).toFixed(1));
        if (parseInt($('#J_integralforcashvalue_increment').html())>0) {
            $("#pay_cash_increment").text(need_cash-parseFloat($('#J_integralforcashvalue_increment').text()).toFixed(1));
            $('#amount').val((parseFloat($('#need_cash').val())-parseFloat($('#J_integralforcashvalue_increment').text())).toFixed(1));
        } else {
            $("#pay_cash_increment").html(need_cash.toFixed(1));
            $('#amount').val(need_cash.toFixed(1));
        }
    }
    $("#J_integralforcash_input_increment").keyup(function(){
        var thisvalue = $(this).val();
        var mypoints = parseInt("<?php echo ($mypoints); ?>");
        var current_points = parseInt($("#total_points").val());
        var minpointsValue = mypoints >= current_points ? current_points : mypoints;
        if (thisvalue > minpointsValue) {
            $(this).val(minpointsValue);
        }
        if(parseInt($(this).val())>0){
            $("#is_deductible_increment").val(1);
        }else{
            $("#is_deductible_increment").val(0);
        }
        var need_cash = current_points/parseInt("<?php echo ($payment_rate); ?>");
        $("#need_cash").val(need_cash.toFixed(1));
        $("#deductible_increment").val($(this).val());
        $("#pay_cash_increment").text((need_cash-$(this).val()/parseInt("<?php echo ($payment_rate); ?>")).toFixed(1));
        $('#J_integralforcashvalue_increment').text($(this).val()/parseInt("<?php echo ($payment_rate); ?>"));
        $('#amount').val((parseFloat($('#need_cash').val())-parseFloat($('#J_integralforcashvalue_increment').text())).toFixed(1));
    });
    function run(){
        $.getJSON("<?php echo U('check_weixinpay_notify');?>",function(result){
            if(result.status==1){
               location.href=result.data;
            }
        });
    }
    $("#points_convert").click(function(){
        ajax_pay('<?php echo ($cat); ?>','points');
    });
    function ajax_pay(type,pay_type){
        var project_id = $("#project_id").val();
        var jobs_id = $("#jobs_id_increment").val();
        var payment_name = "points";
        $.post("<?php echo U('CompanyService/increment_add_save');?>",{pay_type:pay_type,service_type:type,project_id:project_id,payment_name:payment_name,jobs_id:jobs_id},function(result){
            if(result.status==1){
                disapperTooltip("success", "兑换成功！");
                setTimeout(function () {
                    location.reload();
                }, 1000);
            }else{
                disapperTooltip("remind", result.msg);
                return false;
            }
        },'json');
    }
</script>