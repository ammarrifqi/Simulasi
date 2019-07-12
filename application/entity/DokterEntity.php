<?php

class DokterEntity {
	private $id, $nama, $ttl, $pendidikan, $kota, $status, $jenis_kl, $img, $time;

	function __construct($id, $nama, $ttl, $pendidikan, $kota, $status, $jkl, $image){
		$this->id = $id;
		$this->nama = $nama;
		$this->ttl = $ttl;
		$this->pendidikan = $pendidikan;
		$this->kota = $kota;
		$this->status = $status;
		$this->jenis_kl = $jkl;
		$this->img = $image;
	}

	public function setTime($time){
		$this->time = $time;
	}
	public function getTime(){
		return $this->time;
	}

	public function getId(){
		return $this->id;
	}
	public function getNama(){
		return $this->nama;
	}
	public function getTtl(){
		return $this->ttl;
	}
	public function getPendidikan(){
		return $this->pendidikan;
	}
	public function getKota(){
		return $this->kota;
	}
	public function getStatus(){
		return $this->status;
	}
	public function getImg(){
		return $this->img;
	}

	public function getJenis_kl(){
		return $this->jenis_kl;
	}
}