<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:64:"C:\wamp64\www\project1/wstshop/home\view\default\goods_list.html";i:1523179468;s:58:"C:\wamp64\www\project1/wstshop/home\view\default\base.html";i:1523179472;s:60:"C:\wamp64\www\project1/wstshop/home\view\default\header.html";i:1523179466;s:64:"C:\wamp64\www\project1/wstshop/home\view\default\header_top.html";i:1523179466;s:64:"C:\wamp64\www\project1/wstshop/home\view\default\right_cart.html";i:1523179466;s:60:"C:\wamp64\www\project1/wstshop/home\view\default\footer.html";i:1523179472;}*/ ?>
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>商品列表 -<?php echo WSTConf('CONF.shopName'); ?><?php echo WSTConf('CONF.seoShopTitle'); ?></title>
<meta name="auther" content="WSTShop,www.wstshop.net" />
<meta name="copyright" content="Copyright©2016-2066 Powered By WSTShop" />

<meta name="description" content="<?php echo WSTConf('CONF.seoShopDesc'); ?>">
<meta name="Keywords" content="<?php echo WSTConf('CONF.seoShopKeywords'); ?>">



<link href="__STYLE__/css/common.css?v=<?php echo $v; ?>" rel="stylesheet">

<link href="__STYLE__/css/goodslist.css?v=<?php echo $v; ?>" rel="stylesheet">

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




<input type="hidden" id="cat" class="sipt" value='<?php echo $catId; ?>'/>
<input type="hidden" id="brand" class="sipt" value='<?php echo $brandId; ?>'/>
<?php if(is_array($vs) || $vs instanceof \think\Collection): $i = 0; $__LIST__ = $vs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
<input type="hidden" id="v_<?php echo $v; ?>" class="sipt" value='<?php echo $attrs["v_".$v]; ?>'/>
<?php endforeach; endif; else: echo "" ;endif; ?>
<input type="hidden" id="vs" class="sipt" value='<?php echo implode(",",$vs); ?>'/>
<input type="hidden" id="orderBy" class="sipt" value='<?php echo $orderBy; ?>'/>
<input type="hidden" id="order" class="sipt" value='<?php echo ($order=="0")?"1":"0"; ?>' autocomplete="off"/>
<input type="hidden" id="goodsName" class="sipt" value='<?php echo $goodsName; ?>' autocomplete="off"/>
<div class='wst-filters'>
   <div class='item' style="border-left:2px solid #df2003;padding-left: 8px;">
      <a class='link' href='__ROOT__'>首页</a>
      <i class="arrow">></i>
   </div>
   <?php if(($catId)): $_result=WSTPathGoodsCat($catId);if(is_array($_result) || $_result instanceof \think\Collection): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
   <div class='wst-lfloat'>
   	<div class='item dorpdown'>
     <div class='drop-down'>
     	<?php $cId=$vo['catId'] ?>
        <a class='link' href='__ROOT__'><?php echo $vo['catName']; ?></a>
        <i class="drop-down-arrow"></i>
     </div>
     <div class="dorp-down-layer">
         <?php $_result=WSTGoodsCats($vo['parentId']);if(is_array($_result) || $_result instanceof \think\Collection): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
         <div class="<?php echo !empty($vo['parentId']) && $vo['parentId']>0?'cat2':'cat1'; ?>"><a href='<?php echo Url("home/goods/lists","cat=".$vo2["catId"]); ?>'><?php echo $vo2['catName']; ?></a></div>
         <?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	</div>
   </div>
  
   <?php endforeach; endif; else: echo "" ;endif; if(is_array($selector) || $selector instanceof \think\Collection): $i = 0; $__LIST__ = $selector;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
   <div class='item dorpdown'>
   <a class='v-item' href='javascript:void(0);' onclick="javscript:removeFilter('<?php echo $vo['type']; ?>')">
     <span><?php echo $vo['label']; ?>：<?php echo $vo['val']; ?></span>
     <i>x</i>
   </a>
   <i class="arrow">></i>
   </div>
   <?php endforeach; endif; else: echo "" ;endif; else: ?>
   <div class='item'>
      <a class='link' href='javascript:void(0);'>全部商品分类</a>
   </div>
   <?php endif; ?>
   <div class="filter-search">
   		<input type="text" placeholder="在此结果中搜索" id="sGoodsName" value="<?php if(('' != $goodsName)): ?><?php echo $goodsName; endif; ?>"  />
   		<div class="fsearchIcon" onclick='javascript:fsGoods()'></div>
   	</div>
   <div class='wst-clear'></div>
