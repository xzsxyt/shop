function checkChks(obj,cobj){
	WST.checkChks(obj,cobj);
	$(cobj).each(function(){
		id = $(this).val();
		if(obj.checked){
			$(this).addClass('selected');
		}else{
			$(this).removeClass('selected');
		}
		var cid = $(this).find(".j-chk").val();
		if(cid!=''){
		    WST.changeCartGoods(cid,$('#buyNum_'+cid).val(),obj.checked?1:0);
		    statCartMoney();
	    }
	})
}
function statCartMoney(){
	var cartMoney = 0,goodsTotalPrice,id;
	$('.j-gchk').each(function(){
		id = $(this).val();
		goodsTotalPrice = parseFloat($(this).attr('mval'))*parseInt($('#buyNum_'+id).val());
		$('#tprice_'+id).html(goodsTotalPrice);
		if($(this).prop('checked')){	
			cartMoney = cartMoney + goodsTotalPrice;
		}
	});
	$('#totalMoney').html(cartMoney);
	checkGoodsBuyStatus();
}
function checkGoodsBuyStatus(){
	var cartNum = 0,stockNum = 0,cartId = 0;
	$('.j-gchk').each(function(){
		cartId = $(this).val();
		cartNum = parseInt($('#buyNum_'+cartId).val(),10);
		stockNum = parseInt($(this).attr('sval'),10);;
		if(stockNum < 0 || stockNum < cartNum){
			if($(this).prop('checked')){
				$(this).parent().parent().css('border','2px solid red');
			}else{
				$(this).parent().parent().css('border','0px solid #eeeeee');
				$(this).parent().parent().css('border-bottom','1px solid #eeeeee');
			}
			if(stockNum < 0){
				$('#gchk_'+cartId).attr('allowbuy',0);
				$('#err_'+cartId).css('color','red').html('库存不足');
			}else{
				$('#gchk_'+cartId).attr('allowbuy',1);
				$('#err_'+cartId).css('color','red').html('购买量超过库存');
			}
		}else{
			$('#gchk_'+cartId).attr('allowbuy',10);
			$(this).parent().parent().css('border','0px solid #eeeeee');
			$(this).parent().parent().css('border-bottom','1px solid #eeeeee');
			$('#err_'+cartId).html('');
		}
	});
}
function toSettlement(){
	var isChk = false;
	$('.j-gchk').each(function(){
		if($(this).prop('checked'))isChk = true;
	});
	if(!isChk){
		WST.msg('请选择要结算的商品!',{icon:1});
		return;
	}
	var msg = '';
	$('.j-gchk').each(function(){
		if($(this).prop('checked')){
			if($(this).attr('allowbuy')==0){
				msg = '所选商品库存不足';
				return;
			}else if($(this).attr('allowbuy')==1){
				msg = '所选商品购买量大于商品库存';
				return;
			}
		}
	})
	if(msg!=''){
		WST.msg(msg,{icon:2});
		return;
	}
	location.href=WST.U('home/carts/settlement');
}

function setDeaultAddr(id){
	$.post(WST.U('home/useraddress/setDefault'),{id:id},function(data){
		var json = WST.toJson(data);
		if(json.status==1){
			getAddressList();
			changeAddrId(id);
		}
	});
}


function changeAddrId(id){
	$.post(WST.U('home/useraddress/getById'),{id:id},function(data){
		var json = WST.toJson(data);
		if(json.status==1){
			inEffect($('#addr-'+id),1);
			$('#s_addressId').val(json.data.addressId);
			$('#s_areaId').val(json.data.areaId);


			$("select[id^='area_0_']").remove();
			var areaIdPath = json.data.areaIdPath.split("_");
			$('#area_0').val(areaIdPath[0]);
			var aopts = {id:'area_0',val:areaIdPath[0],childIds:areaIdPath,className:'j-areas'}
			WST.ITSetAreas(aopts);


			WST.setValues(json.data);
		}
	})
}

function delAddr(id){
	WST.confirm({content:'您确定要删除该地址吗？',yes:function(index){
		$.post(WST.U('home/useraddress/del'),{id:id},function(data,textStatus){
		     var json = WST.toJson(data);
		     if(json.status==1){
		    	 WST.msg(json.msg,{icon:1});
		    	 getAddressList();
		     }else{
		    	 WST.msg(json.msg,{icon:2});
		     }
		});
	}});
}

