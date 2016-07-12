<?php
/**
 * 推荐位相关
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class PositionController extends Controller {
    
    public function index(){
        $data = array();
    	//分页
    	// $page =$_REQUEST['p'] ? $_REQUEST['p']:1;
        // $pageSize =$_REQUEST['pageSize'] ? $_REQUEST['pageSize']:5;
        $Positions = D("Position")->select($data);
        // $PositionsCount = D("Position")->getPositionsCount($data);
        //think自带分页
        // $res = new \Think\Page($PositionsCount,$pageSize);
        // $pageRes =$res->show();
        // $this->assign('pageRes',$pageRes);
        $this->assign('positions',$Positions);
        $this->display();
    }
    public function add(){
        if($_POST){

            if(!isset($_POST['name'])||!$_POST['name']){
                return show(0,'推荐位名称不能为空');
            }
            if(!isset($_POST['description'])||!$_POST['description']){
                return show(0,'描述不能为空');
            }
            if ($_POST['id']) {
                return $this->save($_POST);
            }
            $positionId = D('Position')->insert($_POST);

            if($positionId){
                return show(1,'添加成功',$positionId);
            }
            return show(0,'添加失败',$positionId);

        }else{
            $this->display();
        }
    }
   public function save($data){
        $positionId = $data['id'];
        unset($data['id']);
        try {
            $id = D('Position')->updateById($positionId,$data);
            if($id === false){
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        } catch (Exception $e) {
            return show(0,$e->getMessage());
            
        }

    }
    public function edit(){
        $positionId= $_GET['id'];
        $position = D("position")->find($positionId);
        $this->assign('position',$position);
        $this->display();
    }
}