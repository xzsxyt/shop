<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:64:"C:\wamp64\www\project1/wstshop/home\view\default\settlement.html";i:1523179472;s:58:"C:\wamp64\www\project1/wstshop/home\view\default\base.html";i:1523179472;s:60:"C:\wamp64\www\project1/wstshop/home\view\default\header.html";i:1523179466;s:64:"C:\wamp64\www\project1/wstshop/home\view\default\header_top.html";i:1523179466;s:60:"C:\wamp64\www\project1/wstshop/home\view\default\footer.html";i:1523179472;}*/ ?>
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>我的购物车 - <?php echo WSTConf('CONF.mallName'); ?><?php echo WSTConf('CONF.seoShopTitle'); ?></title>
<meta name="auther" content="WSTShop,www.wstshop.net" />
<meta name="copyright" content="Copyright©2016-2066 Powered By WSTShop" />



<link href="__STYLE__/css/common.css?v=<?php echo $v; ?>" rel="stylesheet">

<link href="__STYLE__/css/carts.css?v=<?php echo $v; ?>" rel="stylesheet">

<script type="text/javascript" src="__STATIC__/js/jquery.min.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" src="__STATIC__/plugins/layer/layer.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" src="__STATIC__/plugins/lazyload/jquery.lazyload.min.js?v=<?php echo $v; ?>"></script>
<script type='text/javascript' src='__STATIC__/js/common.js?v=<?php echo $v; ?>'></script>

<script type='text/javascript' src='__STYLE__/js/common.js?v=<?php echo $v; ?>'></script>


<?php if(((int)session('WST_USER.userId')<=0)): ?>
<link href="__STATIC__/plugins/validator/jquery.validator.css?v=<?php echo $v; ?>" rel="stylesheet">
<link href="__STYLE__/css/login.css?v=<?php echo $v; ?>" rel="stylesheet">
<script type="text/javascript" src="__STATIC__/plugins/validator/jquery.validator.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" src="__STATIC__/plugins/validator/local/zh-CN.js?v=<?php echo $v; ?>"></script>
<script type='text/javascript' src='__STYLE__/js/login.js?v=<?php echo $v; ?>'></script>
<?php endif; ?>



<script>
window.conf = {
		"ROOT"      : "__ROOT__", 
		"APP"       : "__APP__", 
		"STATIC"    : "__STATIC__", 
		"SUFFIX"    : "<?php echo config('url_html_suffix'); ?>", 
		"SMS_VERFY" : "<?php echo WSTConf('CONF.smsVerfy'); ?>",
    	"SMS_OPEN"  : "<?php echo WSTConf('CONF.smsOpen'); ?>",
    	"GOODS_LOGO": "<?php echo WSTConf('CONF.goodsLogo'); ?>",
    	"SHOP_LOGO" : "<?php echo WSTConf('CONF.shopLogo'); ?>",
    	"USER_LOGO" : "<?php echo WSTConf('CONF.userLogo'); ?>",
    	"IS_LOGIN"  : "<?php if((int)session('WST_USER.userId')>0): ?>1<?php else: ?>0<?php endif; ?>",
    	"TIME_TASK" : "1"
	}
