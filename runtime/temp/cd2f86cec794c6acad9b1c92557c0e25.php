<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:71:"C:\wamp64\www\project1/wstshop/home\view\default\users\orders\view.html";i:1523179468;s:64:"C:\wamp64\www\project1/wstshop/home\view\default\users\base.html";i:1523179466;s:64:"C:\wamp64\www\project1/wstshop/home\view\default\header_top.html";i:1523179466;s:60:"C:\wamp64\www\project1/wstshop/home\view\default\footer.html";i:1523179472;}*/ ?>
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>订单详情 - 用户中心<?php echo WSTConf('CONF.seoShopTitle'); ?></title>
<link href="__STYLE__/css/common.css?v=<?php echo $v; ?>" rel="stylesheet">
<link href="__STYLE__/css/user.css?v=<?php echo $v; ?>" rel="stylesheet">


<script type="text/javascript" src="__STATIC__/js/jquery.min.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" src="__STATIC__/plugins/layer/layer.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" src="__STATIC__/plugins/lazyload/jquery.lazyload.min.js?v=<?php echo $v; ?>"></script>
	  
<script type='text/javascript' src='__STATIC__/js/common.js?v=<?php echo $v; ?>'></script>

<script type='text/javascript' src='__STYLE__/js/common.js?v=<?php echo $v; ?>'></script>
<script>
window.conf = {
		"ROOT"      : "__ROOT__", 
		"APP"       : "__APP__", 
		"STATIC"    : "__STATIC__", 
		"SUFFIX"    : "<?php echo config('url_html_suffix'); ?>", 
		"SMS_VERFY" : "<?php echo WSTConf('CONF.smsVerfy'); ?>",
    	"PHONE_VERFY" : "<?php echo WSTConf('CONF.phoneVerfy'); ?>",
    	"GOODS_LOGO"  : "<?php echo WSTConf('CONF.goodsLogo'); ?>",
    	"SHOP_LOGO"  : "<?php echo WSTConf('CONF.shopLogo'); ?>",
    	"USER_LOGO"  : "<?php echo WSTConf('CONF.userLogo'); ?>",
    	"IS_LOGIN"   : "<?php if((int)session('WST_USER.userId')>0): ?>1<?php else: ?>0<?php endif; ?>",
    	"TIME_TASK"  : "1"
	}
	<?php echo WSTLoginTarget(0); ?>
