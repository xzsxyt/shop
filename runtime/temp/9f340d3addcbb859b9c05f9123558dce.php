<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:63:"C:\wamp64\www\project1/wstshop/admin\view\goods\list_store.html";i:1523179462;s:51:"C:\wamp64\www\project1/wstshop/admin\view\base.html";i:1523179462;}*/ ?>
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
所属分类：
<select id="cat_0" class='ipt pgoodsCats' level="0" onchange="WST.ITGoodsCats({id:'cat_0',val:this.value,isRequire:false,className:'pgoodsCats'});">
   <option value="">-请选择-</option>
   <?php $_result=WSTGoodsCats(0);if(is_array($_result) || $_result instanceof \think\Collection): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	<option value="<?php echo $vo['catId']; ?>"><?php echo $vo['catName']; ?></option>
	<?php endforeach; endif; else: echo "" ;endif; ?>
</select>
商品：<input type="text" name="goodsName"  placeholder='商品名称/商品编号' id="goodsName" class='j-ipt'/>
<button class="btn btn-blue" onclick='javascript:loadStoreGrid(0)'>查询</button>
<div style='clear:both'></div>
</div>
<div class="wst-toolbar">
<button class="btn " onclick="javascript:changeSale(1,'store')">上架</button>
<button class="btn btn-blue" onclick="javascript:changeGoodsStatus('isRecom','store')">推荐</button>
<button class="btn btn-blue" onclick="javascript:changeGoodsStatus('isNew','store')">新品</button>
<button class="btn btn-blue" onclick="javascript:changeGoodsStatus('isBest','store')">精品</button>
<button class="btn btn-blue" onclick="javascript:changeGoodsStatus('isHot','store')">热销</button>
<button class="btn btn-blue" onclick="javascript:benchDel('store')">删除</button>
<button class="btn btn-green" onclick="javascript:add('store')">新增</button>
</div>
<div id="maingrid"></div>
<script>
$(function(){initStoreGrid();})
var goodsLogo = "<?php echo WSTConf('CONF.goodsLogo'); ?>";
</script>


<script src="__ADMIN__/goods/goods.js?v=<?php echo $v; ?>" type="text/javascript"></script>

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