$(function() {
	WST.initVisitor();
});
</script>
</head>
<body>

	<div class="wst-header">
    <div class="wst-nav">
		<ul class="headlf" style='float:left;width:500px;'>
		<?php if(session('WST_USER.userId') >0): ?>
		    <li class="drop-info">
			  <div class="drop-infos">
			  <a href="<?php echo Url('home/users/index'); ?>">欢迎您，<?php echo session('WST_USER.userName')?session('WST_USER.userName'):session('WST_USER.loginName'); ?></a>
			  </div>
			  <div class="wst-tag dorpdown-user">
			  	<div class="wst-tagt">
			  	    <div class="userImg" >
				  	<img class='usersImg' data-original="__ROOT__/<?php echo session('WST_USER.userPhoto'); ?>"/>
				    </div>	
				  <div class="wst-tagt-n">
				    <div>
					  	<span class="wst-tagt-na"><?php echo session('WST_USER.userName')?session('WST_USER.userName'):session('WST_USER.loginName'); ?></span>
					  	<?php if((int)session('WST_USER.rankId') > 0): ?>
					  		<img src="__ROOT__/<?php echo session('WST_USER.userrankImg'); ?>" title="{:<?php echo session('WST_USER.rankName'); ?>"/>
					  	<?php endif; ?>
				  	</div>
				  	<div class='wst-tags'>
			  	     <span class="w-lfloat"><a onclick='WST.position(15,0)' href='<?php echo Url("home/users/edit"); ?>'>用户资料</a></span>
			  	     <span class="w-lfloat" style="margin-left:10px;"><a onclick='WST.position(16,0)' href='<?php echo Url("home/users/security"); ?>'>安全设置</a></span>
			  	    </div>
				  </div>
			  	  <div class="wst-tagb" style='display:none'>
			  		<a>待处理订单</a>
			  		<a>我的余额</a>
			  		<a>我的消息</a>
			  		<a>我的积分</a>
			  		<a>我的关注</a>
			  		<a>咨询回复</a>
			  	  </div>
			  	<div class="wst-clear"></div>
			  	</div>
			  </div>
			</li>
			<li class="spacer">|</li>
			<li class="drop-info">
			<a href='<?php echo Url("home/messages/index"); ?>' target='_blank' onclick='WST.position(49,0)'>消息（<span id='wst-user-messages'>0</span>）</a>
			</li>
			<li class="spacer">|</li>
			<li class="drop-info">
			  <div><a href="javascript:WST.logout();">退出</a></div>
			</li>
		<?php else: ?>
			<li class="drop-info">
				  您好,<a href="<?php echo Url('home/users/login'); ?>" style="color:#00adff;">请登录</a>
		    </li>

			<li class="spacer">|</li>
			<li class="drop-info">
				  <div><a href="<?php echo Url('home/users/regist'); ?>">免费注册</a></div>
			</li>
		<?php endif; ?>
		</ul>
		<ul class="headrf" style='float:right;'>
		    <li class="j-dorpdown">
				<div class="drop-down" style="padding-left:0px;">
					<a href="<?php echo Url('home/users/index'); ?>" target="_blank">我的订单<i class="di-right"><s>◇</s></i></a>
				</div>
				<div class='j-dorpdown-layer order-list'>
				   <div><a href='<?php echo Url("home/orders/waitPay"); ?>' onclick='WST.position(3,0)'>待付款订单</a></div>
				   <div><a href='<?php echo Url("home/orders/waitReceive"); ?>' onclick='WST.position(5,0)'>待发货订单</a></div>
				   <div><a href='<?php echo Url("home/orders/waitAppraise"); ?>' onclick='WST.position(6,0)'>待评价订单</a></div>
				</div>
			</li>	
			<li class="spacer">|</li>
			<li class="j-dorpdown">
				<div class="drop-down drop-down4 pdr5"><a href="<?php echo Url('home/favorites/goods'); ?>" target="_blank">我的关注</a></div>
				<div class='j-dorpdown-layer foucs-list'>
				   <div><a href="<?php echo Url('home/favorites/goods'); ?>" onclick='WST.position(41,0)'>商品收藏</a></div>
				</div>
			</li>
			<li class="spacer">|</li>
			<li class="j-dorpdown">
				<div class="drop-down drop-down5 pdr5" ><a href="javascript:void(0);" target="_blank">客户服务</a></div>
				<div class='j-dorpdown-layer des-list'>
				   <div><a href='<?php echo Url("home/helpcenter/view","id=1"); ?>' target='_blank'>帮助中心</a></div>
				   <div><a href='<?php echo Url("home/helpcenter/view","id=8"); ?>' target='_blank'>售后服务</a></div>
				   <div><a href='<?php echo Url("home/helpcenter/view","id=3"); ?>' target='_blank'>常见问题</a></div>
				</div>
			</li>
		</ul>
		<div class="wst-clear"></div>
  </div>
