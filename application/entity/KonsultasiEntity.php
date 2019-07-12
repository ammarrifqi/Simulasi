<?php

class KonsultasiEntity {
	private $id_konsul, $pengirim, $penerima, $sesi, $isi_konsul, $time, $id_member, $m_nama, $m_img, $id_dokter,
	$d_nama, $d_img;

	function __construct($id_konsul, $pengirim, $penerima, $sesi, $isi_konsul, $time, $id_member, $m_nama, $m_img, $id_dokter,
	$d_nama, $d_img){
		$this->id_konsul = $id_konsul;
		$this->pengirim =$pengirim;
		$this->penerima = $penerima;
		$this->sesi = $sesi;
		$this->isi_konsul = $isi_konsul;
		$this->time = $time;
		$this->id_member = $id_member;
		$this->m_nama = $m_nama;
		$this->m_img = $m_img;
		$this->id_dokter = $id_dokter;
		$this->d_nama = $d_nama;
		$this->d_img = $d_img;
	}

	public function getId_konsul(){
		return $this->id_konsul;
	}
	public function getPengirim(){
		return $this->pengirim;
	}
	public function getPenerima(){
		return $this->penerima;
	}

	public function getSesi(){
		return $this->sesi;
	}
	public function getIsi_konsul(){
		return $this->isi_konsul;
	}
	public function getTime(){
		return $this->time;
	}

	public function getId_member(){
		return $this->id_member;
	}
	public function getM_nama(){
		return $this->m_nama;
	}
	public function getM_img(){
		return $this->m_img;
	}
	public function getId_dokter(){
		return $this->id_dokter;
	}
	public function getD_nama(){
		return $this->d_nama;
	}
	public function getD_img(){
		return $this->d_img;
	}
}