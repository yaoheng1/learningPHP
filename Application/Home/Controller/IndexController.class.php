<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//获取首页大图数据
    	$topPicNews = D('PositionContent')->select(array('status'=>1,'position_id'=>1),1);
        //首页三张小图
        $topSmailNews = D('PositionContent')->select(array('status'=>1,'position_id'=>1),3);
        
    	$this->assign('result',array(
    		'topPicNews' => $topPicNews,
    		'topSmailNews' => $topSmailNews,


    		));
        $this->display();
    }
}