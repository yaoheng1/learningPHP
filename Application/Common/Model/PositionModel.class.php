<?php
namespace Common\Model;
use Think\Model;

class PositionModel extends Model{
	private $_db='';
	public function __construct(){
		$this->_db=M('position');
	}
	public function insert($data=array()){
		if (!is_array($data)||!$data) {
			return 0;
			# code...
		}
		$data['create_time']=time();
		return $this->_db->add($data);

	}
	public function select($data=array()){
		$conditions = $data;
		$list = $this->_db->where($conditions)->order('id')->select();
		return $list;
    }
	public function find($id){
		return $this->_db->where('position='.$id)->find();
	}
	public function updateById($id,$data){
		if(!$id || !is_numeric($id)){
            throw_exception("ID不合法");
        }
        if (!$data || !is_array($data)) {
            throw_exception("更新数据不合法");
        }

        return $this->_db->where('id='.$id)->save($data);
	}
	public function getNormalPosition(){
		$conditions = array('status' => 1, );
		$list = $this->_db->where($conditions)->order('id')->select();
		return $list;
	}
}