$(function() {
	WST.initUserCenter();
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
<div class='wst-lite-bac'>
<div class='wst-lite-container'>
   <div class='wst-logo'><a href='<?php echo \think\Request::instance()->root(true); ?>'><img src="__ROOT__/<?php echo WSTConf('CONF.shopLogo'); ?>" height="120" width='240'></a></div>
   <div class="wst-lite-cart">
   	<a href="<?php echo url('home/carts/index'); ?>" target="_blank">
      <p class="word j-word">购物车</p> <span class="num" id="goodsTotalNum">0</span>
    </a>
   	<div class="wst-lite-carts hide">
   		<div id="list-carts"></div>
   		<div id="list-carts2"></div>
   		<div id="list-carts3"></div>
	   	<div class="wst-clear"></div>
   	</div>
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
   <div class="wst-lite-sea">
      <div class='search'>
	      <input type="text" placeholder="请输入商品名称" id='search-ipt' class='search-ipt' value='<?php echo isset($keyword)?$keyword:""; ?>'/>
	      <div id='search-btn' class="search-btn" onclick='javascript:WST.search(this.value)'></div>
      </div>
   </div>
   <div class="wst-clear"></div>
</div>
<div class="wst-clear"></div>
</div>

<div class="wst-wrap">
          <div class='wst-header' style='border-bottom: 1px solid #ffffff;'>
			<div class="wst-shop-nav">
				<div class="wst-nav-box">
					<?php $homeMenus = WSTHomeMenus(0); if(is_array($homeMenus['menus']) || $homeMenus['menus'] instanceof \think\Collection): $i = 0; $__LIST__ = $homeMenus['menus'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<a href="__ROOT__/<?php echo $vo['menuUrl']; ?>?id=<?php echo $vo['menuId']; ?>"><li class="liselect wst-lfloat <?php if(($vo['menuId'] == $homeMenus['menuId1'])): ?>wst-nav-boxa<?php endif; ?>"><?php echo $vo['menuName']; ?></li></a>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					<div class="wst-clear"></div>
				</div>
			</div>
			<div class="wst-clear"></div>
		</div>
          <div class='wst-nav'></div>
          <div class='wst-main'>
            <div class='wst-menu'>
              <div class="wst-users-info">
                <div class="wst-users-img">
                  <img class='usersImg' data-original="__ROOT__/<?php echo session('WST_USER.userPhoto'); ?>"/>
                </div>
                <div class="wst-userrank-img">
                  <?php if((session('WST_USER.userrankImg')!='')): ?>
                    <img src="__ROOT__/<?php echo session('WST_USER.userrankImg'); ?>"/><?php echo session('WST_USER.rankName'); endif; ?>
                </div>
              </div>
              <?php if(isset($homeMenus['menus'][$homeMenus['menuId1']]['list'])): if(is_array($homeMenus['menus'][$homeMenus['menuId1']]['list']) || $homeMenus['menus'][$homeMenus['menuId1']]['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $homeMenus['menus'][$homeMenus['menuId1']]['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menus): $mod = ($i % 2 );++$i;?>
              	<span class='wst-menu-title'><?php echo $menus['menuName']; ?><img src="__STYLE__/img/user_icon_sider_zhankai.png"></span>
              	<ul>
                <?php if(isset($menus['list'])): if(is_array($menus['list']) || $menus['list'] instanceof \think\Collection): $k = 0; $__LIST__ = $menus['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($k % 2 );++$k;?>
                  	<li class="<?php if(($homeMenus['menuId3']==$menu['menuId'])): ?>wst-menua<?php endif; ?> wst-menuas" onclick="getMenus('<?php echo $menu['menuId']; ?>','<?php echo $menu['menuUrl']; ?>')">
                  	<?php echo $menu['menuName']; ?>
                  	<span id="mId_<?php echo $menu['menuId']; ?>"></span>
                  	</li>
                	<?php endforeach; endif; else: echo "" ;endif; endif; ?>
              	</ul>
              	<?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>
            <div class='wst-content'>
            
<div class="wst-user-head"><span>订单详情</span></div>
<div class='wst-user-content'>
   <div class='order-box'>
    <div class='box-head'>日志信息</div>
    <?php if(in_array($object['orderStatus'],[-2,0,1,2])): ?>
	<div class='log-box'>
<div class="state">
<?php if($object['payType']==1): ?>
<div class="icon">
	<span class="icons <?php if(($object['orderStatus']==-2)OR($object['orderStatus']==0)OR($object['orderStatus']==1)OR($object['orderStatus']==2)): ?>icon12 <?php else: ?>icon11 <?php endif; ?>"></span>
</div>
<div class="arrow <?php if(($object['orderStatus']==-2)OR($object['orderStatus']==0) OR ($object['orderStatus']==1) OR ($object['orderStatus']==2)): ?>arrow2<?php endif; ?>">&nbsp;</div>
	<div class="icon"><span class="icons <?php if(($object['orderStatus']==-2)OR($object['orderStatus']==0)OR($object['orderStatus']==1)OR($object['orderStatus']==2)): ?>icon22 <?php else: ?>icon21<?php endif; ?>"></span></div>
	<div class="arrow <?php if(($object['orderStatus']==0)OR($object['orderStatus']==1) OR ($object['orderStatus']==2)): ?>arrow2<?php endif; ?>">&nbsp;</div>
<?php else: ?>
<div class="icon">
	<span class="icons <?php if(($object['orderStatus']==0)OR($object['orderStatus']==1)OR($object['orderStatus']==2)): ?>icon12 <?php else: ?>icon11 <?php endif; ?>"></span>
</div>
<div class="arrow <?php if(($object['orderStatus']==0)OR($object['orderStatus']==1) OR ($object['orderStatus']==2)): ?>arrow2<?php endif; ?>">&nbsp;</div>
<?php endif; ?>
<div class="icon">
	<span class="icons <?php if(($object['orderStatus']==0)OR($object['orderStatus']==1)OR($object['orderStatus']==2)OR($object['orderStatus']==1)): ?>icon32 <?php else: ?>icon31 <?php endif; ?>"></span>
</div>
<div class="arrow <?php if(($object['orderStatus']==1)OR($object['orderStatus']==2)): ?>arrow2<?php endif; ?>">&nbsp;</div>
<div class="icon"><span class="icons  <?php if(($object['orderStatus']==2)): ?>icon42 <?php else: ?>icon41 <?php endif; ?>"></span></div>
<div class="arrow <?php if(($object['orderStatus']==2)): ?>arrow2<?php endif; ?>">&nbsp;</div>
<div class="icon"><span class="icons <?php if(($object['orderStatus']==2)AND($object['isAppraise']==1)): ?>icon53 <?php else: ?>icon51 <?php endif; ?>"></span></div>
</div>
   <div class="state2">
   <div class="path">
   <?php if(is_array($object['log']) || $object['log'] instanceof \think\Collection): $i = 0; $__LIST__ = $object['log'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lo): $mod = ($i % 2 );++$i;?>
   	<span><?php echo $lo['logContent']; ?><br/><?php echo $lo['logTime']; ?></span>
   <?php endforeach; endif; else: echo "" ;endif; ?>
   </div>
   <p>下单</p><?php if($object['payType']==1): ?><p>等待支付</p><?php endif; ?><p>商家发货</p><p>确认收货</p><p>订单结束<br/>双方互评</p>
   </div>
   <div class="wst-clear"></div>
   </div>
    <?php else: ?>
        <div>
          <table class='log'>
            <?php if(is_array($object["log"]) || $object["log"] instanceof \think\Collection): $i = 0; $__LIST__ = $object["log"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
             <tr>
               <td><?php echo $vo['logTime']; ?></td>
               <td><?php echo $vo['logContent']; ?></td>
             </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
          </table>
        </div>                 
    <?php endif; ?>
   </div>
   <!-- 订单信息 -->
   <div class='order-box'>
      <div class='box-head'>订单信息</div>
      <table class='wst-form'>
         <tr>
           <th width='100'>订单编号：</th>
           <td><?php echo $object['orderNo']; ?></td>
         </tr>
         <tr>
           <th>支付方式：</th>
           <td><?php echo WSTLangPayType($object['payType']); ?></td>
         </tr>
         <?php if(($object['payType']==1 && $object['tradeNo']!='')): ?>
         <tr>
           <th>交易流水：</th>
           <td>【<?php echo WSTLangPayFrom($object['payFrom']); ?>】<?php echo $object['tradeNo']; ?></td>
         </tr>
         <?php endif; ?>
         <tr>
            <th>配送方式：</th>
            <td><?php echo WSTLangDeliverType($object['deliverType']); ?></td>
         </tr>
         <?php if($object['expressNo']!=''): ?>
         <tr>
            <th>快递公司：</th>
            <td><?php echo $object['expressName']; ?></td>
         </tr>
         <tr>
            <th>快递号：</th>
            <td><?php echo $object['expressNo']; ?></td>
         </tr>
         <?php endif; ?>
         <tr>
            <th>买家留言：</th>
            <td><?php echo $object['orderRemarks']; ?></td>
         </tr>
      </table>
   </div>
    <?php if($object['isRefund']==1): ?>
   <!-- 退款信息 -->
   <div class='order-box'>
      <div class='box-head'>退款信息</div>
      <table class='wst-form'>
         <tr>
            <th width='100'>退款金额：</th>
            <td>¥<?php echo $object['backMoney']; ?></td>
         </tr>
         <tr>
            <th width='100'>退款备注：</th>
            <td><?php echo $object['refundRemark']; ?></td>
         </tr>
         <tr>
            <th>退款时间：</th>
            <td><?php echo $object['refundTime']; ?></td>
         </tr>
      </table>
   </div>
   <?php endif; ?>
   <!-- 发票信息 -->
   <div class='order-box'>
      <div class='box-head'>发票信息</div>
      <table class='wst-form'>
         <tr>
           <th width='100'>是否需要发票：</th>
           <td><?php if($object['isInvoice']==1): ?>需要<?php else: ?>不需要<?php endif; ?></td>
         </tr>
         <tr>
           <th>发票抬头：</th>
           <td><?php echo $object['invoiceClient']; ?></td>
         </tr>
      </table>
   </div>
   <!-- 收货人信息 -->
   <div class='order-box'>
      <div class='box-head'>收货人信息</div>
      <table class='wst-form'>
         <tr>
           <th width='100'>收货人：</th>
           <td><?php echo $object['userName']; ?></td>
         </tr>
         <tr>
           <th>收货地址：</th>
           <td><?php echo $object['userAddress']; ?></td>
         </tr>
         <tr>
            <th>联系方式：</th>
            <td><?php echo $object['userPhone']; ?></td>
         </tr>
      </table>
   </div>
   <!-- 商品信息 -->
   <div class='order-box'>
       <div class='box-head'>商品清单</div>
       <div class='goods-head'>
          <div class='goods'>商品</div>
          <div class='price'>单价</div>
          <div class='num'>数量</div>
          <div class='t-price'>总价</div>
       </div>
       <div class='goods-item'>
          <div class='goods-list'>
             <?php if(is_array($object["goods"]) || $object["goods"] instanceof \think\Collection): $i = 0; $__LIST__ = $object["goods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
             <div class='item'>
		        <div class='goods'>
		            <div class='img'>
		                <a href='<?php echo Url("home/goods/detail","id=".$vo2["goodsId"]); ?>' target='_blank'>
			            <img src='__ROOT__/<?php echo $vo2["goodsImg"]; ?>' width='80' height='80' title='<?php echo $vo2["goodsName"]; ?>'/>
			            </a>
		            </div>
		            <div class='name'><?php echo $vo2["goodsName"]; ?></div>
		            <div class='spec'><?php echo str_replace('@@_@@','<br/>',$vo2["goodsSpecNames"]); ?></div>
		        </div>
		        <div class='price'>¥<?php echo $vo2['goodsPrice']; ?></div>
		        <div class='num'><?php echo $vo2['goodsNum']; ?></div>
		        <div class='t-price'>¥<?php echo $vo2['goodsPrice']*$vo2['goodsNum']; ?></div>
		        <div class='wst-clear'></div>
             </div>
             <?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
       </div>
       <div class='goods-footer'>
          <div class='goods-summary' style='text-align:right'>
             <div class='summary'>商品总金额：¥<span><?php echo $object['goodsMoney']; ?></span></div>
             <div class='summary'>运费：¥<span><?php echo $object['deliverMoney']; ?></span></div>
             <div class='summary line'>应付总金额：¥<span><?php echo $object['totalMoney']; ?></span></div>
             <div class='summary'>实付总金额：<span class="total">¥<?php echo $object['realTotalMoney']; ?></span></div>
             <div>可获得积分：<span class='orderScore'><?php echo $object["orderScore"]; ?></span>个</div>
          </div>
       </div>
   </div>
</div>

            </div>
          </div>
          <div style='clear:both;'></div>
          <div class="wst-bottom" style='display:none'>
          	<div class="wst-bottom-m">
          	<span class="wst-bottom-ml wst-bottom-ms">我的专属推荐</span><span class="wst-bottom-ml">我关注的商品</span><span class="wst-bottom-ml">我的足迹</span>
          	<span class="wst-bottom-mr"><img class="wst-lfloat" src="__STYLE__/img/user_icon_hyp.png"><a href="" class="wst-lfloat">换一批</a></span>
          	</div>
          	<div style='clear:both;'></div>
          	<div class="wst-bottom-g">
          		<div class="wst-bottom-gs">
          			<div class="wst-bottom-i"><img class="goodsImg" data-original="__STYLE__/img/img_hot_02.jpg"></div>
          			<div class="wst-bottom-n1">商品名称商品名称商品名称商品名称商品名称</div>
          			<span class="wst-bottom-n2"><span class="wst-bottom-n2l">￥100.00</span><span class="wst-bottom-n2r">成交数：<span>123</span></span></span>
          			<span class="wst-bottom-n3"><span class="wst-bottom-n3l">市场价：￥100.00</span><span class="wst-bottom-n3r">已有<span>123</span>人评价</span></span>
          			<span class="wst-bottom-n4"><span class="wst-lfloat">店铺名称店铺名称</span><img class="wst-lfloat" style="margin: 2px 0px 0px 5px;" src="__STYLE__/img/icon_dianpujie_03.png"></span>
          		</div>
          		          		<div class="wst-bottom-gs">
          			<div class="wst-bottom-i"><img class="goodsImg" data-original="__STYLE__/img/img_hot_02.jpg"></div>
          			<div class="wst-bottom-n1">商品名称商品名称商品名称商品名称商品名称</div>
          			<span class="wst-bottom-n2"><span class="wst-bottom-n2l">￥100.00</span><span class="wst-bottom-n2r">成交数：<span>123</span></span></span>
          			<span class="wst-bottom-n3"><span class="wst-bottom-n3l">市场价：￥100.00</span><span class="wst-bottom-n3r">已有<span>123</span>人评价</span></span>
          			<span class="wst-bottom-n4"><span class="wst-lfloat">店铺名称店铺名称</span><img class="wst-lfloat" style="margin: 2px 0px 0px 5px;" src="__STYLE__/img/icon_dianpujie_03.png"></span>
          		</div>
          		          		<div class="wst-bottom-gs">
          			<div class="wst-bottom-i"><img class="goodsImg" data-original="__STYLE__/img/img_hot_02.jpg"></div>
          			<div class="wst-bottom-n1">商品名称商品名称商品名称商品名称商品名称</div>
          			<span class="wst-bottom-n2"><span class="wst-bottom-n2l">￥100.00</span><span class="wst-bottom-n2r">成交数：<span>123</span></span></span>
          			<span class="wst-bottom-n3"><span class="wst-bottom-n3l">市场价：￥100.00</span><span class="wst-bottom-n3r">已有<span>123</span>人评价</span></span>
          			<span class="wst-bottom-n4"><span class="wst-lfloat">店铺名称店铺名称</span><img class="wst-lfloat" style="margin: 2px 0px 0px 5px;" src="__STYLE__/img/icon_dianpujie_03.png"></span>
          		</div>
          		          		<div class="wst-bottom-gs">
          			<div class="wst-bottom-i"><img class="goodsImg" data-original="__STYLE__/img/img_hot_02.jpg"></div>
          			<div class="wst-bottom-n1">商品名称商品名称商品名称商品名称商品名称</div>
          			<span class="wst-bottom-n2"><span class="wst-bottom-n2l">￥100.00</span><span class="wst-bottom-n2r">成交数：<span>123</span></span></span>
          			<span class="wst-bottom-n3"><span class="wst-bottom-n3l">市场价：￥100.00</span><span class="wst-bottom-n3r">已有<span>123</span>人评价</span></span>
          			<span class="wst-bottom-n4"><span class="wst-lfloat">店铺名称店铺名称</span><img class="wst-lfloat" style="margin: 2px 0px 0px 5px;" src="__STYLE__/img/icon_dianpujie_03.png"></span>
          		</div>
          		          		<div class="wst-bottom-gs">
          			<div class="wst-bottom-i"><img class="goodsImg" data-original="__STYLE__/img/img_hot_02.jpg"></div>
          			<div class="wst-bottom-n1">商品名称商品名称商品名称商品名称商品名称</div>
          			<span class="wst-bottom-n2"><span class="wst-bottom-n2l">￥100.00</span><span class="wst-bottom-n2r">成交数：<span>123</span></span></span>
          			<span class="wst-bottom-n3"><span class="wst-bottom-n3l">市场价：￥100.00</span><span class="wst-bottom-n3r">已有<span>123</span>人评价</span></span>
          			<span class="wst-bottom-n4"><span class="wst-lfloat">店铺名称店铺名称</span><img class="wst-lfloat" style="margin: 2px 0px 0px 5px;" src="__STYLE__/img/icon_dianpujie_03.png"></span>
          		</div>
          		<div style='clear:both;'></div>
          	</div>
          </div>
          <div style='clear:both;'></div>
          <br/>
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



<script type='text/javascript' src='__STYLE__/shops/orders/orders.js?v=<?php echo $v; ?>'></script>

<script>
function getMenus(menuId,menuUrl){
    $.post(WST.U('home/index/getMenuSession'), {menuId:menuId}, function(data){
    	location.href=WST.U(menuUrl);
    });
}
</script>
</body>
</html>