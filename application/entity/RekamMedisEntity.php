<?php

class RekamMedisEntity{
	private $id, $idPasien, $namaDokter, $sesi, $keluhan, $diagnosis, $penanganan, $resep,$time;

	function __construct($id, $pasien, $dokter, $sesi, $keluhan, $diagnosis, $penanganan, $resep, $time){
		$this->id = $id;
		$this->idPasien = $pasien;
		$this->namaDokter =$dokter;
		$this->sesi = $sesi;
		$this->keluhan = $keluhan;
		$this->diagnosis = $diagnosis;
		$this->penanganan = $penanganan;
		$this->resep = $resep;
		$this->time = $time;
	}

	public function getId(){
		return $this->id;
	}
	public function getIdPasien(){
		return $this->idPasien;
	}
	public function getDokter(){
		return $this->namaDokter;
	}
	public function getSesi(){
		return $this->sesi;
	}
	public function getKeluhan(){
		return $this->keluhan;
	}
	public function getDiagnosis(){
		return $this->diagnosis;
	}
	public function getPenanganan(){
		return $this->penanganan;
	}
	public function getResep(){
		return $this->resep;
	}
	public function getTime(){
		return $this->time;
	}
}