</div>
<script>
$(function(){
	//二维码
	//参数1表示图像大小，取值范围1-10；参数2表示质量，取值范围'L','M','Q','H'
	var a = qrcode(8, 'M');
	var url = window.location.host+window.conf.APP;
	a.addData(url);
	a.make();
	$('#qrcodea').html(a.createImgTag());
});
</script>
<script type='text/javascript' src='__STYLE__/js/qrcode.js?v=<?php echo $v; ?>'></script>
<div class='wst-search-container'>
   <div class='wst-logo'>
   <a href='<?php echo \think\Request::instance()->root(true); ?>' title="<?php echo WSTConf('CONF.shopName'); ?>" >
      <img src="__ROOT__/<?php echo WSTConf('CONF.shopLogo'); ?>" height="120" width='240' title="<?php echo WSTConf('CONF.shopName'); ?>" alt="<?php echo WSTConf('CONF.shopName'); ?>">
   </a>
   </div>
   <div class="wst-search-box">
      <div class='wst-search'>
	      <input type="text" id='search-ipt' class='search-ipt' placeholder='<?php echo WSTConf("CONF.adsWordsSearch"); ?>' value='<?php echo isset($keyword)?$keyword:""; ?>'/>
	      <input type='hidden' id='adsWordsSearch' value='<?php echo WSTConf("CONF.adsWordsSearch"); ?>'>
	      <div id='search-btn' class="search-btn" onclick='javascript:WST.search(this.value)'> </div>
      </div>
      <div class="wst-search-keys">
      <?php $searchKeys = WSTSearchKeys(); if(is_array($searchKeys) || $searchKeys instanceof \think\Collection): $i = 0; $__LIST__ = $searchKeys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
       <a href='<?php echo Url("home/goods/search","keyword=".$vo); ?>'><?php echo $vo; ?></a>
       <?php if($i< count($searchKeys)): ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </div>
   </div>
   <div class="wst-contact-box">
      <div class="contact-boxl">
          <p class="contact-icon">热线电话：</p>
            <?php if((WSTConf('CONF.serviceTel')!='')): ?>
              <p class="contact-num"><?php echo WSTConf('CONF.serviceTel'); ?></p>
            <?php endif; ?>
      </div>
      <div class="contact-boxr">
        <img src="__STYLE__/img/wst_qr_code.jpg" style="height:100px;">
      </div>
      
   </div>
   <div style='clear:both;'></div>
</div>

<div class="wst-clear"></div>

