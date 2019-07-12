<?php
require(ENTITY_DIR  . "KonsultasiEntity.php");
require(ENTITY_DIR  . "NotifEntity.php");
require(ENTITY_DIR  . "InfoEntity.php");
require(ENTITY_DIR  . "FileKesehatanEntity.php");
require(ENTITY_DIR  . "RekamMedisEntity.php");

class M_konsultasi extends CI_Model{
	private $data_db, $indeks, $konsul, $notif, $info, $file, $rkmMedis;

	// function __construct(){
 //        parent::__construct();
 //        $this->load->library('session');
 //    }

	public function konsulByPengirim($idPenerima, $idPengirim, $sesi){
		$this->data_db =$this->db->query("SELECT k.*, m.id_member, m.nama AS m_nama, m.img AS m_img,
				 d.id_dokter, d.nama AS d_nama, d.img AS d_img 
				 FROM konsultasi k LEFT JOIN member m ON
				(k.pengirim=m.id_member) LEFT JOIN dokter d ON
				(k.pengirim=d.id_dokter) WHERE
				(k.pengirim='$idPenerima' AND k.penerima='$idPengirim' AND k.sesi = '$sesi') OR
				(k.penerima='$idPenerima' AND k.pengirim='$idPengirim' AND k.sesi = '$sesi') ORDER BY k.time ASC LIMIT 100");
		$this->indeks=0;
		foreach ($this->data_db->result_array() as $k) {
			$this->konsul [$this->indeks] = new KonsultasiEntity($k['id_konsul'],$k['pengirim'],$k['penerima'],$k['sesi'],$k['isi_konsul'],$k['time'],$k['id_member'],$k['m_nama'],$k['m_img'],$k['id_dokter'],$k['d_nama'],$k['d_img']);
			$this->indeks++;
		}
		return $this->konsul;
	}

	public function konsulBySesi($idPenerima){
		$idPengirim = $this->session->userdata('id');
		$this->data_db =$this->db->query("SELECT k.*, m.id_member, m.nama AS m_nama, m.img AS m_img,
				 d.id_dokter, d.nama AS d_nama, d.img AS d_img 
				 FROM konsultasi k LEFT JOIN member m ON
				(k.pengirim=m.id_member) LEFT JOIN dokter d ON
				(k.pengirim=d.id_dokter) WHERE
				(k.pengirim='$idPengirim' AND k.penerima='$idPenerima') OR 
				(k.pengirim='$idPenerima' AND k.penerima='$idPengirim') GROUP BY k.sesi ORDER BY k.time DESC");
		$this->indeks= 0;
		foreach ($this->data_db->result_array() as $k) {
			$this->konsul [$this->indeks] = new KonsultasiEntity($k['id_konsul'],$k['pengirim'],$k['penerima'],$k['sesi'],$k['isi_konsul'],$k['time'],$k['id_member'],$k['m_nama'],$k['m_img'],$k['id_dokter'],$k['d_nama'],$k['d_img']);
			$this->indeks++;
		}
		return $this->konsul;
	}

	public function searchSesi($idPenerima, $cari){
		$idPengirim = $this->session->userdata('id');
		$this->data_db =$this->db->query("SELECT k.*, m.id_member, m.nama AS m_nama, m.img AS m_img,
				 d.id_dokter, d.nama AS d_nama, d.img AS d_img 
				 FROM konsultasi k LEFT JOIN member m ON
				(k.pengirim=m.id_member) LEFT JOIN dokter d ON
				(k.pengirim=d.id_dokter) WHERE
				(k.pengirim='$idPengirim' AND k.penerima='$idPenerima' AND k.sesi LIKE '%$cari%') OR 
				(k.pengirim='$idPenerima' AND k.penerima='$idPengirim' AND k.sesi LIKE '%$cari%') GROUP BY k.sesi ORDER BY k.time DESC");
		$this->indeks= 0;
		foreach ($this->data_db->result_array() as $k) {
			$this->konsul [$this->indeks] = new KonsultasiEntity($k['id_konsul'],$k['pengirim'],$k['penerima'],$k['sesi'],$k['isi_konsul'],$k['time'],$k['id_member'],$k['m_nama'],$k['m_img'],$k['id_dokter'],$k['d_nama'],$k['d_img']);
			$this->indeks++;
		}
		return $this->konsul;	
	}

	public function getFile($idPengirim, $idPenerima){
		$sesi= $this->session->userdata('sesi');
		$this->data_db = $this->db->query("SELECT * FROM file_kesehatan WHERE 
			(pengirim = '$idPengirim' AND penerima = '$idPenerima' AND sesi = '$sesi') OR
			(pengirim = '$idPenerima' AND penerima = '$idPengirim' AND sesi = '$sesi')");
		$this->indeks =0;
		foreach ($this->data_db->result_array() as $f) {
			$this->file [$this->indeks] = new FileKesehatanEntity ($f['idFile'],$f['pengirim'],$f['penerima'],$f['sesi'],$f['namaFile'],$f['lokasi']);
			$this->indeks++;
		}
		return $this->file;
	}

	public function getRekamMds($pasien){
		$this->data_db = $this->db->query("SELECT * FROM rekam_medis r JOIN member m 
			ON r.id_member=m.id_member WHERE r.id_member = '$pasien'");
		$this->indeks = 0;
		$this->rkmMedis=null;
		foreach ($this->data_db->result_array() as $rkm) {
			$this->rkmMedis [$this->indeks] = new RekamMedisEntity ($rkm['id'], $rkm['id_member'], $rkm['namaDokter'], $rkm['sesi'], $rkm['keluhan'], $rkm['diagnosis'], $rkm['penanganan'], $rkm['resep'],$rkm['time']);
			$this->indeks++;
		}
		return $this->rkmMedis;
	}

	public function rkmMedisBySesi($pasien){
		$sesi = $this->session->userdata('sesi');
		$dokter = $this->session->userdata('nama');
		$this->data_db = $this->db->query("SELECT * FROM rekam_medis r JOIN member m 
			ON r.id_member=m.id_member WHERE r.id_member = '$pasien' AND r.sesi='$sesi' AND r.namaDokter='$dokter'")->row_array();
		$this->rkmMedis = new RekamMedisEntity ($this->data_db['id'], $this->data_db['id_member'], $this->data_db['namaDokter'], 
			$this->data_db['sesi'], $this->data_db['keluhan'], $this->data_db['diagnosis'], $this->data_db['penanganan'], $this->data_db['resep'], $this->data_db['time']);
		return $this->rkmMedis;
	}

	public function simpanRekamMds($pasien, $keluhan, $diagnosis, $penanganan){
		date_default_timezone_set('Asia/Jakarta');
		$sesi = $this->session->userdata('sesi');
		$dokter = $this->session->userdata('nama');
		$tempRkm = $this->getRekamMds($pasien);
		$this->rkmMedis = new RekamMedisEntity (null, $pasien, $dokter, $sesi, 
			str_replace(array("\r\n", "\n\r", "\n", "\r"), '<br />', $keluhan), 
			str_replace(array("\r\n", "\n\r", "\n", "\r"), '<br />', $diagnosis), 
			str_replace(array("\r\n", "\n\r", "\n", "\r"), '<br />', $penanganan), null,date('Y-m-d H:i:s'));
		$found = false;
		$id="";
		if($tempRkm!=null){
			foreach ($tempRkm as $rkm) {
				if($rkm->getDokter()==$this->rkmMedis->getDokter() 
					&& $rkm->getSesi()==$this->rkmMedis->getSesi()){
					$found = true;
					$id = $rkm->getId();
				}
			}
		}
		if($found){
			$this->data_db = array(
				'keluhan' => $this->rkmMedis->getKeluhan(),
				'diagnosis'=>$this->rkmMedis->getDiagnosis(),
				'penanganan'=> $this->rkmMedis->getPenanganan(),
				'time' => $this->rkmMedis->getTime());
			$this->db->where('id',$id);
			$this->db->update('rekam_medis',$this->data_db);
		} else{
			$this->data_db = array(
				'id_member' => $this->rkmMedis->getIdPasien(),
				'namaDokter' => $this->rkmMedis->getDokter(),
				'sesi' => $this->rkmMedis->getSesi(),
				'keluhan' => $this->rkmMedis->getKeluhan(),
				'diagnosis'=>$this->rkmMedis->getDiagnosis(),
				'penanganan'=> $this->rkmMedis->getPenanganan(),
				'time' => $this->rkmMedis->getTime());
			$this->db->insert('rekam_medis', $this->data_db);
		}

	}

	public function simpanResep($pasien,$resep){
		date_default_timezone_set('Asia/Jakarta');
		$sesi = $this->session->userdata('sesi');
		$dokter = $this->session->userdata('nama');
		$tempRkm = $this->getRekamMds($pasien);
		$this->rkmMedis = new RekamMedisEntity (null, $pasien, $dokter, $sesi, null, null,null, $resep,date('Y-m-d H:i:s'));
		$found = false;
		$id="";
		if($tempRkm!=null){
			foreach ($tempRkm as $rkm) {
				if($rkm->getDokter()==$this->rkmMedis->getDokter() 
					&& $rkm->getSesi()==$this->rkmMedis->getSesi()){
					$found = true;
					$id = $rkm->getId();
				}
			}
		}
		if($found){
			$this->data_db = array(
				'resep'=>$this->rkmMedis->getResep(),
				'time' => $this->rkmMedis->getTime());
			$this->db->where('id',$id);
			$this->db->update('rekam_medis',$this->data_db);
		} else{
			$this->data_db = array(
				'id_member' => $this->rkmMedis->getIdPasien(),
				'namaDokter' => $this->rkmMedis->getDokter(),
				'sesi' => $this->rkmMedis->getSesi(),
				'keluhan' => $this->rkmMedis->getKeluhan(),
				'diagnosis'=>$this->rkmMedis->getDiagnosis(),
				'penanganan'=> $this->rkmMedis->getPenanganan(),
				'resep' => $this->rkmMedis->getResep(),
				'time' => $this->rkmMedis->getTime());
			$this->db->insert('rekam_medis', $this->data_db);
		}
	}

	public function tambahFile($namafile, $idPenerima){
		$this->file = new FileKesehatanEntity(null, $this->session->userdata('id'), $idPenerima, $this->session->userdata('sesi'),$namafile, 'asset/dist/file/'.$namafile);
		$this->data_db = array (
			'pengirim' => $this->file->getPengirim(),
			'penerima' => $this->file->getPenerima(),
			'sesi' => $this->file->getSesi(),
			'namaFile' => $this->file->getNamaFile(),
			'lokasi' => $this->file->getLokasi(),
			);
		$this->db->insert('file_kesehatan',$this->data_db);
	}

	public function addKonsul($id, $sesi){
		date_default_timezone_set('Asia/Jakarta');
		$this->konsul = new KonsultasiEntity(null, $this->session->userdata('id'), $id, $sesi, $this->input->post('konsul'), date('Y-m-d H:i:s'),null,null,null,null,null,null);
		$this->data_db = array(
			'pengirim'=> $this->konsul->getPengirim(),
			'penerima'=> $this->konsul->getPenerima(),
			'sesi' => $this->konsul->getSesi(),
			'isi_konsul'=> $this->konsul->getIsi_konsul(),
			'time'=> $this->konsul->getTime());
		$this->db->insert('konsultasi',$this->data_db);
	}

	public function notifByPenerima($penerima){
		$query="SELECT * FROM notif WHERE penerima='$penerima' AND status=0 ORDER BY time DESC";
		$this->data_db = $this->db->query($query);
		$this->indeks = 0;
		foreach ($this->data_db->result_array() as $n) {
			$this->notif [$this->indeks] = new NotifEntity($n['id_notif'], $n['pengirim'], $n['penerima'],$n['sesi'],$n['status'],$n['time']);
			$this->indeks++;
		}
		return $this->notif;
	}

	public function jumlahNotif ($penerima){
		$query="SELECT * FROM notif WHERE penerima='$penerima' AND status=0 ORDER BY time DESC";
		return $this->db->query($query)->num_rows();
	}

	public function allNotif(){
		$this->data_db = $this->db->get('notif')->result_array();
		$this->indeks=0;
		foreach ($this->data_db as $n) {
			$this->notif[$this->indeks] = new NotifEntity($n['id_notif'], $n['pengirim'],$n['penerima'], $n['sesi'],$n['status'],$n['time']);
			$this->indeks++;
		}
		return $this->notif;
	}

	public function updateNotif($id){
		$this->notif = new NotifEntity(null,null,null,null,null,null);
		$this->notif->setStatus(1);
		$data = array('status'=>$this->notif->getStatus());
		$this->db->where('id_notif',$id);
		$this->db->update('notif',$data);
	}

	public function tambahNotif($penerima,$sesi){
		date_default_timezone_set('Asia/Jakarta');
		$allNotif = $this->allNotif();
		$this->notif = new NotifEntity(null,null,null,null,null,null);
		$found =false;
		$id="";
		if($allNotif!=null){
			foreach ($allNotif as $n) {
				if($n->getPengirim()==$this->session->userdata('id') AND $n->getPenerima()==$penerima AND $n->getSesi()==$sesi){
					$found=true;
					$id=$n->getId();
					break;
				} 
			}
		}
		// echo json_encode($allNotif);

		if($found=="true"){
			$this->notif->setStatus(0);
			$this->notif->setTime(date('Y-m-d H:i:s'));
			$data = array('status'=>$this->notif->getStatus(),'time'=>$this->notif->getTime());
			$this->db->where('id_notif',$id);
			$this->db->update('notif',$data);
		} else{
			$this->notif = new NotifEntity(null,$this->session->userdata('id'),$penerima,$sesi, 0,date('Y-m-d H:i:s'));
			$data = array('pengirim'=>$this->notif->getPengirim(),
					'penerima'=>$this->notif->getPenerima(),
					'sesi'=>$this->notif->getSesi(),
					'status'=>$this->notif->getStatus(),
					'time'=>$this->notif->getTime());
			$this->db->insert('notif',$data);
		}
	}

	public function infoByTipe($tipe,$akhir,$awal){
		$this->db->where('tipe',$tipe);
		$this->data_db = $this->db->get('info_kes_kit',$akhir,$awal);
		$this->indeks=0;
		foreach ($this->data_db->result_array() as $i) {
			$this->info[$this->indeks] = new InfoEntity($i['id'],$i['tipe'],$i['judul'],$i['isi_info'],$i['image']);
			$this->indeks++;
		}
		return $this->info;
	}

	public function infoBySearch($tipe,$search,$akhir,$awal){
		$query ="SELECT * FROM `info_kes_kit` WHERE tipe = '$tipe' AND (judul LIKE '%$search%' OR isi_info LIKE '%$search%') LIMIT $awal,$akhir";
		$this->data_db = $this->db->query($query);
		$this->indeks=0;
		foreach ($this->data_db->result_array() as $i) {
			$this->info[$this->indeks] = new InfoEntity($i['id'],$i['tipe'],$i['judul'],$i['isi_info'],$i['image']);
			$this->indeks++;
		}
		return $this->info;
	}

	public function jumlahInfo($tipe){
		$this->db->where('tipe',$tipe);
		$this->data_db = $this->db->get('info_kes_kit');
		return $this->data_db->num_rows();
	}

	public function jumlahInfoSearch($tipe, $search){
		$query ="SELECT * FROM `info_kes_kit` WHERE tipe = '$tipe' AND (judul LIKE '%$search%' OR isi_info LIKE '%$search%')";
		return $this->db->query($query)->num_rows();
	}

	public function tambahInfoBaru($img){
		$isiInfo= nl2br($this->input->post('isi_info'));
		$this->info = new InfoEntity(null,$this->input->post('tipe'),$this->input->post('judul'),$isiInfo,'asset/dist/img/'.$img);
		$data= array(
			'tipe'=> $this->info->getTipe(),
			'judul'=> $this->info->getJudul(),
			'isi_info'=> $this->info->getIsi_info(),
			'image'=> $this->info->getImage());
		$this->db->insert('info_kes_kit',$data);
	}

	public function getDetailInfo($id){
		$this->db->where('id',$id);
		$this->data_db= $this->db->get('info_kes_kit')->row_array();
		$this->info = new InfoEntity($this->data_db['id'],$this->data_db['tipe'],$this->data_db['judul'],
			$this->data_db['isi_info'],$this->data_db['image']);
		return $this->info;
	}
}