function getAddressList(obj){
	var id = $('#s_addressId').val();
	var load = WST.load({msg:'正在加载记录，请稍后...'});
	$.post(WST.U('home/useraddress/listQuery'),{rnd:Math.random()},function(data,textStatus){
		 layer.close(load);
	     var json = WST.toJson(data);
	     if(json.status==1){
	    	 if(json.data && json.data && json.data.length){
	    		 var html = [],tmp;
	    		 for(var i=0;i<json.data.length;i++){
	    			 tmp = json.data[i];
	    			 var selected = (id==tmp.addressId)?'j-selected':'';
	    			 html.push(
	    					 '<li><div class="wst-frame1 '+selected+'" onclick="javascript:changeAddrId('+tmp.addressId+')" id="addr-'+tmp.addressId+'" >',
	    					 '<p>'+tmp.userName+'('+tmp.userPhone+')</p>',
	    					 '<p>'+tmp.areaName+'&nbsp;'+tmp.userAddress+'</p>',
	    					 '<i></i>'
	    					 )	
	    			html.push('<div class="operate-box">');
	    			html.push('<a href="javascript:void(0)" onclick="javascript:toEditAddress('+tmp.addressId+',this,1,1)">修改</a>');
	    			if(json.data.length>1){
	    				html.push('<a href="javascript:void(0)" onclick="javascript:delAddr('+tmp.addressId+',this)">删除</a></div>');
	    			}
	    			html.push('</div>','</li>');
	    		 }
	    		 html.push('<div class="wst-clear"></div>'); 
	    		 html.push('<a style="color:#1c9eff" onclick="editAddress()" href="javascript:;">收起地址</a>'); 


	    		 $('#addressList').html(html.join(''));
	    	 }else{
	    		 $('#addressList').empty();
	    	 }
	     }else{
	    	 $('#addressList').empty();
	     }
	})
}

