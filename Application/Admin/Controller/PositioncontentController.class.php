<?php
/**
 * 推荐位内容管理相关
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class PositioncontentController extends Controller {
    
    public function index(){
        $positions = D('Position')->getNormalPosition();
        //获取推荐位内容
        $data['status'] = array('neq',-1);
        if($_GET['title']){
        	$data['title'] = trim($_GET['title']);
        	$this->assign('title',$data['title']);
        }
        $data['position_id'] = $_GET['position_id'] ? intval($_GET['position_id']) : $positions[0]['id'];
        $contents = D('PositionContent')->select($data);
        $this->assign('positionId',$data['position_id']);
        $this->assign('contents',$contents);
        $this->assign('positions',$positions);
    	$this->display();
    }
    public function add(){
    	if($_POST){
    		if (!isset($_POST['position_id']) || !$_POST['position_id'])  {
    			return show(0,'推荐位id不能为空');
    		}
    		if (!isset($_POST['title']) || !$_POST['title'])  {
    			return show(0,'推荐位标题不能为空');
    		}
    		if (!isset($_POST['url']) && !$_POST['news_id'])  {
    			return show(0,'url和文章id不能同时为空');
    		}
    		if (!isset($_POST['thumb']) || !$_POST['thumb'])  {
    			if ($_POST['news_id']) {
    				$res = D('News')->find($_POST['news_id']);
    				if ($ret && is_array($res)) {
    					$_POST['thumb'] = $res['thumb'];
    				}else{
    					return show(0,'图片不能为空');
    				}
    				# code...
    			}
    		}
    		try{
               $id = D('PositionContent')->insert($_POST);
               if ($id) {
               	return show(1,'新增成功');
               }
               return show(0,'新增失败');
    		}catch(Exception $e){
    			return show(0,$e->getmessage());

    		}

    	}else{
    	$positions = D('Position')->getNormalPosition();
    	$this->assign('positions',$positions);
    	$this->display();
        }
    }

}