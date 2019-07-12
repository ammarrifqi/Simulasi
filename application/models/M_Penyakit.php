<?php
require(ENTITY_DIR  . "GejalaPenyakitEntity.php");
require(ENTITY_DIR  . "RulePenyakitEntity.php");
require(ENTITY_DIR  . "JenisPenyakitEntity.php");

class M_Penyakit extends CI_Model{
	private $data_db, $indeks, $gjlPenyakit, $jenisPenyakit, $rulePnykt;

	// function __construct(){
 //        parent::__construct();
 //        $this->load->library('session');
 //    }

	public function gejalaByJenis($jenis){
		$this->db->where('id_jenis',$jenis);
		$this->data_db = $this->db->get('gejala_penyakit');
		$this->indeks=0;
		foreach ($this->data_db->result_array() as $gp) {
			$this->gjlPenyakit[$this->indeks] = new GejalaPenyakitEntity($gp['id'],$gp['kode'],$gp['id_jenis'],$gp['gejala']);
			$this->indeks++;
		}
		return $this->gjlPenyakit;

	}

	public function jumlahGejala ($jenis){
		$this->db->where('id_jenis',$jenis);
		return $this->db->get('gejala_penyakit')->num_rows();
	}

	public function getAllJenisPenyakit(){
		$this->data_db = $this->db->get('jenis_penyakit');
		$this->indeks=0;
		$this->jenisPenyakit=null;
		foreach ($this->data_db->result_array() as $jp) {
			$this->jenisPenyakit [$this->indeks] = new JenisPenyakitEntity($jp['id_jenis'],$jp['jenis'],$jp['deskripsi'],$jp['image']);
			$this->indeks++;
		}
		return $this->jenisPenyakit;
	}

