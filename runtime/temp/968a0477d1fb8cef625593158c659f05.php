<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:63:"C:\wamp64\www\project1/wstshop/admin\view\adpositions\edit.html";i:1523179464;s:51:"C:\wamp64\www\project1/wstshop/admin\view\base.html";i:1523179462;}*/ ?>
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
<form id="adPositionsForm">
<table class='wst-form wst-box-top'>
  <tr>
      <th width='150'>位置类型<font color='red'>*</font>：</th>
          <td>
            <select id="positionType" name="positionType" class='ipt' maxLength='20'>
              <option value="">-请选择-</option>
              <?php $_result=WSTDatas(5);if(is_array($_result) || $_result instanceof \think\Collection): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
              <option <?=($data['positionType']==$vo['dataVal'])?'selected':'';?> value="<?php echo $vo['dataVal']; ?>"><?php echo $vo['dataName']; ?></option>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
          </td>
       </tr>
       <tr>
          <th>位置名称<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="positionName" name="positionName" value='<?php echo $data['positionName']; ?>' class="ipt" />
          </td>
       </tr>
       <tr>
          <th>位置代码<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="positionCode" name="positionCode" value='<?php echo $data['positionCode']; ?>' class="ipt" />
          </td>
       </tr>
       <tr>
          <th>建议宽度<font color='red'>*</font>：</th>
          <td>
            <input type="text" id="positionWidth" name="positionWidth" value='<?php echo $data['positionWidth']; ?>' class="ipt" maxLength='4' />
          </td>
       </tr>
       <tr>
          <th>建议高度<font color='red'>*</font>：</th>
          <td>
            <input type='text' id='positionHeight' name="positionHeight" value='<?php echo $data['positionHeight']; ?>' class='ipt' maxLength='4'/>
          </td>
       </tr>
       <tr>
          <th>排序号<font color='red'> </font>：</th>
          <td>
            <input type='text' id='apSort' name="apSort" value='<?php echo $data['apSort']; ?>' class='ipt' maxLength='10'/>
          </td>
       </tr>
  
  <tr>
     <td colspan='2' align='center'>
       <input type="hidden" name="id" id="positionId" class="ipt" value="<?php echo $data['positionId']+0; ?>" />
       <input type="submit" value="提交" class='btn btn-blue' />
       <input type="button" onclick="javascript:history.go(-1)" class='btn' value="返回" />
     </td>
  </tr>
</table>
</form>
<script>
$(function(){editInit()});
</script>


<script type='text/javascript' src='__STATIC__/plugins/webuploader/webuploader.js?v=<?php echo $v; ?>'></script>
<script src="__ADMIN__/adpositions/adpositions.js?v=<?php echo $v; ?>" type="text/javascript"></script>

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