function inEffect(obj,n){
	$('div[id^="addr-"]').removeClass('j-selected');
	$(obj).addClass('j-selected');
}
function inEffect1(obj,n){
	$(obj).addClass('j-selected').siblings('.wst-frame'+n).removeClass('j-selected');
}
function editAddress(){
	var isNoSelected = false;
	$('.j-areas').each(function(){
		isSelected = true;
		if($(this).val()==''){
			isNoSelected = true;
			return;
		}
	})
	if(isNoSelected){
		WST.msg('请选择完整收货地址！',{icon:2});
		return;
	}
	layer.close(layerbox);
	var load = WST.load({msg:'正在提交数据，请稍后...'});
	var params = WST.getParams('.j-eipt');
	params.areaId = WST.ITGetAreaVal('j-areas');
	$.post(WST.U('home/useraddress/'+((params.addressId>0)?'toEdit':'add')),params,function(data,textStatus){
		layer.close(load);
		var json = WST.toJson(data);
	     if(json.status==1){
	    	 $('.j-edit-box').hide();
	    	 $('.j-list-box').hide();
	    	 $('.j-show-box').show();
	    	 if(params.addressId==0){
	    		 $('#s_addressId').val(json.data.addressId);
	    	 }else{
	    		 $('#s_addressId').val(params.addressId);
	    	 }
	    	 var areaIds = WST.ITGetAllAreaVals('area_0','j-areas');
	    	 getCartMoney(areaIds[1]);
	    	 var areaNames = [];
	    	 $('.j-areas').each(function(){
	    		 areaNames.push($('#'+$(this).attr('id')+' option:selected').text());
	    	 });
	    	  $("select[id^='area_0_']").remove();
	    	 var html = '<p>'+params.userName+'('+params.userPhone+')</p><p>'+areaNames.join('')+'&nbsp;&nbsp;'+params.userAddress+'</p>';
	    	     html += '<div class="operate-box" style="top:0px;">';
	    	     html += '<a href="javascript:void(0)" onclick="javascript:toEditAddress('+$('#s_addressId').val()+',this,1,1,1)">修改</a></div>'
	    	 	 html +='<i></i>';
	    	 $('#s_userName').html(html);
	     }else{
	    	 WST.msg(json.msg,{icon:2});
	     }
	});
}
var layerbox;
function showEditAddressBox(){
	getAddressList();
	toEditAddress();
}
function emptyAddress(obj,n){
	inEffect(obj,n);
	$('#addressForm')[0].reset();
	$('#s_addressId').val(0);
	$('#addressId').val(0);
	$("select[id^='area_0_']").remove();

	layerbox =	layer.open({
					title:'用户地址',
					type: 1,
					area: ['800px', '300px'],
					content: $('.j-edit-box')
					});
}
function toEditAddress(id,obj,n,flag,type){
	inEffect(obj,n);
	id = (id>0)?id:$('#s_addressId').val();
	$.post(WST.U('home/useraddress/getById'),{id:id},function(data,textStatus){
	     var json = WST.toJson(data);
	     if(json.status==1){
	     	if(flag){
		     	layerbox =	layer.open({
					title:'用户地址',
					type: 1,
					area: ['800px', '300px'], //宽高
					content: $('.j-edit-box')
				});
	     	}
	     	if(type!=1){
				 $('.j-list-box').show();
		    	 $('.j-show-box').hide();
	     	}
	    	 $('input[name="addrUserPhone"]').val(json.data.userPhone);
	    	 if($("select[id^='area_0_']").length>0)return;
	    	 if(id>0){
			    	 var areaIdPath = json.data.areaIdPath.split("_");
			     	 $('#area_0').val(areaIdPath[0]);
			     	 var aopts = {id:'area_0',val:areaIdPath[0],childIds:areaIdPath,className:'j-areas'}
			 		 WST.ITSetAreas(aopts);
	    	 	}
	    	 WST.setValues(json.data);
	     }else{
	    	 WST.msg(json.msg,{icon:2});
	     }
	});
}
function getCartMoney(areaId2){
	var deliverType = $('#deliverType').val();
	if(deliverType==1){
		$('#freight').html('￥0');
		$('#deliverMoney').html(0);
		$('#totalMoney').html($('#totalMoney').attr('v'));
		$('#countMoney').html($('#countMoney').attr('v'));
	}else{
		var load = WST.load({msg:'正在计算运费，请稍后...'});
		$.post(WST.U('home/carts/getCartMoney'),{areaId2:areaId2,rnd:Math.random()},function(data,textStatus){
			layer.close(load);  
			var json = WST.toJson(data);
		     if(json.status==1){
		    	 $('#freight').html('￥'+json.freight);
		 		 $('#countMoney').html(json.total);
		    	 $('#deliverMoney').html(json.freight);
		 		 $('#totalMoney').html(json.total);
		     }
		});
	}
}
function changeDeliverType(n,index,obj){
	changeSelected(n,index,obj);
	var areaId2 = $('#s_areaId').val();
	getCartMoney(areaId2);
}
function submitOrder(){
	var params = WST.getParams('.j-ipt');
	var load = WST.load({msg:'正在提交，请稍后...'});
	$.post(WST.U('home/orders/submit'),params,function(data,textStatus){
		layer.close(load);   
		var json = WST.toJson(data);
	    if(json.status==1){
	    	 WST.msg(json.msg,{icon:1},function(){
	    		 location.href=WST.U('home/orders/succeed','id='+json.data);
	    	 });
	    }else{
	    	WST.msg(json.msg,{icon:2});
	    }
	});
}



WST.showhide = function(t,str,obj){
	var s = str.split(',');
	if(t){
		for(var i=0;i<s.length;i++){
		   $(s[i]).show();
		}
	}else{
		for(var i=0;i<s.length;i++){
		   $(s[i]).hide();
		}
	}
	s = null;
	changeSelected(t,'isInvoice',obj);
}
function changeSelected(n,index,obj){
	$('#'+index).val(n);
	inEffect1(obj,2);
}



function getPayUrl(){
	var params = {};
		params.id = $("#oId").val();
		params.payCode = $.trim($("#payCode").val());
	if(params.payCode==""){
		WST.msg('请先选择支付方式', {icon: 5});
		return;
	}
	jQuery.post(WST.U('home/'+params.payCode+'/get'+params.payCode+"URL"),params,function(data) {
		var json = WST.toJson(data);
		if(json.status==1){
			if(params.payCode=="weixinpays"){
				location.href = json.url;
			}else{
				window.open(json.url);
			}
		}else{
			WST.msg('您的订单已支付!', {icon: 5});
			setTimeout(function(){				
				window.location = WST.U('home/orders/waitReceive');
			},1500);
		}
	});
}