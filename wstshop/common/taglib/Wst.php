<?php
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
 */
namespace wstshop\common\taglib;
use think\template\TagLib;
class Wst extends TagLib{
    /**
     * 定义标签列表
     */
    protected $tags   =  [
        'friendlink' => ['attr' => 'num,key,id,cache'],
        'ads' => ['attr' => 'code,num,key,id,cache'],
        'article' => ['attr' => 'cat,num,key,id,cache'],
        'goods' => ['attr' => 'type,cat,num,key,id,cache'],
        'brand' => ['attr' => 'cat,num,key,id,cache']
    ];

    /**
     * 商品数据调用    
     *  type:推荐/新品/热销/精品/浏览历史/看了又看/好评推荐  - recom/new/hot/best/history/visit/appraise
     *   cat:商品分类
     *   num:获取记录数量
     * cache:缓存时间
     *   key:序号
     *    id:循环中定义的元素变量
     * {wst:goods type='hot' cat='1' num='6'}{/wst:goods}
     */
    public function tagGoods($tag, $content){
    	$type   = $tag['type'];
    	$catId  = isset($tag['cat'])?$tag['cat']:0;
        $flag     = substr($catId, 0, 1);
        if (':' == $flag) {
            $catId = $this->autoBuildVar($catId);
            $parseStr .= '$_result=' . $catId . ';';
            $catId = '$_result';
        } else {
            $catId = $this->autoBuildVar($catId);
        }
    	
    	$id     = isset($tag['id'])?$tag['id']:'vo';
        $num    = isset($tag['num'])?(int)$tag['num']:0;
        $cache  = isset($tag['cache'])?$tag['cache']:0;
        $key    = isset($tag['key'])?$tag['key']:'key';
        $parse  = '<?php ';
        $parse .= '$wstTagGoods =  model("Tags")->listGoods("'.$type.'",'.$catId.','.$num.','.$cache.'); ';
        $parse .= 'foreach($wstTagGoods as $'.$key.'=>$'.$id.'){';
        $parse .= '?>';
        $parse .= $content;
        $parse .= '<?php } ?>';
        return $parse;
    }
    /**
     * 广告数据调用
     *   num:获取记录数量
     * cache:缓存时间
     *   key:序号
     *    id:循环中定义的元素变量
     * {wst:friendlink num='6'}{/wst:ads} 
     */
    public function tagFriendlink($tag, $content){
    	$id     = isset($tag['id'])?$tag['id']:'vo';
        $num    = isset($tag['num'])?(int)$tag['num']:99;
        $cache  = isset($tag['cache'])?$tag['cache']:0;
        $key    = isset($tag['key'])?$tag['key']:'key';
        $parse  = '<?php ';
        $parse .= '$wstTagFriendlink =  model("Tags")->listFriendlink('.$num.','.$cache.'); ';
        $parse .= 'foreach($wstTagFriendlink as $'.$key.'=>$'.$id.'){';
        $parse .= '?>';
        $parse .= $content;
        $parse .= '<?php } ?>';
        return $parse;
    }
    
    /**
     * 广告数据调用
     *  code:广告代码
     *   num:获取记录数量
     * cache:缓存时间
     *   key:序号
     *    id:循环中定义的元素变量
     * {wst:ads code='1' cat='1' num='6'}{/wst:ads} 
     */
    public function tagAds($tag, $content){
    	$code   = $tag['code'];
    	$id     = isset($tag['id'])?$tag['id']:'vo';
        $num    = isset($tag['num'])?(int)$tag['num']:99;
        $cache  = isset($tag['cache'])?$tag['cache']:0;
        $key    = isset($tag['key'])?$tag['key']:'key';
        $parse  = '<?php ';
        $parse .= '$wstTagAds =  model("Tags")->listAds("'.$code.'",'.$num.','.$cache.'); ';
        $parse .= 'foreach($wstTagAds as $'.$key.'=>$'.$id.'){';
        $parse .= '?>';
        $parse .= $content;
        $parse .= '<?php } ?>';
        return $parse;
    }
    
    /**
     * 文章数据调用
     *   cat:文章分类ID 或者 'new'
     *   num:获取记录数量
     * cache:缓存时间
     *   key:序号
     *    id:循环中定义的元素变量
     * {wst:article cat='1' num='6'}{/wst:article} 
     */
    public function tagArticle($tag, $content){
    	$cat   = $tag['cat'];
    	$id     = isset($tag['id'])?$tag['id']:'vo';
        $num    = isset($tag['num'])?(int)$tag['num']:99;
        $cache  = isset($tag['cache'])?$tag['cache']:0;
        $key    = isset($tag['key'])?$tag['key']:'key';
        $parse  = '<?php ';
        $parse .= '$wstTagArticle =  model("Tags")->listArticle("'.$cat.'",'.$num.','.$cache.'); ';
        $parse .= 'foreach($wstTagArticle as $'.$key.'=>$'.$id.'){';
        $parse .= '?>';
        $parse .= $content;
        $parse .= '<?php } ?>';
        return $parse;
    }

    /**
     * 品牌数据调用
     *   cat:分类ID
     *   num:获取记录数量
     * cache:缓存时间
     *   key:序号
     *    id:循环中定义的元素变量
     * {wst:brand cat='1' num='6'}{/wst:brand} 
     */
    public function tagBrand($tag, $content){
        $cat   = $tag['cat'];
        $id     = isset($tag['id'])?$tag['id']:'vo';
        $num    = isset($tag['num'])?(int)$tag['num']:99;
        $cache  = isset($tag['cache'])?$tag['cache']:0;
        $key    = isset($tag['key'])?$tag['key']:'key';
        $parse  = '<?php ';
        $parse .= '$wstTagBrand =  model("Tags")->listBrand('.$cat.','.$num.','.$cache.'); ';
        $parse .= 'foreach($wstTagBrand as $'.$key.'=>$'.$id.'){';
        $parse .= '?>';
        $parse .= $content;
        $parse .= '<?php } ?>';
        return $parse;
    }
}