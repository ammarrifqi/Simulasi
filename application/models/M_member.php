<?php

require(ENTITY_DIR  . "MemberEntity.php");

class M_member extends CI_Model{
	private $data_db, $indeks, $member;

	// function __construct(){
 //        parent::__construct();
 //        $this->load->library('session');
 //    }

	public function memberById($id){
		$this->db->where('id_member',$id);
		$this->data_db = $this->db->get('member')->row_array();
		$this->member = new MemberEntity($this->data_db['id_member'],$this->data_db['nama'],$this->data_db['ttl'],$this->data_db['jenis_kl'],
			$this->data_db['no_telp'],$this->data_db['alamat'],$this->data_db['img']);
		// $this->member->setId($this->data_db['id_member']);
		// $this->member->setNama($this->data_db['nama']);
		// $this->member->setTtl($this->data_db['ttl']);
		// $this->member->setJenis_kl($this->data_db['jenis_kl']);
		// $this->member->setNo_telp($this->data_db['no_telp']);
		// $this->member->setAlamat($this->data_db['alamat']);
		// $this->member->setImg($this->data_db['img']);

		return $this->member;
	}

	public function gantiFoto($img){
		$this->member = new MemberEntity($this->session->userdata('id'), null, null, null,
			null, null, 'asset/dist/img/'.$img);
		$foto = array('img'=>$this->member->getImg());
		$this->db->where('id_member',$this->member->getId());
		$this->db->update('member', $foto);
	}

	public function allMember(){
		$this->data_db = $this->db->get('member')->result_array();
		$this->indeks = 0;
		foreach ($this->data_db as $m) {
			$this->member [$this->indeks]= new MemberEntity($m['id_member'],$m['nama'],$m['ttl'],$m['jenis_kl'],
				$m['no_telp'],$m['alamat'],$m['img']);
			$this->indeks++;
		}
		return $this->member;
	}

	public function search($search){
		$this->db->like('nama',$search,'both');
		$this->data_db = $this->db->get('member')->result_array();
		$this->indeks = 0;
		foreach ($this->data_db as $m) {
			$this->member [$this->indeks]= new MemberEntity($m['id_member'],$m['nama'],$m['ttl'],$m['jenis_kl'],
				$m['no_telp'],$m['alamat'],$m['img']);
			$this->indeks++;
		}
		return $this->member;
	}

	public function searchMemberByKonsul($search){
		$id = $this->session->userdata('id');
		$this->data_db = $this->db->query("SELECT * FROM member m JOIN konsultasi k 
			ON (k.pengirim=m.id_member) WHERE k.penerima='$id' AND m.nama LIKE '%$search%'
			GROUP BY k.pengirim ORDER BY k.time DESC");
		$this->indeks = 0;
		foreach ($this->data_db->result_array() as $m) {
			$this->member [$this->indeks]= new MemberEntity($m['id_member'],$m['nama'],$m['ttl'],$m['jenis_kl'],
				$m['no_telp'],$m['alamat'],$m['img']);
			$this->member[$this->indeks]->setTime($m['time']);
			$this->indeks++;
		}
		return $this->member;
	}


	public function hapusMemberById($id){
		$this->member = new MemberEntity($id,null,null,null,null,null,null);
		$this->db->where('id_member',$this->member->getId());
		$this->db->delete('member');
	}

	public function editMember(){
		$this->member = new MemberEntity($this->session->userdata('id'),$this->input->post('fullname'),$this->input->post('ttl'),
			$this->input->post('jkl'),$this->input->post('no'),$this->input->post('alamat'),null);
		$dataInput= array(
			'nama' => $this->member->getNama(),
			'ttl' => $this->member->getTtl(),
			'no_telp' => $this->member->getNo_telp(),
			'alamat' => $this->member->getAlamat()
			);
		$this->session->set_userdata($dataInput);
		$this->db->where('id_member',$this->member->getId());
		$this->db->update('member',$dataInput);
	}

	public function memberByKonsul($id){
		$this->data_db = $this->db->query("SELECT * FROM member m JOIN konsultasi k 
			ON (k.pengirim=m.id_member) WHERE k.penerima='$id' 
			GROUP BY k.pengirim ORDER BY k.time DESC");
		$this->indeks = 0;
		foreach ($this->data_db->result_array() as $m) {
			$this->member [$this->indeks]= new MemberEntity($m['id_member'],$m['nama'],$m['ttl'],$m['jenis_kl'],
				$m['no_telp'],$m['alamat'],$m['img']);
			$this->member[$this->indeks]->setTime($m['time']);
			$this->indeks++;
		}
		return $this->member;
	}
	public function addMember(){
		$this->member = new MemberEntity($this->input->post('id'),$this->input->post('fullname'),$this->input->post('ttl'),
			$this->input->post('jkl'),$this->input->post('no'),$this->input->post('alamat'),'asset/dist/img/foto-default.png');
		$dataInput= array(
			'id_member' => $this->member->getId(),
			'nama' => $this->member->getNama(),
			'ttl' => $this->member->getTtl(),
			'jenis_kl' => $this->member->getJenis_kl(),
			'no_telp' => $this->member->getNo_telp(),
			'alamat' => $this->member->getAlamat(),
			'img' => $this->member->getImg()
			);
		$this->db->insert('member',$dataInput);
	}


}