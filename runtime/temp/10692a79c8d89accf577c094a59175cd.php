<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:57:"C:\wamp64\www\project1/wstshop/admin\view\goods\edit.html";i:1523179462;s:51:"C:\wamp64\www\project1/wstshop/admin\view\base.html";i:1523179462;s:58:"C:\wamp64\www\project1/wstshop/admin\view\goods\edit0.html";i:1523179462;s:58:"C:\wamp64\www\project1/wstshop/admin\view\goods\edit1.html";i:1523179464;s:58:"C:\wamp64\www\project1/wstshop/admin\view\goods\edit2.html";i:1523179462;}*/ ?>
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

<link rel="stylesheet" type="text/css" href="__STATIC__/plugins/webuploader/webuploader.css?v=<?php echo $v; ?>" />
<link rel="stylesheet" type="text/css" href="__STATIC__/plugins/webuploader/batchupload.css?v=<?php echo $v; ?>" />
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

<style>
body{overflow-y: hidden}
label{margin-right:10px;}
#specsAttrBox .webuploader-container{width:80px;height:25px;line-height:25px;overflow:hidden;}
.wst-tab-3 .webuploader-pick{
	height:40px;border-radius:3px;line-height: 44px;overflow:hidden;
}
.queueList .webuploader-container{height:44px;overflow:hidden;width:100%;}
.statusBar .webuploader-container{height:44px;overflow:hidden;width:auto;}
</style>
<div class="l-loading" style="display: block" id="wst-loading"></div>
<form id='editform' autocomplete='off'>
<div id="wst-tabs" style="width:100%; height:100%;overflow: hidden; border: 1px solid #D3D3d3;" class="liger-tab">
   <div id="wst-tab-1" tabId="wst-tab-1"  title="商品信息" class='wst-tab'  style="height: 99%">
      
