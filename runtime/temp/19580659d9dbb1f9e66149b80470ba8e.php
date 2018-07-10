<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:51:"C:\wamp64\www\project1/wstshop/admin\view\main.html";i:1523179464;s:51:"C:\wamp64\www\project1/wstshop/admin\view\base.html";i:1523179462;}*/ ?>
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

<div class="wstshop-login-tips">
    <p>您好，<?php echo session('WST_STAFF.staffName'); ?>，欢迎使用 WSTShop。 您上次登录的时间是 <?php echo session('WST_STAFF.lastTime'); ?> ，IP 是 <?php echo session('WST_STAFF.lastIP'); ?></p>
</div>
<div id='wstshop-version-tips' class='wstshop-version-tips'>您有新的版本(<span id='wstshop_version'>0.0.0</span>)可以下载啦~，<a id='wstshop_down' href='' target='_blank'>点击</a>下载</div>
<div id='wstshop-accredit-tips' class='wstshop-accredit-tips'>系统检测到您未获取授权，点此<a target='_blank' href='http://www.wstshop.net/index.php?c=License&a=index'>获取系统授权码</a>，开源版仅提供部分功能体验，授权版功能请联系客服：<a href="tencent://message/?uin=153289970&Site=QQ交谈&Menu=yes">
					  <img border="0" style='vertical-align:middle' src="http://wpa.qq.com/pa?p=1:153289970:7" alt="QQ交谈" width="60" height="20" />
				  </a></div>                
<table width='100%' border='0'>
   <tr>
     <td>
		<table class="wst-form wst-summary">
		  <tr>
		     <td class='wst-summary-head' colspan='4'>今日统计</td>
		  </tr>
		  <tr>
			 <td width="25%" align='right'>新增会员：</td>
			 <td width="25%"><?php echo $object['tody']['newUser']; ?></td>
			 <td width="25%" align='right'>登录会员：</td>
			 <td><?php echo $object['tody']['loginUser']; ?></td>
		  </tr>
		  <tr>
		  	<td width="25%" align='right'>待发货：</td>
			 <td width="25%"><?php echo $object['tody']['waitDelivery']; ?></td>
			 <td width="25%" align='right'>待付款：</td>
			 <td width="25%"><?php echo $object['tody']['waitPay']; ?></td>
		  </tr>
		  <tr>
		  	<td width="25%" align='right'>取消拒收：</td>
			 <td width="25%"><?php echo $object['tody']['cancel']; ?></td>
			 <td width="25%" align='right'>待退款：</td>
			 <td width="25%"><?php echo $object['tody']['refund']; ?></td>
		  </tr>
		  <tr>
		  	<td width="25%" align='right'>待提现：</td>
			 <td width="25%"><?php echo $object['tody']['drawscash']; ?></td>
			 <td width="25%" align='right'>新增评价：</td>
			 <td width="25%"><?php echo $object['tody']['appraise']; ?></td>
		  </tr>


		</table>
		<table class="wst-form wst-summary">
		  <tr>
		     <td class='wst-summary-head' colspan='4'>店铺统计</td>
		  </tr>
		  <tr>
		     <td align='right'>商品总数：</td>
			 <td><?php echo $object['totalGoods']; ?><span style='margin-left:25px;'>（上架商品总数：<?php echo $object['saleGoods']; ?>）</span></td>
			 <td align='right'>订单总数：</td>
		     <td><?php echo $object['order']; ?></td>
		  </tr>
		  <tr>
		     <td align='right'>品牌总数：</td>
			 <td><?php echo $object['brands']; ?></td>
			 <td align='right'>评价总数：</td>
		     <td><?php echo $object['appraise']; ?></td>
		  </tr>
		</table>
		<table class="wst-form wst-summary">
		  <tr>
		     <td class='wst-summary-head' colspan='4'>系统信息</td>
		  </tr>
		  <tr>
			 <td width="25%" align='right'>软件版本号：</td>
			 <td width="25%">【开源版】<?php echo WSTConf("CONF.wstVersion"); ?></td>
			 <td width="25%" align='right'>授权类型：</td>
			 <td><div id='licenseStatus'></div></td>
		  </tr>
		  <tr>
		     <td align='right'>问题反馈：</td>
			 <td id='webUrl'><a href="http://bbs.shangtao.net" target='_blank'>点击反馈</a></td>
			 <td align='right'>授权码：</td>
		     <td><?php echo WSTConf("CONF.shopLicense"); ?></td>
		  </tr>
		  <tr>
		     <td align='right'>服务器操作系统：</td>
			 <td><?php echo PHP_OS; ?></td>
			 <td align='right'>WEB服务器：</td>
		     <td ><?php echo \think\Request::instance()->server('SERVER_SOFTWARE'); ?></td>
		  </tr>
		  <tr>
		     <td align='right'>PHP版本：</td>
		     <td ><?php echo PHP_VERSION; ?></td>
			 <td align='right'>MYSQL版本：</td>
		     <td ><?php echo $object['MySQL_Version']; ?></td>
		  </tr>
		</table>
	</td>
	<td width='260' valign='top'>  
		<div class='wst-desc-head'>走进我们</div>
		<div class='wst-desc-body'>官网：<a href='http://www.wstshop.net' target='_blank'>http://www.wstshop.net</a></div>
		<div class='wst-desc-head' style='margin-top:20px;'>开发团队：</div>
		<div class='wst-desc-body'>广州商淘信息科技有限公司</div>
		<div class='wst-desc-head' style='margin-top:20px;'>我们的理念</div>
		<div class='wst-desc-body'>我们愿与更多中小企业一起努力，一起成功!</div>
		<div class='wst-desc-body'>We Success together!</div>
		<div class='wst-desc-head' style='margin-top:20px;'>使用交流</div>
		<div class='wst-desc-body'>交流社区：<a href='http://bbs.shangtao.net' target='_blank'>http://bbs.shangtao.net</a></div>
		<div class='wst-desc-body'>用户QQ群：590755485</div>
		<div class='wst-desc-head' style='margin-top:20px;'>商城定制</div>
		<div class='wst-desc-body'>电话：020-85289921</div>
		<div class='wst-desc-body'>QQ：153289970</div>  
	</td>
	</tr>
</table>


<script src="__ADMIN__/js/main.js?v=<?php echo $v; ?>" type="text/javascript"></script>
<script>
function enterLicense(){
	location.href='<?php echo Url("admin/index/enterLicense"); ?>';
}
</script>

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