<?php
namespace Common\Model;
use Think\Model;

/**
 * 反馈管理操作
 * @author  singwa
 */
class FeedbackModel extends Model {

	private $_db = '';

	public function __construct() {
		$this->_db = M('feedback');
	}

    public function getFeedBackByFdId($fdId=0) {
        $res = $this->_db->where('fb_id='.$fdId)->find();
        return $res;
    }

    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    public function getFeedbacks($data,$page,$pageSize=10) {
        $conditions = $data;
        if(isset($data['content']) && $data['content']) {
            $conditions['content'] = array('like','%'.$data['content'].'%');
        }
        $conditions['status'] = array('neq',-1);
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($conditions)
            ->order('create_time desc ,fb_id desc')
            ->limit($offset,$pageSize)
            ->select();
        return $list;
    }

    public function getFeedbackCount($data = array()){
        $conditions = $data;
        if(isset($data['content']) && $data['content']) {
            $conditions['content'] = array('like','%'.$data['content'].'%');
        }
        $conditions['status'] = array('neq',-1);
        return $this->_db->where($conditions)->count();
    }


    /**
     * 通过id更新的状态
     * @param $id
     * @param $status
     * @return bool
     */
    public function updateStatusById($id, $status) {
        if(!is_numeric($status)) {
            throw_exception("status不能为非数字");
        }
        if(!$id || !is_numeric($id)) {
            throw_exception("ID不合法");
        }
        $data['status'] = $status;
        return  $this->_db->where('fb_id='.$id)->save($data); // 根据条件更新记录

    }

}
