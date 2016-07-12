<?php
namespace Common\Model;
use Think\Model;

class PositionContentModel extends Model{
	private $_db='';
	public function __construct(){
		$this->_db=M('position_content');
	}
	public function insert($data=array()){
		if (!is_array($data)||!$data) {
			return 0;
			# code...
		}
		return $this->_db->add($data);

	}
	public function select($data = array(),$limit = 0){
		
		if ($data['title']) {
			$data['title'] = array('like','%'.$data['title'].'%');
		}
		$this->_db->where($data)->order('listorder desc,id desc');
		if($limit){
			$this->_db->limit($limit);
		}
		$list = $this->_db->select();
		return $list;
	}
}