</div>
<div style="width:1200px;margin:0 auto;">
	<div style="width:210px;height:337px;float:left;margin-top:10px;">
		<div class="catName">
			<?php echo isset($vo['catName']) ? $vo['catName'] : '全部商品分类'; ?>
		</div>
		<ul class="catNameItem">
		<?php if(is_array($goodsCats) || $goodsCats instanceof \think\Collection): $i = 0; $__LIST__ = $goodsCats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<a href="<?php echo Url("home/goods/lists","cat=".$vo["catId"]); ?>"><li><?php echo WSTMSubstr($vo['catName'],0,4); ?></li></a>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	
	<div class="wst-selector" style="width:975px;float:left;padding-left:10px;">
		
		<div class="uc-goods-box" style="padding-top:0px;border: none;">
		<div class="wst-user-head"><span>热卖推荐</span></div>
			<?php $wstTagGoods =  model("Tags")->listGoods("recom",$catId,5,0); foreach($wstTagGoods as $key=>$rec){?>
			<div class="rnbh-goods" >
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
		

	    <div class='head'>商品筛选条件</div>
	    <div class="main">
	       <?php $selectorNum = 0; if(!empty($brandFilter)): $selectorNum++; ?>
	       <div class='item'>
	          <div class='label'>品牌：</div>
	          <ul class='content'>
	          <?php if(is_array($brandFilter) || $brandFilter instanceof \think\Collection): $i = 0; $__LIST__ = $brandFilter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bv): $mod = ($i % 2 );++$i;?>
	          <li class='s-item' onclick='javascript:goodsFilter(this,1)' v="<?php echo $bv['brandId']; ?>"><?php echo $bv['brandName']; ?></li>
	          <?php endforeach; endif; else: echo "" ;endif; ?>
	          </ul>
	          <div class='extra'>&nbsp;</div>
	          <div class='wst-clear'></div>
	       </div>
	       <?php endif; if(is_array($goodsFilter) || $goodsFilter instanceof \think\Collection): $i = 0; $__LIST__ = $goodsFilter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gv): $mod = ($i % 2 );++$i;$selectorNum++; ?>
	       <input type="hidden" id="v_<?php echo $gv['attrId']; ?>" class="sipt" value=''/>
	       <div class='item <?=($selectorNum > 3)?"hideItem hide":"" ?>'>
	          <div class='label'><?php echo $gv['attrName']; ?>：</div>
	          <ul class='content'>
	             <?php if(is_array($gv['attrVal']) || $gv['attrVal'] instanceof \think\Collection): $i = 0; $__LIST__ = $gv['attrVal'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gvi): $mod = ($i % 2 );++$i;?>
	             <li class='s-item' onclick='javascript:goodsFilter(this,3)' d="<?php echo $gv['attrId']; ?>" v="<?php echo $gvi; ?>"><?php echo $gvi; ?></li>
	             <?php endforeach; endif; else: echo "" ;endif; ?>
	          </ul>
	          <div class='extra'>&nbsp;</div>
	          <div class='wst-clear'></div>
	       </div>
	       <?php endforeach; endif; else: echo "" ;endif; $selectorNum++; if($sprice=='' && $eprice==''): ?>
	       <div class='item <?=($selectorNum > 3)?"hideItem hide":"" ?>'>
	          <div class='label'>价格：</div>
	          <ul class='content'>
	          <?php if(is_array($priceGrade) || $priceGrade instanceof \think\Collection): $pKey = 0; $__LIST__ = $priceGrade;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($pKey % 2 );++$pKey;?>
	          <li class='s-item' onclick='javascript:goodsFilter(this,2)' v="<?php echo $key; ?>"><?php echo $vo; ?></li>
	          <?php endforeach; endif; else: echo "" ;endif; ?>
	          </ul>
	          <div class='extra'>&nbsp;</div>
	          <div class='wst-clear'></div>
	       </div>
	       <?php endif; if($selectorNum > 3): ?>
	       <div class="item-more-box">
	          <div class='item-more' v="1"><span>更多选项</span><i class="drop-down"></i></div>
	       </div>
	       <?php endif; ?>
	    </div>
	    <div class='wst-clear'></div>
	</div>