	public function getPenyakitByJenis($idJP){
		$query = "SELECT penyakit FROM `rule_penyakit` WHERE id_jenis = '$idJP' GROUP BY penyakit";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function editGejala($id, $idJP,$penyakit, $kode, $gejala,$densitas){
		$this->rulePnykt = new RulePenyakitEntity($id,$idJP,$penyakit,$kode,$gejala,$densitas);
		$this->data_db = array(
			'gejala' => $this->rulePnykt->getGejala(),
			'densitas'=> $this->rulePnykt->getDensitas()
			);
		$this->db->where('id',$this->rulePnykt->getId());
		$this->db->where('id_jenis',$this->rulePnykt->getId_jenis());
		$this->db->update('rule_penyakit', $this->data_db);
		$this->gjlPenyakit = new GejalaPenyakitEntity(null, $idJP, $kode,$gejala);
		$this->data_db = array('gejala'=>$this->gjlPenyakit->getGejala());
		$this->db->where('kode',$this->gjlPenyakit->getKode());
		$this->db->update('gejala_penyakit',$this->data_db);
	}

	public function tambahJP($img,$jp,$deskripsi){
		$img = 'asset/dist/img/'.$img;
		$this->jenisPenyakit = new JenisPenyakitEntity(null, $jp,$deskripsi,$img);
		$this->data_db = array(
			'jenis' => $this->jenisPenyakit->getJenis(),
			'deskripsi' => $this->jenisPenyakit->getDeskripsi(),
			'image' => $this->jenisPenyakit->getImg()
			);
		$this->db->insert('jenis_penyakit',$this->data_db);
	}

	public function editJP($img,$id,$jp,$deskripsi){
		$this->jenisPenyakit = new JenisPenyakitEntity($id, $jp,$deskripsi,'asset/dist/img/'.$img);
		if($img=="info-default.jpg"){
			$this->data_db = array(
				'jenis' => $this->jenisPenyakit->getJenis(),
				'deskripsi' => $this->jenisPenyakit->getDeskripsi()
				);
		} else{
			$this->data_db = array(
				'jenis' => $this->jenisPenyakit->getJenis(),
				'deskripsi' => $this->jenisPenyakit->getDeskripsi(),
				'image' => $this->jenisPenyakit->getImg()
				);
		}
		$this->db->where('id_jenis',$this->jenisPenyakit->getId());
		$this->db->update('jenis_penyakit',$this->data_db);
	}

	public function tambahGejala($idJP,$penyakit, $kode, $gejala,$densitas){
		$this->rulePnykt = new RulePenyakitEntity(null,$idJP,$penyakit,$kode, $gejala,$densitas);
		$this->data_db = array(
			'id_jenis' => $this->rulePnykt->getId_jenis(),
			'penyakit' => $this->rulePnykt->getPenyakit(),
			'kode_gjl' => $this->rulePnykt->getKode(),
			'gejala' => $this->rulePnykt->getGejala(),
			'densitas'=> $this->rulePnykt->getDensitas()
			);
		$this->db->insert('rule_penyakit',$this->data_db);
		$allGejala = $this->gejalaByJenis($this->rulePnykt->getId_jenis());
		$this->gjlPenyakit = new GejalaPenyakitEntity(null, $kode, $idJP,$gejala);
		$found = false;
		$id_gjl="";
		foreach ($allGejala as $gjl) {
			if($gjl->getKode() == $this->gjlPenyakit->getKode()){
				$found = true;
				$id_gjl=$gjl->getId();
			}
		}
		if($found){
			$this->data_db = array ('gejala'=>$this->gjlPenyakit->getGejala());
			$this->db->where('id_jenis', $this->gjlPenyakit->getId_jenis());
			$this->db->where('kode', $this->gjlPenyakit->getKode());
			$this->db->update('gejala_penyakit',$this->data_db);
		} else{
			$this->data_db = array (
				'kode' => $this->gjlPenyakit->getKode(),
				'id_jenis' => $this->gjlPenyakit->getId_jenis(),
				'gejala'=>$this->gjlPenyakit->getGejala()
				);
			$this->db->insert('gejala_penyakit',$this->data_db);
		}
	}

	public function hapusGejala($idRule, $kode, $idJP){
		$this->rulePnykt = new RulePenyakitEntity($idRule,$idJP,null,$kode, null,null);
		$this->db->where('id',$this->rulePnykt->getId());
		$this->db->delete('rule_penyakit');
		$cekDataGejala = $this->ruleByKode($kode,$this->rulePnykt->getId_jenis());
		if($cekDataGejala == null){
			$this->gjlPenyakit = new GejalaPenyakitEntity(null,$kode, $idJP, null);
			$this->db->where('id_jenis', $this->gjlPenyakit->getId_jenis());
			$this->db->where('kode',$this->gjlPenyakit->getKode());
			$this->db->delete('gejala_penyakit');
		} 
	}

	public function delJenisPenyakit($idJenis){
		$this->jenisPenyakit = new JenisPenyakitEntity($idJenis,null,null,null);
		$this->db->where('id_jenis', $this->jenisPenyakit->getId());
		$this->db->delete('jenis_penyakit');
		$this->gjlPenyakit = new GejalaPenyakitEntity(null,null, $idJP, null);
		$this->db->where('id_jenis',  $this->gjlPenyakit->getId_jenis());
		$this->db->delete('gejala_penyakit');
		$this->rulePnykt = new RulePenyakitEntity(null,$idJenis,null,null, null,null);
		$this->db->where('id_jenis', $this->rulePnykt->getId_jenis());
		$this->db->delete('rule_penyakit');
	}

	public function JenisById($id){
		$this->db->where('id_jenis',$id);
		$this->data_db = $this->db->get('jenis_penyakit')->row_array();
		$this->jenisPenyakit = new JenisPenyakitEntity($this->data_db['id_jenis'],$this->data_db['jenis'],$this->data_db['deskripsi'],$this->data_db['image']);
		return $this->jenisPenyakit;
	}

	public function RuleByJenis($idJenis){
		$this->db->where('id_jenis',$idJenis);
		$this->data_db = $this->db->get('rule_penyakit');
		$this->indeks = 0;
		foreach ($this->data_db->result_array() as $rp) {
			$this->rulePnykt [$this->indeks] = new RulePenyakitEntity($rp['id'],$rp['id_jenis'],$rp['penyakit'],$rp['kode_gjl'],$rp['gejala'],$rp['densitas']);
			$this->indeks++;
		}
		return $this->rulePnykt;
	}

	public function ruleByKode($kode, $idJP){
		$this->db->where('id_jenis', $idJP);
		$this->db->where('kode_gjl', $kode);
		$hasil= $this->db->get('rule_penyakit')->result_array();
		return $hasil;
	}

	public function RuleById($id){
		$this->db->where('id',$id);
		$this->data_db = $this->db->get('rule_penyakit')->row_array();
		$this->rulePnykt = new RulePenyakitEntity($this->data_db['id'],$this->data_db['id_jenis'],$this->data_db['penyakit'],$this->data_db['kode_gjl'],$this->data_db['gejala'],$this->data_db['densitas']);
		return $this->rulePnykt;
	}

	public function getAllRule($gejala,$jenis){
		$this->data_db = $this->db->query("SELECT * FROM rule_penyakit WHERE gejala='$gejala' AND id_jenis='$jenis' ORDER BY densitas DESC");
		// $this->db->where('gejala',$gejala);
		// $this->db->where('id_jenis',$jenis);
		// $this->db->order_by('densitas', 'desc');
		// $this->data_db=$this->db->get('rule_penyakit');

		$this->indeks=0;
		foreach ($this->data_db->result_array() as $rp) {
			$this->rulePnykt [$this->indeks] = new RulePenyakitEntity($rp['id'],$rp['id_jenis'],$rp['penyakit'],$rp['kode_gjl'],$rp['gejala'],$rp['densitas']);
			$this->indeks++;
		}
		return $this->rulePnykt;
	}
}