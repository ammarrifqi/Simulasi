<?php

class JenisPenyakitEntity {
	private $id, $jenis, $deskripsi, $img;
	function __construct($id, $jenis, $deskripsi, $img){
		$this->id = $id;
		$this->jenis = $jenis;
		$this->deskripsi = $deskripsi;
		$this->img = $img;
	}

	public function getId(){
		return $this->id;
	}
	public function getJenis(){
		return $this->jenis;
	}
	public function getDeskripsi(){
		return $this->deskripsi;
	}
	public function getImg(){
		return $this->img;
	}
}