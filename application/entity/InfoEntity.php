<?php

class InfoEntity {
	private $id, $tipe, $judul, $isi_info, $image;

	function __construct($id, $tipe, $judul, $isi_info, $image){
		$this->id=$id;
		$this->tipe=$tipe;
		$this->judul=$judul;
		$this->isi_info=$isi_info;
		$this->image=$image;
	}

	public function getId(){
		return $this->id;
	}
	public function getTipe(){
		return $this->tipe;
	}
	public function getJudul(){
		return $this->judul;
	}
	public function getIsi_info(){
		return $this->isi_info;
	}
	public function getImage(){
		return $this->image;
	}
}