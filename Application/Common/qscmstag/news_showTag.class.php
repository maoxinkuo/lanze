<?php
/**
 * 资讯详情
 */
namespace Common\qscmstag;
defined('THINK_PATH') or exit();
class news_showTag {
	protected $params = array();
	protected $map = array();
    function __construct($options) {
    	$array = array(
    		'列表名'			=>	'listname',
    		'资讯id'			=>	'id'
    	);
    	foreach ($options as $key => $value) {
    		$this->params[$array[$key]] = $value;
    	}
        $this->map['is_display'] = array('eq',1);
        $this->map['id'] = array('eq',intval($this->params['id']));
    	$this->params['listname']=isset($this->params['listname'])?$this->params['listname']:"list";
    }
    public function run(){
        $val = M('Article')->where($this->map)->find();
        if(!$val){
            $controller = new \Common\Controller\BaseController;
            $controller->_empty();
        }
        if(C('SUBSITE_TYPE')) check_url($val['subsite_id']);
        $val['content']=htmlspecialchars_decode($val['content'],ENT_QUOTES);
        if ($val['seo_keywords']=="")
        {
        $val['seo_keywords']=$val['title'];
        }
        if ($val['seo_description']=="")
        {
        $val['seo_description']=cut_str(strip_tags($val['content']),60,0,"");
        }
        $prev = M('Article')->where(array('id'=>array('lt',$val['id']),'type_id'=>array('eq',$val['type_id'])))->order('id desc')->find();
        if(!$prev){
            $val['prev'] = 0;
        }else{
            $val['prev'] = 1;
            $val['prev_title'] = $prev['title'];
            $val['prev_url'] = url_rewrite("QS_newsshow",array('id'=>$prev['id']),$prev['subsite_id']);
        }
        $next = M('Article')->where(array('id'=>array('gt',$val['id']),'type_id'=>array('eq',$val['type_id'])))->order('id asc')->find();
        if(!$next){
            $val['next'] = 0;
        }else{
            $val['next'] = 1;
            $val['next_title'] = $next['title'];
            $val['next_url'] = url_rewrite("QS_newsshow",array('id'=>$next['id']),$next['subsite_id']);
        }
        return $val;
    }
}