<input type='hidden' id='goodsId' class='j-ipt' value='<?php echo $object["goodsId"]; ?>'/>
<table class='wst-form'>
  <tr>
     <th width='150'>商品名称<font color='red'>*</font>：</th>
     <td width='300'>
        <input type='text' class='j-ipt' id='goodsName' value='<?php echo $object["goodsName"]; ?>' maxLength='100' data-rule='商品名称:required;'/>
     </td>
     <td rowspan='6'>
        <div id='goodsImgBox'>
        <img src='__ROOT__/<?php echo $object["goodsImg"]; ?>' id='preview' width='150' height='150'>
        </div>
        <div id='goodsImgPicker' style='padding-left:23px'>请上传商品图片</div><span id='uploadMsg'></span>
        <input type='hidden' id='goodsImg' class='j-ipt' data-target='#msg_goodsImg' value='<?php if($object["goodsId"]>0): ?><?php echo $object["goodsImg"]; endif; ?>' data-rule="商品图片: required;"/>
        <span class='msg-box' id='msg_goodsImg'></span>
     </td>
  </tr>
  <tr>
     <th>商品编号<font color='red'>*</font>：</th>
     <td><input type='text' class='j-ipt' id='goodsSn' value='<?php echo $object["goodsSn"]; ?>' maxLength='20' data-rule='商品编号:required;'/></td>
  </tr>
  <tr>
  <th width='150'>商品货号<font color='red'>*</font>：</th>
     <td width='300'>
        <input type='text' class='j-ipt' id='productNo' value='<?php echo $object["goodsSn"]; ?>' maxLength='20' data-rule='商品货号:required;'/>
     </td>
  </tr>
  <tr>
     <th>市场价格<font color='red'>*</font>：</th>
     <td><input type='text' class='j-ipt' id='marketPrice' value='<?php echo $object["marketPrice"]; ?>' maxLength='10' data-rule='市场价格:required;price' data-rule-price="[/^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$/, '价格必须大于0']" onblur="javascript:WST.limitDecimal(this,2)" onblur='WST.limitDecimal(this,2);'/></td>
  </tr>
  <tr>
     <th>店铺价格<font color='red'>*</font>：</th>
     <td><input type='text' class='j-ipt' id='shopPrice' value='<?php echo $object["shopPrice"]; ?>' maxLength='10' data-rule='店铺价格:required;price' data-rule-price="[/^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$/, '价格必须大于0']" onblur="javascript:WST.limitDecimal(this,2)" onblur='WST.limitDecimal(this,2);'/></td>
  </tr>
  <tr>
     <th>商品库存<font color='red'>*</font>：</th>
     <td><input type='text' class='j-ipt' id='goodsStock' value='<?php echo $object["goodsStock"]; ?>' maxLength='10' data-rule='商品库存:required;integer[+]'/></td>
  </tr>
  <tr>
     <th>预警库存<font color='red'>*</font>：</th>
     <td><input type='text' class='j-ipt' id='warnStock' value='<?php echo $object["warnStock"]; ?>' maxLength='10' data-rule='预警库存:required;integer[+]'/></td>
  </tr>
  <tr>
     <th>商品单位<font color='red'>*</font>：</th>
     <td colspan='2'><input type='text' class='j-ipt' id='goodsUnit' value='<?php echo $object["goodsUnit"]; ?>' maxLength='10' data-rule='商品单位:required;'/></td>
  </tr>
  <tr>
     <th>SEO关键字：</th>
     <td ><input type='text' class='j-ipt' id='goodsSeoKeywords' maxLength='100' value='<?php echo $object["goodsSeoKeywords"]; ?>'/></td>
  </tr>
  <tr>
     <th>商品促销信息：</th>
     <td colspan='2'><textarea class='j-ipt' id='goodsTips' maxLength='100' style='width:500px;height:50px'><?php echo $object["goodsTips"]; ?></textarea></td>
  </tr>
  <tr>
     <th>商品状态<font color='red'>*</font>：</th>
     <td colspan='2'>
      <div class="radio-box">
        <label><input type='radio' name='isSale' id="isSale-1" class='j-ipt wst-radio' value='1' <?php if($object['isSale']==1): ?>checked<?php endif; ?>/><label for="isSale-1" class="mt-1"></label>上架</label>
        <label><input type='radio' name='isSale' id="isSale-0" class='j-ipt wst-radio' value='0' <?php if($object['isSale']==0): ?>checked<?php endif; ?>/><label for="isSale-0" class="mt-1"></label>下架</label>
      </div>
     </td>
  </tr>
  <tr>
     <th>商品属性：</th>
     <td colspan='2'>
      <div class="checkbox-box">
        <label>
	        <input id="isRecom" name='isRecom' class="j-ipt wst-checkbox" <?php if($object['isRecom']==1): ?>checked<?php endif; ?> value="1" type="checkbox"/><label class="mt-1" for="isRecom"></label>推荐
	    </label>
	    <label>
	        <input id="isBest" name="isBest" class="j-ipt wst-checkbox" <?php if($object['isBest']==1): ?>checked<?php endif; ?> value="1" type="checkbox"/><label class="mt-1" for="isBest"></label>精品
	    </label>
	    <label>
	        <input id="isNew" name="isNew" class="j-ipt wst-checkbox" <?php if($object['isNew']==1): ?>checked<?php endif; ?> value="1" type="checkbox"/><label class="mt-1" for="isNew"></label>新品
	    </label>
	    <label>
	        <input id="isHot" name="isHot" class="j-ipt wst-checkbox" <?php if($object['isHot']==1): ?>checked<?php endif; ?> value="1" type="checkbox"/><label class="mt-1" for="isHot"></label>热销
	    </label>       
     </td>
   </div>
  </tr>
  <tr>
     <th>本店分类<font color='red'>*</font>：</th>
     <td colspan='2'>
         <select id="cat_0" class='ipt j-goodsCats' level="0" onchange="WST.ITGoodsCats({id:'cat_0',val:this.value,isRequire:true,className:'j-goodsCats',afterFunc:'lastGoodsCatCallback'});getBrands('brandId',this.value)">
	      	<option value="">-请选择-</option>
	      	<?php $_result=WSTGoodsCats(0);if(is_array($_result) || $_result instanceof \think\Collection): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	        <option value="<?php echo $vo['catId']; ?>"><?php echo $vo['catName']; ?></option>
	        <?php endforeach; endif; else: echo "" ;endif; ?>
	     </select>
     </td>
  </tr>
  <tr>
     <th>品牌：</th>
     <td colspan='2'>
         <select id="brandId" class='j-ipt'>
            <option value="0">-请选择-</option>
         </select>
     </td>
  </tr>
  <tr>
     <th>商品描述<font color='red'>*</font>：</th>
     <td colspan='2'>
         <textarea rows="2" cols="60" id='goodsDesc' class='j-ipt' name='goodsDesc' data-rule='商品描述:required;'><?php echo $object['goodsDesc']; ?></textarea>
     </td>
  </tr>
  <tr>
     <td colspan='3' align='center' style='text-align:center'>
        <button class="btn btn-blue" onclick='javascript:save()' type='button'>保存</button>
        <button type="reset" class="btn">重置</button>
     </td>
  </tr>
