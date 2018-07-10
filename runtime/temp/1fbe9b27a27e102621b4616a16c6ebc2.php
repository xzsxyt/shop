<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"C:\wamp64\www\project1/wstshop/home\view\default\users\index.html";i:1523179468;s:64:"C:\wamp64\www\project1/wstshop/home\view\default\users\base.html";i:1523179466;s:64:"C:\wamp64\www\project1/wstshop/home\view\default\header_top.html";i:1523179466;s:60:"C:\wamp64\www\project1/wstshop/home\view\default\footer.html";i:1523179472;}*/ ?>
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>用户中心 - <?php echo WSTConf('CONF.shopName'); ?><?php echo WSTConf('CONF.seoShopTitle'); ?></title>
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
            
            <div class="result" style="margin:-1px;border:1px solid #fff;">
              <div class="ucenterInfo">
                <ul class="userInfo">
                  <li>
                    <p class="ucName">嗨，<span><?php echo $data['loginName']; ?></span></p>
                    <span class="wst-sec-infoi" id="level"></span>
                    <div class="wst-sec-infoi" style="margin-top:5px;">
                      <span class="wst-sec-strip wst-lfloat"><?php if(($data['loginPwd'])): ?><span class="wst-sec-strip2 wst-lfloat"></span><?php endif; if(($data['userEmail'])): ?><span class="wst-sec-strip2 wst-lfloat"></span><?php endif; if(($data['userPhone'])): ?><span class="wst-sec-strip2 wst-lfloat"></span><?php endif; ?></span>
                    </div>
                    <div class="wst-clear"></div>
                    <div class="wst-sec-infoi" style="margin-top:5px;">
                      <span>上次登录时间：<?php echo date("Y-m-d H:i",strtotime($data['lastTime'])); ?></span>
                      <br/>
                      <span style="display:block;margin-top:3px;">上次登录IP：<?php echo $data['lastIP']; ?></span>
                    </div>
                  </li>
                  <li class="money">
                      <p onclick="goMoney();"><span class="moneyIcon"></span>我的余额:<span class="r">￥<?php echo $data['userMoney']; ?></span></p>
                      <p onclick="goScore();"><span class="scoreIcon"></span>我的积分:<span class="b"><?php echo $data['userScore']; ?></span>积分</p>
                  </li>
                  <li class='money'>
                    <p onclick="location.href='<?php echo url('home/useraddress/index'); ?>'"><span class="addrIcon"></span>我的收货地址</p>
                    <p onclick="location.href='<?php echo url('home/users/edit'); ?>'"><span class="infoIcon"></span>编辑个人资料</p>
                  </li>
                </ul>
              </div>
              <ul class="orderStatus">
              	<li onclick="location.href='<?php echo url('home/orders/waitPay'); ?>'">
              		<span class="uc-order-icon1"></span>
              		<p class="ucNum"><?php echo $order['waitPay']; ?></p>
              		<p>待付款订单</p>
              	</li>
              	<li onclick="location.href='<?php echo url('home/orders/waitSend'); ?>'">
              		<span class="uc-order-icon2"></span>
              		<p class="ucNum"><?php echo $order['waitSend']; ?></p>
              		<p>待发货订单</p>
              	</li>
              	<li onclick="location.href='<?php echo url('home/orders/waitReceive'); ?>'">
              		<span class="uc-order-icon3"></span>
              		<p class="ucNum"><?php echo $order['waitReceive']; ?></p>
              		<p>待收货订单</p>
              	</li>
              	<li onclick="location.href='<?php echo url('home/orders/waitAppraise'); ?>'">
              		<span class="uc-order-icon4"></span>
              		<p class="ucNum"><?php echo $order['waitAppr']; ?></p>
              		<p>待评价订单</p>
              	</li>
              	<li onclick="location.href='<?php echo url('home/orders/abnormal'); ?>'">
              		<span class="uc-order-icon5"></span>
              		<p class="ucNum"><?php echo $order['reject']; ?></p>
              		<p>退款/拒收订单</p>
              	</li>
              </ul>

              <div class="uc-goods-box">
              	<div class="wst-user-head"><span>为您推荐</span></div>
              	<?php $wstTagGoods =  model("Tags")->listGoods("recom",0,5,0); foreach($wstTagGoods as $key=>$rec){?>
              	<div class="rnbh-goods">
          					<a class="rnbg-imgbox" href="<?php echo Url("home/goods/detail","id=".$rec["goodsId"]); ?>" target="_blank">
          						<img class='goodsImg' data-original="__ROOT__/<?php echo WSTImg($rec['goodsImg']); ?>"  title="<?php echo $rec['goodsName']; ?>"/>
          					</a>
          					<p class="rnbh-goodsName">
          						<a href='<?php echo Url("home/goods/detail","id=".$rec["goodsId"]); ?>' target='_blank'>
          							<?php echo $rec['goodsName']; ?>
          						</a>
          					</p>
          					<div class="rnbh-goodsInfo">
          						<span class="rnbh-goodsprice">￥<?php echo $rec['shopPrice']; ?></span>
          						<span class="rnbh-goodssale">成交量：<em><?php echo $rec['saleNum']; ?></em></span>
          					</div>
          					<a class="rnbh-addcart" href="javascript:WST.addCart(<?php echo $rec['goodsId']; ?>);" >加入购物车</a>
          				</div>
          				<?php } ?>
              </div>

              <div class="uc-goods-box">
              	<div class="wst-user-head"><span>我的关注</span></div>
              	<?php if(is_array($favorites) || $favorites instanceof \think\Collection): $i = 0;$__LIST__ = is_array($favorites) ? array_slice($favorites,0,5, true) : $favorites->slice(0,5, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fa): $mod = ($i % 2 );++$i;?>
              	<div class="rnbh-goods">
					<a class="rnbg-imgbox" href="<?php echo Url("home/goods/detail","id=".$fa["goodsId"]); ?>" target="_blank">
						<img class='goodsImg' data-original="__ROOT__/<?php echo WSTImg($fa['goodsImg']); ?>"  title="<?php echo $fa['goodsName']; ?>"/>
					</a>
					<p class="rnbh-goodsName">
						<a href='<?php echo Url("home/goods/detail","id=".$fa["goodsId"]); ?>' target='_blank'>
							<?php echo $fa['goodsName']; ?>
						</a>
					</p>
					<div class="rnbh-goodsInfo">
						<span class="rnbh-goodsprice">￥<?php echo $fa['shopPrice']; ?></span>
						<span class="rnbh-goodssale">成交量：<em><?php echo $fa['saleNum']; ?></em></span>
					</div>
					<a class="rnbh-addcart" href="javascript:WST.addCart(<?php echo $fa['goodsId']; ?>);" >加入购物车</a>
				</div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
              </div>

              <div class="uc-goods-box">
              	<div class="wst-user-head"><span>我的足迹</span></div>
                      	<?php $wstTagGoods =  model("Tags")->listGoods("history",0,5,0); foreach($wstTagGoods as $key=>$his){?>
                      	<div class="rnbh-goods">
        					<a class="rnbg-imgbox" href="<?php echo Url("home/goods/detail","id=".$his["goodsId"]); ?>" target="_blank">
        						<img class='goodsImg' data-original="__ROOT__/<?php echo WSTImg($his['goodsImg']); ?>"  title="<?php echo $his['goodsName']; ?>"/>
        					</a>
        					<p class="rnbh-goodsName">
        						<a href='<?php echo Url("home/goods/detail","id=".$his["goodsId"]); ?>' target='_blank'>
        							<?php echo $his['goodsName']; ?>
        						</a>
        					</p>
        					<div class="rnbh-goodsInfo">
        						<span class="rnbh-goodsprice">￥<?php echo $his['shopPrice']; ?></span>
        						<span class="rnbh-goodssale">成交量：<em><?php echo $his['saleNum']; ?></em></span>
        					</div>
        					<a class="rnbh-addcart" href="javascript:WST.addCart(<?php echo $his['goodsId']; ?>);" >加入购物车</a>
        				</div>
        				<?php } ?>
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



<script>
$(function(){
  var securityCount = $('.wst-sec-strip2').length;
  if(securityCount==1){
     $('#level').html('安全级别(较低级)&nbsp; &nbsp; &nbsp;<span class="wst-sec-infoin" id="warn">建议提升安全</span>');
  }else if(securityCount==2){
     $('#level').html('安全级别(中级)&nbsp; &nbsp; &nbsp;<span class="wst-sec-infoin" id="warn">建议提升安全</span>');
  }else if(securityCount==3){
     $('#level').html('安全级别(高级)&nbsp; &nbsp; &nbsp;<span class="wst-sec-infoin" id="safe">建议定期更改密码</span>');
  }else{
     $('#level').html('安全级别(低级)&nbsp; &nbsp; &nbsp;<span class="wst-sec-infoin" id="warn">账号有风险</span>');
  }
});
function goMoney(){location.href=WST.U('home/logmoneys/usermoneys',{'id':43})}
function goScore(){location.href=WST.U('home/userscores/index',{'id':43})}
</script>

<script>
function getMenus(menuId,menuUrl){
    $.post(WST.U('home/index/getMenuSession'), {menuId:menuId}, function(data){
    	location.href=WST.U(menuUrl);
    });
}
</script>
</body>
</html>