<div class="wst-nav-menus">
   <div class="nav-w" style="position: relative;">
      <div class="w-spacer"></div>
      <div class="dorpdown <?php if(isset($hideCategory)): ?>j-index<?php endif; ?>" id="wst-categorys">
         <div class="dt j-cate-dt">
             <a href="<?php echo Url('home/goods/lists'); ?>" target="_blank">全部商品分类</a>
         </div>
         <div class="dd j-cate-dd" <?php if(!isset($hideCategory)): ?>style="display:none" <?php endif; ?>>
            <div class="dd-inner">
                 <?php $_result=WSTSideCategorys();if(is_array($_result) || $_result instanceof \think\Collection): $k = 0;$__LIST__ = is_array($_result) ? array_slice($_result,0,7, true) : $_result->slice(0,7, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                 <div id="cat-icon-<?php echo $k; ?>" class="item fore1 <?php if(($key>=12)): ?>over-cat<?php endif; ?>">
                     <h3>
                      <div class="<?php if(($key>=12)): ?> over-cat-icon <?php else: ?> cat-icon-<?php echo $k; endif; ?>"></div>
                      <a href="<?php echo Url('home/goods/lists','cat='.$vo['catId']); ?>" target="_blank"><?php echo $vo['catName']; ?></a>
                     </h3>

                     <?php if(isset($vo['list'])){ ?>
                     <div class="second-cat">
                      <?php if(is_array($vo['list']) || $vo['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                        <a href="<?php echo Url('home/goods/lists','cat='.$vo2['catId']); ?>"><?php echo $vo2['catName']; ?>、</a>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
                     </div>
                     <?php } ?>
                 </div>
                 <?php endforeach; endif; else: echo "" ;endif; ?>
             </div>
             <div style="display: none;" class="dorpdown-layer" id="index_menus_sub">
                 <?php $_result=WSTSideCategorys();if(is_array($_result) || $_result instanceof \think\Collection): $k = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                  <div class="item-sub" i="<?php echo $k; ?>">

                       <div class="subitems">
                          <?php if(isset($vo['list'])){ if(is_array($vo['list']) || $vo['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                           <dl class="fore2">
                               <dt >
                                  <a target="_blank" href="<?php echo Url('home/goods/lists','cat='.$vo2['catId']); ?>"><?php echo $vo2['catName']; ?></a>
                               </dt>
                               <dd>
                                  <?php if(isset($vo2['list'])){ if(is_array($vo2['list']) || $vo2['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo2['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?>
                                  <a target="_blank" href="<?php echo Url('home/goods/lists','cat='.$vo3['catId']); ?>"><?php echo $vo3['catName']; ?></a>
                                  <?php endforeach; endif; else: echo "" ;endif; } ?>
                               </dd>
                            </dl>
                           <?php endforeach; endif; else: echo "" ;endif; } ?>
                        </div>
                  </div>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
             </div>
        </div>
      </div>
      
      <div id="wst-nav-items">
           <ul>
               <?php $_result=WSTNavigations(0);if(is_array($_result) || $_result instanceof \think\Collection): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
               <li class="fore1">
                    <a href="<?php echo $vo['navUrl']; ?>" <?php if($vo['isOpen']==1): ?>target="_blank"<?php endif; ?>><?php echo $vo['navTitle']; ?></a>
               </li>
               <?php endforeach; endif; else: echo "" ;endif; ?>
           </ul>
           <a class="wst-cart" href="<?php echo url('home/carts/index'); ?>" ondragstart="return false;">
                 <em>购物车</em>
                 <p class="wst-cartNum j-word" id="goodsTotalNum">0</p>
                  <div class="wst-cart-boxs hide">
                    <div id="list-carts"></div>
                    <div id="list-carts2"></div>
                    <div id="list-carts3"></div>
                    <div class="wst-clear"></div>
                  </div>
              
              <script id="list-cart" type="text/html">
              {{# for(var i = 0; i < d.list.length; i++){ }}
                <div class="goods" id="j-goods{{ d.list[i].cartId }}">
                    <div class="imgs"><a href="__ROOT__/home/goods/detail/id/{{d.list[i].goodsId }}"><img class="goodsImgc" data-original="__ROOT__/{{ d.list[i].goodsImg }}" title="{{ d.list[i].goodsName }}"></a></div>
                    <div class="number"><p><a  href="__ROOT__/home/goods/detail/id/{{d.list[i].goodsId }}">{{WST.cutStr(d.list[i].goodsName,26)}}</a></p><p>数量：{{ d.list[i].cartNum }}</p></div>
                    <div class="price"><p>￥{{ d.list[i].shopPrice }}</p><span><a href="javascript:WST.delCheckCart({{ d.list[i].cartId }})">删除</a></span></div>
                </div>
              {{# } }}
              </script>
           </a>
           <div class="wst-clear"></div>
      </div>

      <span class="wst-clear">
        
      </span>
       
    </div>
</div>
<div class="wst-clear"></div>



<div class="wst-container">
  <div class="wst-cart-head">
    <span class="pagel"><a href='<?php echo \think\Request::instance()->root(true); ?>'>&nbsp;首页</a></span> <span class="arrow">></span> <span class="pager">购物车</span>
  </div>
	<div id="stepflex" class="stepflex">
       <dl class="first doing">
          <dt class="s-num">1</dt>
          <dd class="s-text">我的购物车</dd>
          <dd></dd>
       </dl>
       <dl class="normal doing">
          <dt class="s-num">2</dt>
          <dd class="s-text">填写核对订单信息</dd>
       </dl>
       <dl class="last">
          <dt class="s-num1">3</dt>
          <dd class="s-text1">成功提交订单</dd>
       </dl>
    </div>
    <div class='wst-clear'></div>
    <div class='main-head'>填写并核对订单</div>
    <input type='hidden' class='j-ipt' id='s_addressId' value='<?php if(isset($userAddress["addressId"])): ?><?php echo $userAddress["addressId"]; endif; ?>'/>
    <input type='hidden' class='j-ipt' id='s_areaId' value='<?php if(isset($userAddress["addressId"])): ?><?php echo $userAddress["areaId2"]; endif; ?>'/>
    <!-- 用户地址 -->
    <div class='address-box'>
       <div class='box-head'>收货人信息 <a class="add-addr" href="javascript:;" onclick="javascript:emptyAddress(this,1)">新增收货地址</a></div>
       <!-- 选中地址 -->
       <div class='j-show-box <?php if(empty($userAddress)): ?>hide<?php endif; ?>' >
          <div id="s_userName" class="wst-frame1 j-selected">

            <?php if(isset($userAddress["addressId"])): ?>
              <p><?php echo $userAddress['userName']; ?>(<?php echo $userAddress['userPhone']; ?>)</p>
              <p><?php echo $userAddress['areaName']; ?>&nbsp;&nbsp;<?php echo $userAddress['userAddress']; ?></p>
              <div class="operate-box" >
              <a href="javascript:void(0)" onclick="javascript:toEditAddress(<?php if(isset($userAddress["addressId"])): ?><?php echo $userAddress["addressId"]; endif; ?>,this,1,1,1)">修改</a>
              </div>
            <?php endif; ?>

            <i></i></div>
                    
          <div class='wst-clear'></div>

          <div class="address">
            <a class="wst-lfloat" href='javascript:void(0)' onclick='javascript:showEditAddressBox()' style=''>更多地址</a>
          </div>

       </div>
       <!-- 地址列表  -->
       <ul class='j-list-box hide' id='addressList'></ul>

       <div class="wst-clear"></div>

       <!-- 新增编辑地址 -->
       <div class='j-edit-box <?php if(!empty($userAddress)): ?>hide<?php endif; ?>'>
          <form id='addressForm' autocomplete='off'>
            <input type='hidden' class='j-eipt' id='addressId' value=''/>
            <div class='rows'>
                <div class='label'>收货人<font color='red'>*</font>：</div>
                <div class='field'><input type='text' class='j-eipt' id='userName' maxLength='25'/></div>
                <div class='wst-clear'></div>
            </div>
            <div class='rows'>
                <div class='label'>收货地址<font color='red'>*</font>：</div>
                <div class='field'>
                <select id="area_0" class='j-areas' level="0" onchange="WST.ITAreas({id:'area_0',val:this.value,isRequire:true,className:'j-areas'});">
			      	<option value="">-请选择-</option>
			      	<?php if(is_array($areaList) || $areaList instanceof \think\Collection): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			        <option value="<?php echo $vo['areaId']; ?>"><?php echo $vo['areaName']; ?></option>
			        <?php endforeach; endif; else: echo "" ;endif; ?>
			    </select>
                <input type='text' class='j-eipt' id='userAddress' style='width:300px' maxLength='200'/>
                </div>
                <div class='wst-clear'></div>
            </div>
            <div class='rows'>
                <div class='label'>联系电话<font color='red'>*</font>：</div>
                <div class='field'><input type='text' id='userPhone' class='j-eipt' name="addrUserPhone" maxLength='50' onkeypress="return WST.isNumberKey(event);" onkeyup="javascript:WST.isChinese(this,1)"/>  </div>
                <div class='wst-clear'></div>
            </div>
            <div class='rows'>
                <div class='label'>是否默认地址<font color='red'>*</font>：</div>
                <div class='radio-box'>
	                <label style='margin-right:36px;'>
	                   <input type='radio' name='isDefault' value='1' checked class='j-eipt wst-radio' id="isDefault1"/><label class="mt-1" for="isDefault1"></label>是
	                </label>
	                <label>
	                   <input type='radio' name='isDefault' value='0' class='j-eipt wst-radio' id="isDefault2"/><label class="mt-1" for="isDefault2"></label>否
	                </label>
                </div>
                <div class='wst-clear'></div>
            </div>
            <div class='rows'>
                <a href='javascript:void(0)' class='wst-cart-reda' id='saveAddressBtn' onclick='javascript:editAddress()' style='width:105px;line-height:33px;padding:6px 15px'>保存收货人地址</a>
            </div>
          </form>
       </div>
    </div>
    <!-- 支付方式 -->
    <div class='pay-box'>
       <div class='box-head'>支付方式</div>
       <div class="wst-list-box">
          <?php if(!empty($payments['0'])): ?> 
          <div class="wst-frame2 j-selected" onclick="javascript:changeSelected(0,'payType',this)">货到付款<i></i></div>
          <?php endif; if(!empty($payments['1'])): ?>  
          <div class="wst-frame2" onclick="javascript:changeSelected(1,'payType',this)">在线支付<i></i></div>
          <?php endif; ?>
          <input type='hidden' value='0' id='payType' class='j-ipt' />
          <div class='wst-clear'></div>
       </div>
    </div>
    <!-- 送货方式 -->
    <div class='pay-boxs pay-box'>
       <div class='box-head'>送货方式</div>
       <div class="wst-list-box">
         <div class="wst-frame2 j-selected" onclick="javascript:changeDeliverType(0,'deliverType',this)">快递运输<i></i></div>
         <div class="wst-frame2" onclick="javascript:changeDeliverType(1,'deliverType',this)">自提<i></i></div>
          <input type='hidden' value='0' id='deliverType' class='j-ipt' />
          <div class='wst-clear'></div>
       </div>
    </div>
    <!-- 发票信息 -->
    <div class="pay-boxs pay-box">
       <div class='box-head'>发票信息</div>
       <div class="j-show-box">
       <div class="wst-frame2 j-selected" onclick='javascript:WST.showhide(0,"#invoiceClientDiv",this)'>不需要开发票<i></i></div>
       <div class="wst-frame2" onclick='javascript:WST.showhide(1,"#invoiceClientDiv",this)'>需要开发票<i></i></div><br/><br/><br/>
       <input type='hidden' value='0' id='isInvoice' class='j-ipt' />
            <div id='invoiceClientDiv' class='hide'>
              发票抬头： <input type='text' class='j-ipt' id='invoiceClient' style='width:400px;padding:2px' placeholder='发票抬头信息'/>
            </div>
     </div>
       <div class='wst-clear'></div>
     </div>
    <!-- 商品清单 -->
    <div class='cart-box2'>
       <div class='box-head2'>商品清单</div>
       <div class='cart-head2'>
          <div class='goods2'>商品</div>
          <div class='price2'>单价</div>
          <div class='num2'>数量</div>
          <div class='t-price2'>总价</div>
       </div>
       
       <?php $shopFreight = 0; 
       if(!empty($userAddress)){
           $freight = WSTOrderFreight($userAddress['areaId2']);
           $shopFreight = $shopFreight + $freight;
       }else{
           $freight = WSTOrderFreight($vo['areaId']);
           $shopFreight = $shopFreight + $freight;
       }
        ?>
       <div class='cart-item'>
          <div class='goods-list'>
             <?php if(is_array($carts["carts"]) || $carts["carts"] instanceof \think\Collection): $i = 0; $__LIST__ = $carts["carts"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
             <div class='item selected'>
		        <div class='goods2'>
		            <div class='img2'>
		                <a href='<?php echo Url("home/goods/detail","id=".$vo2["goodsId"]); ?>' target='_blank'>
			            <img src='__ROOT__/<?php echo $vo2["goodsImg"]; ?>' width='80' height='80' title='<?php echo $vo2["goodsName"]; ?>'/>
			            </a>
		            </div>
		            <div class='name2'><?php echo $vo2["goodsName"]; ?></div>
		            <div class='spec2'>
		            <?php if(is_array($vo2["specNames"]) || $vo2["specNames"] instanceof \think\Collection): $i = 0; $__LIST__ = $vo2["specNames"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$specs): $mod = ($i % 2 );++$i;?>
		            <div><?php echo $specs['catName']; ?>：<?php echo $specs['itemName']; ?></div>
		            <?php endforeach; endif; else: echo "" ;endif; ?>
		            </div>
		        </div>
		        <div class='price2'>¥<?php echo $vo2['shopPrice']; ?></div>
		        <div class='num2'><?php echo $vo2['cartNum']; ?></div>
		        <div class='t-price2'>¥<?php echo $vo2['shopPrice']*$vo2['cartNum']; ?></div>
		        <div class='wst-clear'></div>
             </div>
             <?php endforeach; endif; else: echo "" ;endif; ?>
             <div class='shop-remark selected2'>
              订单备注：<input type='text' id="remark" class='j-ipt' style='width:700px;' maxLength='100' placeholder='给卖家留言'/>

             <div style="float: right;margin-top:-10px;">
             <p style="text-align:right;padding-right:13px;">
              <span style="text-align: right;line-height: 30px;">运费：<span id="freight" style='font-weight: bold;color: #E55356;'>￥<?php echo $freight; ?></span></span>
            </p>
             <span style='text-align:right;line-height:30px;padding-right:13px;'>合计(含运费)：<span id="countMoney" v='<?php echo $carts['goodsTotalMoney']; ?>' style='font-weight: bold;color: #E55356;'>￥<?php echo $freight+$carts['goodsTotalMoney']; ?></span></span>
             </div>

           </div>
          </div>
       </div>

    <div class='cart-footer'>
    <div class='cart-summary2'>
    <div class="summarys2">
    
    </div>
          	<div class="summarys3" style='text-align:right;padding-top:50px'>
             <div>运费总计：¥<span id='deliverMoney'><?php echo $shopFreight; ?></span></div>
             <div class='summary2'>应付总金额(含运费)：¥<span id='totalMoney' v='<?php echo $carts["goodsTotalMoney"]; ?>'>
             <?php if(empty($userAddress)): ?>
             <?php echo $carts["goodsTotalMoney"]; else: ?>
             <?php echo $carts["goodsTotalMoney"]+$shopFreight; endif; ?>
             </span></div>
             <div <?php if(WSTConf('CONF.isOrderScore')!=1): ?>style='display:none'<?php endif; ?>>可获得积分：<span id='orderScore'><?php echo round($carts["goodsTotalMoney"],0); ?></span>个</div>
             </div>
             <div class='wst-clear'></div>
          </div>         
       </div>
    </div>
     <div class='cart-btn'>
        <a href='<?php echo Url("home/carts/index"); ?>' class='wst-prev wst-cart-asha' style='width:105px;height:33px;line-height:33px;'>上一步</a>
        <a href='javascript:void(0)' onclick='javascript:submitOrder()' class='wst-order wst-cart-reda' style='width:118px;height:33px;line-height:33px;'>提交订单</a>
        <div class='wst-clear'></div>
     </div>
</div>


	<div style="border-top: 1px solid #dedede;padding-bottom:25px;margin-top:35px;min-width:1200px;"></div>
<div class="wst-footer-flink">
	<div class="wst-footer" >


	</div>
</div>
<ul class="wst-footer-info">
	<li><div class="wst-footer-info-img"><img src="__STYLE__/img/icon_play.png"></div>
		<div class="wst-footer-info-text">
			<h1>支付宝支付</h1>
			<p>支付宝签约商家</p>
		</div>
	</li>
	<li><div class="wst-footer-info-img"><img src="__STYLE__/img/icon_zhengpin.png"></div>
		<div class="wst-footer-info-text">
			<h1>正品保证</h1>
			<p>100%原产地</p>
		</div>
	</li>
	<li><div class="wst-footer-info-img"><img src="__STYLE__/img/icon_thwy.png"></div>
		<div class="wst-footer-info-text">
			<h1>退货无忧</h1>
			<p>前天退货保障</p>
		</div>
	</li>
	<li><div class="wst-footer-info-img"><img src="__STYLE__/img/icon_mfps.png"></div>
		<div class="wst-footer-info-text">
			<h1>免费配送</h1>
			<p>满98元包邮</p>
		</div>
	</li>
	<li><div class="wst-footer-info-img"><img src="__STYLE__/img/icon_hdfk.png"></div>
		<div class="wst-footer-info-text">
			<h1>货到付款</h1>
			<p>400城市送货上门</p>
		</div>
	</li>
</ul>
<div class="wst-footer-help">
	<div class="wst-footer" style="padding-top:30px;">
		<div class="wst-footer-hp-ck1">
			<?php $_result=WSTHelps(5,6);if(is_array($_result) || $_result instanceof \think\Collection): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
			<div class="wst-footer-wz-ca">
				<div class="wst-footer-wz-pt">
					<span class="wst-footer-wz-pn footer-icon<?php echo $key; ?>"><?php echo $vo1["catName"]; ?></span>
					<div style='margin-left:30px;'>
						<?php if(is_array($vo1['articlecats']) || $vo1['articlecats'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo1['articlecats'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
						<a href="<?php echo Url('Home/Helpcenter/view',array('id'=>$vo2['articleId'])); ?>"><?php echo WSTMSubstr($vo2['articleTitle'],0,8); ?></a><br/>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
			</div>
			<?php endforeach; endif; else: echo "" ;endif; ?>

			<div class="wst-contact">
				<ul>
					<li style="height:30px;">
						<div class="icon-phone"></div><p class="call-wst">服务热线：</p>
					</li>
					<li style="height:38px;">
						<?php if((WSTConf('CONF.serviceTel')!='')): ?><p class="email-wst"><?php echo WSTConf('CONF.serviceTel'); ?></p><?php endif; ?>
					</li>
					<li style="height:85px;padding-left:10px;">
						<div class="qr-code" style="position:relative;">
							<img src="__STYLE__/img/wst_qr_code.jpg" style="height:110px;">
							<div class="focus-wst">
							   
							</div>
						</div>
					</li>
				</ul>
			</div>



			<div class="wst-clear"></div>
			<div class="wst-footer-cld-box">
				<div class="wst-footer-fl" style="text-align: left;padding:10px;float:left">
					<p style="border-left:4px solid #2a95de;padding-left:8px;line-height:16px;height:16px;">友情链接</p>
				</div>

				<div class="friLink">
					<?php $str=''; $wstTagFriendlink =  model("Tags")->listFriendlink(99,86400); foreach($wstTagFriendlink as $key=>$vo){
					$c = count($wstTagFriendlink)-1;
					$str .='<div style="float:left;"><a href="'.$vo['friendlinkUrl'].'"  style="color:#887878;" target="_blank">'.$vo["friendlinkName"].'</a>';
					if($key!=$c)
						$str .='&nbsp;&nbsp;|&nbsp;&nbsp;';
					$str .='</div>';
					 } ?>
					<?php echo $str; ?>
					<div class="wst-clear"></div>
				</div>
				<div class="wst-clear"></div>
			</div>
		</div>
	</div>

	<div class="wst-footer-hp-ck3" style="margin:0 auto;text-align:center;background: #2a95de;margin-top:10px;color:#fff;padding:30px;">
	        <div class="links">
	           <?php $navs = WSTNavigations(1); if(is_array($navs) || $navs instanceof \think\Collection): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
               <a href="<?php echo $vo['navUrl']; ?>" <?php if($vo['isOpen']==1): ?>target="_blank"<?php endif; ?>><?php echo $vo['navTitle']; ?></a>
               <?php if($i< count($navs)): ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
	        </div>
	        <div class="copyright">
	        <?php 
	        	if(WSTConf('CONF.shopFooter')!=''){
	         		echo htmlspecialchars_decode(WSTConf('CONF.shopFooter'));
	        	}
	         
				if(WSTConf('CONF.visitStatistics')!=''){
					echo htmlspecialchars_decode(WSTConf('CONF.visitStatistics'))."<br/>";
			    }
			 if(WSTConf('CONF.shopLicense') == ''): ?>
	        <div>
				Copyright©2016 Powered By <a target="_blank" href="http://www.wstshop.net">WSTShop</a>
			</div>
			<?php else: ?>
				<div id="wst-shopLicense" data='1' style="display:none;">Copyright©2016 Powered By <a target="_blank" href="http://www.wstshop.net">WSTShop</a></div>
	        <?php endif; ?>
	        </div>
	    </div>
</div>



<script type='text/javascript' src='__STYLE__/js/carts.js?v=<?php echo $v; ?>'></script>

</body>
</html>