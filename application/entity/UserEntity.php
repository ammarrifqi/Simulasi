<?php

class UserEntity {
	private $id;
	private $username;
	private $password;
	private $level;
	private $img;
	private $beratBdn;
	private $tinggiBdn;
	private $usia;
	private $jkl;
	private $aktivitas;

	function __construct($id,$username,$pass,$lvl,$image){
		$this->id = $id;
		$this->username = $username;
		$this->password = $pass;
		$this->level = $lvl;
		$this->img = $image;
	}

	public function setUser($bb,$tb,$umur,$jkl,$activity){
		$this->beratBdn = $bb;
		$this->tinggiBdn = $tb;
		$this->usia = $umur;
		$this->jkl = $jkl;
		$this->aktivitas = $activity;
	}
	
	public function getUser(){
		return array ('bb' => $this->beratBdn,
			'tb' => $this->tinggiBdn,
			'usia'=>$this->usia,
			'jkl'=>$this->jkl,
			'aktivitas'=> $this->aktivitas);
	}

	public function getId(){
		return $this->id;
	}
	public function getUsername(){
		return $this->username;
	}
	public function getPassword(){
		return $this->password;
	}
	public function getLevel(){
		return $this->level;
	}
	public function getImg(){
		return $this->img ;
	}
}