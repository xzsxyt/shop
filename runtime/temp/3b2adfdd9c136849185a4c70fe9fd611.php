<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"C:\wamp64\www\project1/wstshop/admin\view\imports\list.html";i:1523179464;s:51:"C:\wamp64\www\project1/wstshop/admin\view\base.html";i:1523179462;}*/ ?>
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
	    <table class="table table-hover table-striped table-bordered wst-form">
         <tr>
           <td colspan='2' style='color:#707070;padding-left:25px;padding-top:5px;line-height: 30px'>
           • 请勿重复上传, 否则将造成重复商品数据<br/>
           • 请保证导入的数据在Excel的第一个工作表(Sheet)<br/>
           • 若Excel上某一行第一列为空则代表商品数据导入完毕<br/>
           • 若没有数据模板，请点击<a href='__STATIC__/template/goods.xls' style='color:blue;' target='_blank'>下载Excel模板</a></a><br/>
           • 推荐使用谷歌浏览器或者火狐浏览器Firefox以获得更佳体验
           </td>
         </tr>
         <?php if(WSTGrant('PLSP_01')): ?>
         <tr>
           <th align='right' width='90' style='color: #707070;font-weight: bold;'>商品数据：</th>
           <td>
            <div id="filePicker" style='margin-left:0px;'>导入商品数据</div>		 
           </td>
         </tr>
         <?php endif; ?>
      </table>
   <div style='clear:both'></div>
</div>


<script type='text/javascript' src='__STATIC__/plugins/webuploader/webuploader.js?v=<?php echo $v; ?>'></script>
<script>
var uploading = null;
$(function(){
	   var uploader = WST.upload({
 	  server:"<?php echo url('admin/imports/importGoods'); ?>",pick:'#filePicker',
 	  formData: {dir:'temp'},
 	  callback:function(f,file){
 		  layer.close(uploading);
 		  uploader.removeFile(file);
 		  var json = WST.toAdminJson(f);
 		  if(json.status==1){
 			  uploader.refresh();
 		      WST.msg('导入数据成功!已导入数据'+json.importNum+"条", {icon: 1});
 		  }else{
 			  WST.msg('导入数据失败,出错原因：'+json.msg, {icon: 2});
 		  }
	      },
	      progress:function(rate){
	    	  uploading = WST.msg('正在导入数据，请稍后...', {icon: 1});
	      }
   });
});
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