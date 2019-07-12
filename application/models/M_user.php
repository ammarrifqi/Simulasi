<?php
require(ENTITY_DIR  . "UserEntity.php");

class M_user extends CI_Model{
	private $data_db, $user;

	function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

	public function getUserByLogin($username,$pass){
		$this->db->where('username',$username);
		$this->db->where('password',md5($pass));
		$this->data_db = $this->db->get('user')->row_array();
		// $jumlahData = $this->db->get('user')->num_rows();
		// var_dump($this->data_db);
		if(empty($this->data_db)){
			$this->user = null;
		}
		else {
			$this->user = new UserEntity($this->data_db['id_user'],$this->data_db['username'],$this->data_db['password'],
				$this->data_db['level'],$this->data_db['img']);
			$sessionData = array(
				'id' => $this->user->getId(),
				'username' => $this->user->getUsername(),
				'password' => $this->user->getPassword(),
				'level' => $this->user->getLevel(),
				'img' => $this->user->getImg()
				);
			$this->session->set_userdata($sessionData);
		}
		return $this->user;
	}

	public function gantiPassword($id, $pass){
		$this->user = new UserEntity($id, null, md5($pass),null,null);
		$pass = array ('password' => $this->user->getPassword());
		$this->db->where('id_user',$this->user->getId());
		$this->db->update('user',$pass);
	}

	public function hapusUserById($id){
		$this->member = new UserEntity($id,null,null,null,null,null,null);
		$this->db->where('id_user',$this->user->getId());
		$this->db->delete('user');
	}

	public function gantiFoto($img){
		$this->user = new UserEntity($this->session->userdata('id'), null, null, null, 'asset/dist/img/'.$img);
		$foto = array('img'=>$this->user->getImg());
		$this->session->set_userdata('img', $this->user->getImg());
		$this->db->where('id_user',$this->user->getId());
		$this->db->update('user', $foto);
	}

	public function editUser(){
		$this->user = new UserEntity($this->session->userdata('id'),$this->input->post('username'),null,null,null);
		$dataInput= array(
			'username' => $this->user->getUsername(),
			);
		$this->session->set_userdata($dataInput);
		$this->db->where('id_user',$this->user->getId());
		$this->db->update('user',$dataInput);
	}

	public function addUser($img, $level){
		$this->user = new UserEntity($this->input->post('id'),$this->input->post('username'),md5($this->input->post('password')),
				$level,'asset/dist/img/'.$img);
		$dataInput= array(
			'id_user' => $this->user->getId(),
			'username' => $this->user->getUsername(),
			'password' => $this->user->getPassword(),
			'level' => $this->user->getLevel(),
			'img' => $this->user->getImg()
			);
		if($this->session->userdata('level')!=3){
			$sessionData['id']=$this->user->getId();
			$sessionData['username']=$this->user->getUsername();
			$sessionData['password']=$this->user->getPassword();
			$sessionData['img']=$this->user->getImg();
			$sessionData['is_login']=TRUE;
			$sessionData['level']=$this->user->getLevel();
			$this->session->set_userdata($sessionData);
		}

		$this->db->insert('user',$dataInput);
	}

	public function dataUserGizi($bb,$tb,$usia,$jkl,$aktivitas){
		$this->user = new UserEntity(null,null,null,null,null);
		$this->user->setUser($bb,$tb,$usia,$jkl,$aktivitas);
		return  $this->user->getUser();
	}
}