</div>


<div class="wst-container">
	<div class='goods-side'>
		<div class="guess-like">
			<div class="title">猜你喜欢</div>
			<?php $wstTagGoods =  model("Tags")->listGoods("best",$catId,3,0); foreach($wstTagGoods as $key=>$vo){?>
			<div class="item">
				<div class="img"><a target='_blank' href="<?php echo Url('home/goods/detail','id='.$vo['goodsId']); ?>"><img class='goodsImg' data-original="__ROOT__/<?php echo WSTImg($vo['goodsImg']); ?>" alt="<?php echo $vo['goodsName']; ?>" title="<?php echo $vo['goodsName']; ?>"/></a></div>
				<div class="p-name"><a class="wst-hide wst-redlink"><?php echo $vo['goodsName']; ?></a></div>
				<div class="p-price">￥<?php echo $vo['shopPrice']; ?><span class="v-price">￥<?php echo $vo['marketPrice']; ?></span></div>
			</div>
			<?php } ?>
		</div>
		<div class="hot-goods">
			<div class="title">热销商品</div>
			<?php $wstTagGoods =  model("Tags")->listGoods("hot",$catId,3,0); foreach($wstTagGoods as $key=>$vo){?>
			<div class="item">
				<div class="img"><a target='_blank' href="<?php echo Url('home/goods/detail','id='.$vo['goodsId']); ?>"><img class='goodsImg' data-original="__ROOT__/<?php echo WSTImg($vo['goodsImg']); ?>" alt="<?php echo $vo['goodsName']; ?>" title="<?php echo $vo['goodsName']; ?>"/></a></div>
				<div class="p-name"><a class="wst-hide wst-redlink"><?php echo $vo['goodsName']; ?></a></div>
				<div class="p-price">￥<?php echo $vo['shopPrice']; ?><span class="v-price">￥<?php echo $vo['marketPrice']; ?></span></div>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class='goods-main'>
	   <div class='goods-filters'>
	   	  <div class='line'>
	        
	      </div>
	      <div class='line line2'>
	        <a class="condition <?php if($orderBy == 0): ?>curr <?php endif; ?>" href='javascript:void(0)' onclick='javascript:goodsOrder(0)'>销量</a>
	        <a class="condition <?php echo !empty($orderBy) && $orderBy==1?'curr':''; ?>" href='javascript:void(0)' onclick='javascript:goodsOrder(1)'>价格</a>
	        <a class="condition <?php echo !empty($orderBy) && $orderBy==2?'curr':''; ?>" href='javascript:void(0)' onclick='javascript:goodsOrder(2)'>评论数</a>
	        <a class="condition <?php echo !empty($orderBy) && $orderBy==3?'curr':''; ?>" href='javascript:void(0)' onclick='javascript:goodsOrder(3)'>人气</a>
	        <a class="condition <?php echo !empty($orderBy) && $orderBy==4?'curr':''; ?>" href='javascript:void(0)' onclick='javascript:goodsOrder(4)'>上架时间</a>
	        <div class='chk'>
			 <div class="checkbox-box-s">
		     <input name='isStock' value='1' class="sipt wst-checkbox-s" onclick="goodsFilter(this,4)" type='checkbox' id="stock" <?php if($isStock==1): ?>checked<?php endif; ?>/>
		     <label for="stock"></label>
		     </div>
	                  显示有货</div>
	        <div class='chk'>
	         <div class="checkbox-box-s">
		     <input name='isNew' value='1' class="sipt wst-checkbox-s" onclick="goodsFilter(this,4)" type='checkbox' id="new" <?php if($isNew==1): ?>checked<?php endif; ?>/>
		     <label for="new"></label>
		     </div>
	                  新品</div>
        	<div class="wst-price-ipts">
			<span class="wst-price-ipt1">￥</span><span class="wst-price-ipt2">￥</span>
			<input type="text" class="sipt wst-price-ipt" id="sprice" value="<?php echo $sprice; ?>" style="margin-left:8px;" onkeypress='return WST.isNumberdoteKey(event);' onkeyup="javascript:WST.isChinese(this,1)">
			- <input type="text" class="sipt wst-price-ipt" id="eprice" value="<?php echo $eprice; ?>" onkeypress='return WST.isNumberKey(event);' onkeyup="javascript:WST.isChinese(this,1)">
			</div>
			<button class="wst-price-but" type="submit" style="width:60px;height: 25px;" onclick='javascript:goodsOrder()'>确定</button>
	      </div>
	   </div>
	   <div class="goods-list">
	      <?php if(is_array($goodsPage["Rows"]) || $goodsPage["Rows"] instanceof \think\Collection): $i = 0; $__LIST__ = $goodsPage["Rows"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	      <div class="goods">
	      	<div class="img"><a target='_blank' href="<?php echo Url('home/goods/detail','id='.$vo['goodsId']); ?>"><img title="<?php echo $vo['goodsName']; ?>" alt="<?php echo $vo['goodsName']; ?>" class='goodsImg2' data-original="__ROOT__/<?php echo $vo['goodsImg']; ?>"/></a></div>
	      	<div class="p-name"><a target='_blank' href="<?php echo Url('home/goods/detail','id='.$vo['goodsId']); ?>" class="wst-redlink" title="<?php echo $vo['goodsName']; ?>"><?php echo $vo['goodsName']; ?></a></div>
	      	<div>
	      		<div class="p-price">￥<?php echo $vo['shopPrice']; ?></div>
	      		<div class="p-hsale">
	      			<div class="sale-num">成交数：<span class="wst-fred"><?php echo $vo['saleNum']; ?></span></div>
		      		<a class="p-add-cart" style="display:none;" href="javascript:WST.addCart(<?php echo $vo['goodsId']; ?>);">加入购物车</a>
	      		</div>
	      		<div class='wst-clear'></div>
	      	</div>
	      	<div>
	      		<div class="p-mprice">市场价<span>￥<?php echo $vo['marketPrice']; ?></span></div>
	      		<div class="p-appraise">已有<span class="wst-fred"><?php echo $vo['appraiseNum']; ?></span>人评价</div>
	      		<div class='wst-clear'></div>
	      	</div>
	      </div>
	      
	      <?php endforeach; endif; else: echo "" ;endif; ?>
	     <div class='wst-clear'></div>
	   	</div>
	   	<div style="position: absolute;bottom: -50px;width:980px;">
	  		<div id="wst-pager"></div>
		</div>
		
	</div>
	<div class='wst-clear'></div>
</div>
<link href="__STYLE__/css/right_cart.css?v=<?php echo $v; ?>" rel="stylesheet">
<div class="j-global-toolbar">
	<div class="toolbar-wrap j-wrap">
		<div class="toolbar">
			<div class="toolbar-panels j-panel">
				<div style="visibility: hidden;" class="j-content toolbar-panel tbar-panel-cart toolbar-animate-out">
					<h3 class="tbar-panel-header j-panel-header">
						<a href="" class="title"><i></i><em class="title">购物车</em></a>
						<span class="close-panel j-close" title='关闭'></span>
					</h3>
					<div class="tbar-panel-main">
						<div class="tbar-panel-content j-panel-content">
						    <?php if(session('WST_USER.userId') == 0): ?>
							<div id="j-cart-tips" class="tbar-tipbox hide">
								<div class="tip-inner">
									<span class="tip-text">还没有登录，登录后商品将被保存</span>
									<a href="#none" onclick='WST.loginWindow()' class="tip-btn j-login">登录</a>
								</div>
							</div>
							<?php endif; ?>
							<div id="j-cart-render">
								<div id='cart-panel' class="tbar-cart-list"></div>
								  <script id="list-rightcart" type="text/html">
								  {{#
                                    var goods,specs;
					                for(var i=0;i < d.length;i++){
                                           goods = d[i];
						                   goods.goodsImg = WST.conf.ROOT+"/"+goods.goodsImg.replace('.','_thumb.');
						                   specs = '';
						                   if(goods.specNames && goods.specNames.length>0){
							                  for(var j=0;j<goods.specNames.length;j++){
								                 specs += goods.specNames[j].itemName+ " ";
							                  }
						                   }
                                   }}
								   <div class="tbar-cart-item">
								      <div class="jtc-item-goods j-goods-item-{{goods.cartId}}" dataval="{{goods.cartId}}">
								          <div class='wst-lfloat'>
			                                 <input type='checkbox' id='rcart_{{goods.cartId}}' class='rchk' onclick='javascript:checkRightChks({{goods.cartId}},this);' {{# if(goods.isCheck==1){}}checked{{# } }}/></div>
									      <span class="p-img"><a target="_blank" href="{{WST.U('home/goods/detail','id='+goods.goodsId)}}" target="_blank"><img src="{{goods.goodsImg}}" title="{{goods.goodsName}}" height="50" width="50"></a></span>
									      <div class="p-name">
									          <a target="_blank" title="{{(goods.goodsName+((specs!='')?"【"+specs+"】":""))}}" href="{{WST.U('home/goods/detail','id='+goods.goodsId)}}">{{WST.cutStr(goods.goodsName,22)}}<br/>{{specs}}</a>
									      </div>
									      <div class="p-price">
									          <strong>¥<span id='gprice_{{goods.cartId}}'>{{goods.shopPrice}}</span></strong> 
									          <div class="wst-rfloat">
									             <a href="#none" class="buy-btn" id="buy-reduce_{{goods.cartId}}" onclick="javascript:WST.changeIptNum(-1,'#buyNum','#buy-reduce,#buy-add','{{goods.cartId}}','statRightCartMoney')">-</a>
									             <input type="text" id="buyNum_{{goods.cartId}}" class="right-cart-buy-num" value="{{goods.cartNum}}" data-max="{{goods.goodsStock}}" data-min="1" onkeyup="WST.changeIptNum(0,'#buyNum','#buy-reduce,#buy-add',{{goods.cartId}},'statRightCartMoney')" autocomplete="off"  onkeypress="return WST.isNumberKey(event);" maxlength="6"/>
									             <a href="#none" class="buy-btn" id="buy-add_{{goods.cartId}}" onclick="javascript:WST.changeIptNum(1,'#buyNum','#buy-reduce,#buy-add','{{goods.cartId}}','statRightCartMoney')">+</a>
									          </div>
									     </div>
									      <span onclick="javascript:delRightCart(this,{{goods.cartId}});" dataid="{{goods.cartId}}" class="goods-remove" title="删除"></span>
									 </div>
								 </div>    
								 {{# }  }} 
                                 </script>   	
							</div>
						</div>
					</div>
					<div class="tbar-panel-footer j-panel-footer">
						<div class="tbar-checkout">
							<div class="jtc-number">已选<strong id="j-goods-count">0</strong>件商品 </div>
							<div class="jtc-sum"> 共计：¥<strong id="j-goods-total-money">0</strong> </div>
							<a class="jtc-btn j-btn" href="#none" onclick='javascript:jumpSettlement()'>去结算</a>
						</div>
					</div>
				</div>

				<div style="visibility: hidden;" data-name="follow" class="j-content toolbar-panel tbar-panel-follow">
					<h3 class="tbar-panel-header j-panel-header">
						<a href="#" target="_blank" class="title"> <i></i> <em class="title">我的关注</em> </a>
						<span class="close-panel j-close" title='关闭'></span>
					</h3>
					<div class="tbar-panel-main">
						<div class="tbar-panel-content j-panel-content">
							<div class="tbar-tipbox2">
								<div class="tip-inner"> <i class="i-loading"></i> </div>
							</div>
						</div>
					</div>
					<div class="tbar-panel-footer j-panel-footer"></div>
				</div>
				
				<div style="visibility: hidden;" class="j-content toolbar-panel tbar-panel-history toolbar-animate-in">
					<h3 class="tbar-panel-header j-panel-header">
						<a href="#none" class="title"> <i></i> <em class="title">我的足迹</em> </a>
						<span class="close-panel j-close" title='关闭'></span>
					</h3>
					<div class="tbar-panel-main">
						<div class="tbar-panel-content j-panel-content">
							<div class="jt-history-wrap">
								<ul id='history-goods-panel'></ul>
								<script id="list-history-goods" type="text/html">
								{{# 
                                 for(var i = 0; i < d.length; i++){ 
                                  d[i].goodsImg = WST.conf.ROOT+"/"+d[i].goodsImg.replace('.','_thumb.');
                                 }}
								   <li class="jth-item">
										<a target='_blank' href="{{WST.U('home/goods/detail','id='+d[i].goodsId)}}" class="img-wrap"><img src="{{d[i].goodsImg}}" height="100" width="100"> </a>
										<a class="add-cart-button" href="javascript:WST.addCart({{d[i].goodsId}});">加入购物车</a>
										<a href="#none" class="price">￥{{d[i].shopPrice}}</a>
									</li>
								{{# } }}
                                </script>
							</div>
						</div>
					</div>
					<div class="tbar-panel-footer j-panel-footer"></div>
				</div>
			</div>
			
			<div class="toolbar-header"></div>
			
			<div class="toolbar-tabs j-tab">
				<div class="toolbar-tab tbar-tab-cart">
					<i class="tab-ico"></i>
					<em class="tab-text">购物车</em>
					<span class="tab-sub j-cart-count hide"></span>
				</div>
				<div class="toolbar-tab tbar-tab-follow" style='display:none'>
					<i class="tab-ico"></i>
					<em class="tab-text">我的关注</em>
					<span class="tab-sub j-count hide">0</span> 
				</div>
				<div class=" toolbar-tab tbar-tab-history ">
					<i class="tab-ico"></i>
					<em class="tab-text">我的足迹</em>
					<span class="tab-sub j-count hide"></span>
				</div>
				<div class="toolbar-tab tbar-tab-message">
				  <a target='_blank' href='<?php echo Url("home/messages/index"); ?>' onclick='WST.position(49,0)'>
					<i class="tab-ico"></i>
					<em class="tab-text">我的消息</em>
					<span class="tab-sub j-message-count hide"></span> 
				  </a>
				</div>
			</div>
			
			<div class="toolbar-footer">
				<div class="toolbar-tab tbar-tab-top"> <a href="#"> <i class="tab-ico  "></i> <em class="footer-tab-text">顶部</em> </a> </div>
				<div class=" toolbar-tab tbar-tab-feedback"  style='display:none'> <a href="#" target="_blank"> <i class="tab-ico"></i> <em class="footer-tab-text ">反馈</em> </a> </div>
			</div>
			<div class="toolbar-mini"></div>
		</div>
		<div id="j-toolbar-load-hook"></div>		
	</div>
</div>
<script type='text/javascript' src='__STYLE__/js/right_cart.js?v=<?php echo $v; ?>'></script>


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



<script type='text/javascript' src='__STYLE__/js/goodslist.js?v=<?php echo $v; ?>'></script>
<script type='text/javascript'>
laypage({
    cont: 'wst-pager',
    pages: <?php echo $goodsPage["TotalPage"]; ?>, //总页数
    skip: true, //是否开启跳页
    skin: '#e23e3d',
    groups: 3, //连续显示分页数
    curr: function(){ //通过url获取当前页，也可以同上（pages）方式获取
        var page = location.search.match(/page=(\d+)/);
        return page ? page[1] : 1;
    }(), 
    jump: function(e, first){ //触发分页后的回调
        if(!first){ //一定要加此判断，否则初始时会无限刷新
        	var nuewurl = WST.splitURL("page");
        	var ulist = nuewurl.split("?");
        	if(ulist.length>1){
        		location.href = nuewurl+'&page='+e.curr;
        	}else{
        		location.href = '?page='+e.curr;
        	}
            
        }
    }
});



var total = <?php echo $goodsPage["TotalPage"]; ?>;
function page(t){
	var page = location.search.match(/page=(\d+)/);
	var curr = 1;
	if(page && page.length>1){ //说明当前url上有page参数
		curr = page[1]; // 当前页
	}
	var nuewurl = WST.splitURL("page"); // 当前url
	var ulist = nuewurl.split("?"); // 将传递的参数与url分开
	// 说明当前有参数. 需要带着参数一起传递
	var url = (ulist.length>1)?nuewurl+'&page=':'?page=';

	if(t=='prev'){ // 上一页
		if(curr<=1)return;
		curr = parseInt(curr)-1;
		location.href = url+curr;
	}else{ // 下一页
		if(curr>=total)return;
		curr = parseInt(curr)+1;
		location.href = url+curr;
	}
	
}
</script>

</body>
</html>