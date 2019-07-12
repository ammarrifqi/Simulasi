<?php
require(ENTITY_DIR  . "DokterEntity.php");

class M_dokter extends CI_Model{
	private $data_db, $indeks, $dokter;

	// function __construct(){
 //        parent::__construct();
 //    }

	public function dokterById($id){
		$this->db->where('id_dokter',$id);
		$this->data_db = $this->db->get('dokter')->row_array();
		$this->dokter = new DokterEntity($this->data_db['id_dokter'],$this->data_db['nama'],$this->data_db['ttl'],$this->data_db['pendidikan'],
			$this->data_db['kota'],$this->data_db['status'],$this->data_db['jenis_kl'],$this->data_db['img']);
		// $this->member->setId($this->data_db['id_member']);
		// $this->member->setNama($this->data_db['nama']);
		// $this->member->setTtl($this->data_db['ttl']);
		// $this->member->setJenis_kl($this->data_db['jenis_kl']);
		// $this->member->setNo_telp($this->data_db['no_telp']);
		// $this->member->setAlamat($this->data_db['alamat']);
		// $this->member->setImg($this->data_db['img']);
		
		return $this->dokter;

	}

	public function allDokter(){
		$this->data_db = $this->db->get('dokter')->result_array();
		$this->indeks = 0;
		foreach ($this->data_db as $d) {
			$this->dokter[$this->indeks] = new DokterEntity($d['id_dokter'],$d['nama'],$d['ttl'],$d['pendidikan'],
				$d['kota'],$d['status'],$d['jenis_kl'],$d['img']);
			$this->indeks++;
		}
		return $this->dokter;
	}

	public function cari($search){
		$query = "SELECT * FROM dokter WHERE nama LIKE '%$search%' OR kota LIKE '%$search%'";
		// $this->db->like('nama',$search,'both');
		// $this->db->like('kota',$search,'both');
		$this->data_db = $this->db->query($query)->result_array();
		$this->indeks = 0;
		foreach ($this->data_db as $d) {
			$this->dokter[$this->indeks] = new DokterEntity($d['id_dokter'],$d['nama'],$d['ttl'],$d['pendidikan'],
				$d['kota'],$d['status'],$d['jenis_kl'],$d['img']);
			$this->indeks++;
		}
		return $this->dokter;
	}

	public function dokterByKonsul($id){
		$this->data_db = $this->db->query("SELECT * FROM dokter d JOIN konsultasi k 
			ON (k.penerima=d.id_dokter) WHERE k.pengirim='$id' 
			GROUP BY k.penerima ORDER BY k.time DESC");
		$this->indeks = 0;
		foreach ($this->data_db->result_array() as $d) {
			$this->dokter[$this->indeks] = new DokterEntity($d['id_dokter'],$d['nama'],$d['ttl'],$d['pendidikan'],
				$d['kota'],$d['status'],$d['jenis_kl'],$d['img']);
			$this->dokter[$this->indeks]->setTime($d['time']);
			$this->indeks++;
		}
		return $this->dokter;
	}

	public function addDokter($img){
		$this->dokter = new DokterEntity($this->input->post('id'), $this->input->post('nama'), $this->input->post('ttl'), $this->input->post('pendidikan'),
			$this->input->post('kota'), "Tidak Aktif", $this->input->post('jkl'), 'asset/dist/img/'.$img);
		$dataInput= array(
			'id_dokter' => $this->dokter->getId(),
			'nama' => $this->dokter->getNama(),
			'ttl' => $this->dokter->getTtl(),
			'pendidikan' => $this->dokter->getPendidikan(),
			'kota' => $this->dokter->getKota(),
			'status' => $this->dokter->getStatus(),
			'jenis_kl' => $this->dokter->getJenis_kl(),
			'img' => $this->dokter->getImg()
			);
		$this->db->insert('dokter',$dataInput);
	}

	public function gantiFoto($img){
		$this->dokter = new DokterEntity($this->session->userdata('id'), null, null, null,
			null, null, null,'asset/dist/img/'.$img);
		$foto = array('img'=>$this->dokter->getImg());
		$this->db->where('id_dokter',$this->dokter->getId());
		$this->db->update('dokter', $foto);
	}

	public function editDokter(){
		$this->dokter = new DokterEntity($this->session->userdata('id'), $this->input->post('fullname'), $this->input->post('ttl'), $this->input->post('pendidikan'),
			$this->input->post('kota'), null,null, null);
		
		$dataInput= array(
			'nama' => $this->dokter->getNama(),
			'ttl' => $this->dokter->getTtl(),
			'pendidikan' => $this->dokter->getPendidikan(),
			'kota' => $this->dokter->getKota()
			);
		$this->session->set_userdata($dataInput);

		$this->db->where('id_dokter',$this->dokter->getId());
		$this->db->update('dokter',$dataInput);
	}

	public function updateStatus($status){
		$this->dokter = new DokterEntity($this->session->userdata('id'), null, null, null,
			null, $status,null, null);
		$dataStatus = array('status' => $this->dokter->getStatus());
		$this->db->where('id_dokter',$this->dokter->getId());
		$this->db->update('dokter',$dataStatus);
	}

}