</table>
   </div>
   <div id="wst-tab-2" tabId="wst-tab-2" title="商品属性" class='wst-tab-2'  style="height: 99%;"> 
      <div id='specsAttrBox' style='padding:0 0 0 5px;'></div>
<div style='margin:0px auto;text-align:center;padding-top:10px'>
<button class="btn btn-blue" onclick='javascript:save()' type='button'>保存</button>
<button type="reset" class="btn">重置</button>
</div>
   </div>
   <div id="wst-tab-3" tabId="wst-tab-3" title="商品相册" class='wst-tab-3'  style="height: 99%"> 
      <style>
.wst-batchupload .placeholder .webuploader-pick {background: #43b97e;font-size:15px;}
.wst-batchupload p{font-size:13px;}
.wst-batchupload .statusBar .btns .webuploader-pick{font-size:13px;}
.wst-batchupload .statusBar .btns .uploadBtn {background: #43b97e none repeat scroll 0 0;font-size:13px;}
.wst-batchupload .statusBar .btns .uploadBtn:hover{background: #43b97e;}
.wst-batchupload-btn{margin:0px auto;text-align:center;border-top:1px solid #cccccc;padding-top:10px;}
</style>
<div id="batchUpload" class="wst-batchupload">
    <div class="queueList filled">
        <div id="dndArea" class="placeholder <?php if(!empty($object['gallery'])): ?>element-invisible<?php endif; ?>">
            <div id="filePicker"></div>
            <p>或将照片拖到这里，单次最多可选50张，每张最大不超过5M</p>
        </div>
        <ul class="filelist" >
            <?php if(is_array($object['gallery']) || $object['gallery'] instanceof \think\Collection): $i = 0; $__LIST__ = $object['gallery'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		    <li  class="state-complete" style="border: 1px solid rgb(59, 114, 165);">
		       <p class="title"></p>
		       <p class="imgWrap">
		          <img src="__ROOT__/<?php echo $vo; ?>">
		       </p>
		       <input type="hidden" v="<?php echo $vo; ?>" iv="<?php echo $vo; ?>" class="j-gallery-img">
		       <span class="btn-del">删除</span>
		    </li>
		    <?php endforeach; endif; else: echo "" ;endif; ?>
	    </ul>
    </div>
    <div class="statusBar" <?php if(empty($object['gallery'])): ?>style="display: none;"<?php endif; ?>>
        <div class="progress" style="display: none;">
            <span class="text">0%</span>
            <span class="percentage" style="width: 0%;"></span>
        </div>
        <div class="info"></div>
        <div class="btns">
            <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
        </div>
    </div>
</div>
<div class='wst-batchupload-btn'>
<button class="btn btn-blue" onclick='javascript:save()' type='button'>保存</button>
<button type="reset" class="btn">重置</button>
</div>

   </div>
</div>
</form>


<script type='text/javascript' src='__STATIC__/plugins/webuploader/webuploader.js?v=<?php echo $v; ?>'></script>
<script src="__STATIC__/plugins/kindeditor/kindeditor.js?v=<?php echo $v; ?>" type="text/javascript" ></script>
<script type="text/javascript" src="__STATIC__/plugins/validator/jquery.validator.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" src="__STATIC__/plugins/validator/local/zh-CN.js?v=<?php echo $v; ?>"></script>
<script type='text/javascript' src='__STATIC__/plugins/webuploader/batchupload.js?v=<?php echo $v; ?>'></script>
<script type='text/javascript' src='__ADMIN__/goods/goods.js?v=<?php echo $v; ?>'></script>
<script>
var initBatchUpload = false,editor1 = null,specNum = 0,src='<?php echo $src; ?>';
<?php unset($object['goodsDesc']); ?>
var OBJ = <?=json_encode($object)?>;
$(function(){initEdit()});
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