<?php
namespace Common\Model;
use Think\Model;

class NewsContentModel extends Model{
	private $_db='';
	public function __construct(){
		$this->_db=M('news_content');
	}
	public function insert($data=array()){
		if (!is_array($data)||!$data) {
			return 0;
			# code...
		}
		$data['create_time']=time();
		if(isset($data['content']) && $data['content']){
			$data['content']=htmlspecialchars($data['content']);
		}
		return $this->_db->add($data);
    }
	public function find($id){
		return $this->_db->where('news_id='.$id)->find();
	}
	public function updateNewsById($id,$data){
		if(!$id || !is_numeric($id)){
            throw_exception("ID不合法");
        }
        if (!$data || !is_array($data)) {
            throw_exception("更新数据不合法");
        }
		if(isset($data['content']) && $data['content']){
			$data['content']=htmlspecialchars($data['content']);
		}
        return $this->_db->where('news_id='.$id)->save($data);
	}
	/**
	 * [updateStatusById description]
	 * @param  [type] $id     [description]
	 * @param  [type] $status [description]
	 * @return [type]         [description]
	 */
	// public function updateStatusById($id,$status){
 //        if(!$id||!is_numeric($id)){
 //            throw_exception('id不合法');
 //        }
 //        if(!$status||!is_numeric($status)){
 //            throw_exception('status不合法');
 //        }
 //        $data['status'] = $status;
 //        return $this->_db->where('menu_id='.$id)->save($data);
 //    }
}