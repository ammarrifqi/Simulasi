<?php

class GejalaPenyakitEntity {
	private $id, $kode, $id_jenis, $gejala;
	function __construct($id, $kode, $id_jenis, $gejala){
		$this->id = $id;
		$this->kode = $kode;
		$this->id_jenis = $id_jenis;
		$this->gejala = $gejala;
	}

	public function getId(){
		return $this->id;
	}
	public function getKode(){
		return $this->kode;
	}
	public function getId_jenis(){
		return $this->id_jenis;
	}
	public function getGejala(){
		return $this->gejala;
	}
}