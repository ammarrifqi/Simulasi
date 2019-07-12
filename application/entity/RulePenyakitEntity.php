<?php

class RulePenyakitEntity {
	private $id, $id_jenis, $penyakit, $kode_gjl,$gejala, $densitas;

	function __construct($id, $id_jenis, $penyakit,$kode, $gejala, $densitas){
		$this->id=$id;
		$this->id_jenis=$id_jenis;
		$this->penyakit=$penyakit;
		$this->kode_gjl = $kode;
		$this->gejala=$gejala;
		$this->densitas=$densitas;
	}

	public function getId(){
		return $this->id;
	}
	public function getId_jenis(){
		return $this->id_jenis;
	}
	public function getPenyakit(){
		return $this->penyakit;
	}
	public function getGejala(){
		return $this->gejala;
	}
	public function getKode(){
		return $this->kode_gjl;
	}
	public function getDensitas(){
		return $this->densitas;
	}

}