<?php
namespace wstshop\admin\model;
/**
 * ============================================================================
 * WSTShop网上商店
 * 版权所有 2016-2066 广州商淘信息科技有限公司，并保留所有权利。
 * 官网地址:http://www.wstshop.net
 * 交流社区:http://bbs.shangtao.net
 * 联系QQ:153289970
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！未经本公司授权您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * 推荐业务处理
 */
use think\Db;
class Recommends extends Base{
	/**
	 * 获取已推荐商品
	 */
	public function listQueryByGoods(){
		$dataType = (int)input('post.dataType');
	    $goodsCatId = (int)input('post.goodsCatId');
		$rs = $this->alias('r')->join('__GOODS__ g','r.dataId=g.goodsId','inner')
		           ->where(['dataSrc'=>0,'dataType'=>$dataType,'r.goodsCatId'=>$goodsCatId])
		           ->field('dataId,goodsName,goodsSn,dataSort,isSale,g.dataFlag')->order('dataSort asc')->select();
		$data = [];
		foreach ($rs as $key => $v){
			if($v['isSale']!=1 || $v['dataFlag']!=1)$v['invalid'] = true;
			$data[] = $v;
		}   
		return $data;        
	}
	/**
	 * 推荐商品
	 */
    public function editGoods(){
	    $ids = input('post.ids');
	    $dataType = (int)input('post.dataType');
	    $goodsCatId = (int)input('post.goodsCatId');
	    if($ids=='')return WSTReturn("请选择要推荐的商品");
	    $ids = explode(',',$ids);
	    //查看商品是否有效
	    $rs = Db::name('goods')->where(['dataFlag'=>1,'goodsId'=>['in',$ids]])->field('goodsId')->select();
	    if(!$rs)return WSTReturn("请选择要推荐的商品");
	    Db::startTrans();
	    try{
		    $this->where(['dataSrc'=>0,'dataType'=>$dataType,'goodsCatId'=>$goodsCatId])->delete();
		    $data = [];
		    foreach ($rs as $key => $v){
		    	$tmp = [];
		    	$tmp['goodsCatId'] = $goodsCatId;
		    	$tmp['dataSrc'] = 0;
		    	$tmp['dataType'] = $dataType;
		    	$tmp['dataId'] = $v['goodsId'];
		    	$tmp['dataSort'] = (int)input('post.ipt'.$v['goodsId']);
		    	$data[] = $tmp;
		    }
		    $this->saveAll($data);
		    Db::commit();
	        return WSTReturn("提交成功", 1);
	    }catch(\Exception $e) {
            Db::rollback();
            return WSTReturn('提交失败',-1);
        }
	}
	
	
    /**
	 * 获取已推荐品牌
	 */
	public function listQueryByBrands(){
		$dataType = (int)input('post.dataType');
	    $goodsCatId = (int)input('post.goodsCatId');
		$rs = $this->alias('r')->join('__BRANDS__ s','r.dataId=s.brandId','inner')
		           ->where(['dataSrc'=>2,'dataType'=>$dataType,'r.goodsCatId'=>$goodsCatId])
		           ->field('dataId,brandName,dataSort,dataFlag')->order('dataSort asc')->select();
		$data = [];
		foreach ($rs as $key => $v){
			if($v['dataFlag']!=1)$v['invalid'] = true;
			$data[] = $v;
		}   
		return $data;        
	}
    /**
	 * 推荐品牌
	 */
    public function editBrands(){
	    $ids = input('post.ids');
	    $dataType = (int)input('post.dataType');
	    $goodsCatId = (int)input('post.goodsCatId');
	    if($ids=='')return WSTReturn("请选择要推荐的品牌");
	    $ids = explode(',',$ids);
	    //查看商品是否有效
	    $rs = Db::name('brands')->where(['dataFlag'=>1,'brandId'=>['in',$ids]])->field('brandId')->select();
	    if(!$rs)return WSTReturn("请选择要推荐的品牌");
	    Db::startTrans();
	    try{
		    $this->where(['dataSrc'=>2,'dataType'=>$dataType,'goodsCatId'=>$goodsCatId])->delete();
		    $data = [];
		    foreach ($rs as $key => $v){
		    	$tmp = [];
		    	$tmp['goodsCatId'] = $goodsCatId;
		    	$tmp['dataSrc'] = 2;
		    	$tmp['dataType'] = $dataType;
		    	$tmp['dataId'] = $v['brandId'];
		    	$tmp['dataSort'] = (int)input('post.ipt'.$v['brandId']);
		    	$data[] = $tmp;
		    }
		    $this->saveAll($data);
		    Db::commit();
	        return WSTReturn("提交成功", 1);
	    }catch(\Exception $e) {
            Db::rollback();
            return WSTReturn('提交失败',-1);
        }
	}
}
