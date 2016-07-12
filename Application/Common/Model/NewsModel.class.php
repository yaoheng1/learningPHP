<?php
namespace Common\Model;
use Think\Model;

class NewsModel extends Model{
	private $_db='';
	public function __construct(){
		$this->_db=M('news');
	}
	public function insert($data=array()){
		if (!is_array($data)||!$data) {
			return 0;
			# code...
		}
		$data['create_time']=time();
		$data['username']= getLoginUsername();
		return $this->_db->add($data);

	}
	public function getNews($data,$page,$pageSize){
    	$conditions = $data;
    	if(isset($data['title']) && $data['title']){
    		$conditions['title'] =array('like','%'.$data['title'].'%');

    	}
    	if(isset($data['catid']) && $data['catid']){
    		$conditions['catid'] = intval($data['catid']);
    	}
    	$offset =($page - 1) * $pageSize; //起始位置
    	$list   =$this->_db->where($conditions)->order('listorder desc,news_id desc')->limit($offset,$pageSize)->select();
        return $list;
    }
    public function getNewsCount($data=array()){
        $conditions = $data;
    	if(isset($data['title']) && $data['title']){
    		$conditions['title'] =array('like','%'.$data['title'].'%');

    	}
    	if(isset($data['catid']) && $data['catid']){
    		$conditions['catid'] = intval($data['catid']);
    	}
        return $this->_db->where($conditions)->count();
    }
	public function find($id){
		$data = $this->_db->where('news_id='.$id)->find();
		return $data;
	}

    public function updateById($id,$data){
        if(!$id || !is_numeric($id)){
            throw_exception("ID不合法");
        }
        if (!$data || !is_array($data)) {
            throw_exception("更新数据不合法");
        }

        return $this->_db->where('news_id='.$id)->save($data);
    }
    public function updateStatusById($id,$status){
        if(!$id||!is_numeric($id)){
            throw_exception('id不合法');
        }
        if(!is_numeric($status)){
            throw_exception('status不合法');
        }
        $data['status'] = $status;
        return $this->_db->where('news_id='.$id)->save($data);
    }
    public function updateListorderById($id,$listorder){
        if(!$id||!is_numeric($id)){
            throw_exception('id不合法');
        }

        $data = array(
            'listorder' => intval($listorder),
        );

        return $this->_db->where('news_id='.$id)->save($data);
    }
    public function getNewsByNewsIdIn($newsId){
        if (!is_array($newsId)){
            throw_exception("参数不合法");           
        }
        $data = array(
            'news_id' =>array('in',implode(',',$newsId) ),
            );
        return $this->_db->where($data)->select();
    }
}