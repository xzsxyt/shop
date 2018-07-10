<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"C:\wamp64\www\project1/wstshop/admin\view\orders\list_wait_delivery.html";i:1523179462;s:51:"C:\wamp64\www\project1/wstshop/admin\view\base.html";i:1523179462;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>后台管理中心 - <?php echo WSTConf('CONF.shopName'); ?></title>
<meta name="keywords" content=""/>
<meta name="description" content=""/> 
<link href="__ADMIN__/js/ligerui/skins/Aqua/css/ligerui-all.css?v=<?php echo $v; ?>" rel="stylesheet" type="text/css" /> 
<link href="__STATIC__/plugins/validator/jquery.validator.css?v=<?php echo $v; ?>" rel="stylesheet">
  
<script src="__STATIC__/js/jquery.min.js?v=<?php echo $v; ?>"></script>  
<script src="__ADMIN__/js/ligerui/js/ligerui.all.js?v=<?php echo $v; ?>" type="text/javascript"></script> 
<script type='text/javascript' src='__STATIC__/plugins/layer/layer.js?v=<?php echo $v; ?>'></script> 
<script src="__STATIC__/js/common.js?v=<?php echo $v; ?>"></script>
<link href="__ADMIN__/css/style.css?v=<?php echo $v; ?>" rel="stylesheet" type="text/css" /> 
<script>
window.conf = {"ROOT":"__ROOT__","APP":"__APP__","STATIC":"__STATIC__","SUFFIX":"<?php echo config('url_html_suffix'); ?>","GOODS_LOGO":"<?php echo WSTConf('CONF.goodsLogo'); ?>","SHOP_LOGO":"<?php echo WSTConf('CONF.shopLogo'); ?>","USER_LOGO":"<?php echo WSTConf('CONF.userLogo'); ?>",'GRANT':'<?php echo implode(",",session("WST_STAFF.privileges")); ?>'}
</script>
<script src="__ADMIN__/js/common.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" src="__STATIC__/plugins/validator/jquery.validator.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" src="__STATIC__/plugins/validator/local/zh-CN.js?v=<?php echo $v; ?>"></script>
</head>
<body>

<div class="l-loading" style="display: block" id="wst-loading"></div>
<div class="wst-toolbar">
订单编号：<input type="text" name="orderNo"  placeholder='订单编号' id="orderNo" class='j-ipt'/>
支付方式：<select id='payType' class='j-ipt'>
         <option value='-1'>全部</option>
         <option value='0'>货到付款</option>
         <option value='1'>在线支付</option>
      </select>
配送方式：<select id='deliverType' class='j-ipt'>
         <option value='-1'>全部</option>
         <option value='1'>自提</option>
         <option value='0'>送货上门</option>
       </select>
   <button class="btn btn-blue" onclick='javascript:loadWaitDeliveryGrid()'>查询</button>
   <div style='clear:both'></div>
</div>
<div id="maingrid"></div>
<div id='deliverBox' style='display:none'>
    <form id='deliverForm' autocomplete='off'>
    <table class='wst-form wst-box-top'>
        <tr>
            <th width='80'>快递公司：</th>
            <td>
               <select id='expressId'>
                  <option value=''>请选择</option>
                  <?php if(is_array($express) || $express instanceof \think\Collection): $i = 0; $__LIST__ = $express;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                  <option value='<?php echo $vo["expressId"]; ?>'><?php echo $vo["expressName"]; ?></option>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
               </select>
            </td>
          </tr>
          <tr>
            <th>快递号：</th>
            <td><input type='text' id='expressNo' maxLength='20' style='width:80%'></td>
        </tr>
    </table>
    </form>
</div>
<script>
$(function(){initWaitDeliveryGrid();})
</script>


<script src="__ADMIN__/orders/orders.js?v=<?php echo $v; ?>" type="text/javascript"></script>

<script>
function showImg(opt){
	layer.photos(opt);
}
function showBox(opts){
	return WST.open(opts);
}
</script>
</body>
</html>