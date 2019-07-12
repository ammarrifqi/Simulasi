<?php

class MemberEntity {
	private $id, $nama, $ttl, $jenis_kl, $no_telp, $alamat, $img, $time;

	function __construct($id, $nama, $ttl, $jkl, $no, $almt, $image){
		$this->id = $id;
		$this->nama = $nama;
		$this->ttl = $ttl;
		$this->jenis_kl = $jkl;
		$this->no_telp = $no;
		$this->alamat = $almt;
		$this->img = $image;
	}



	public function setTime($time){
		$this->time = $time;
	}
	public function getTime(){
		return $this->time;
	}
	// public function setNama($nama){
	// 	$this->nama = $nama;
	// }
	// public function setTtl($ttl){
	// 	$this->ttl = $ttl;
	// }
	// public function setJenis_kl($jkl){
	// 	$this->jenis_kl = $jkl;
	// }
	// public function setNo_telp($no){
	// 	$this->no_telp = $no;
	// }
	// public function setAlamat($almt){
	// 	$this->alamat = $almt;
	// }
	// public function setImg($image){
	// 	$this->img = $image;
	// }

	public function getId(){
		return $this->id;
	}
	public function getNama(){
		return $this->nama;
	}
	public function getTtl(){
		return $this->ttl;
	}
	public function getJenis_kl(){
		return $this->jenis_kl;
	}
	public function getNo_telp(){
		return $this->no_telp;
	}
	public function getAlamat(){
		return $this->alamat;
	}
	public function getImg(){
		return $this->img;
	}
}