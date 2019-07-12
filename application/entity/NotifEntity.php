<?php

class NotifEntity {
	private $id, $pengirim, $penerima,$sesi,$status, $time;

	function __construct($id, $pengirim, $penerima, $sesi, $status, $time){
		$this->id = $id;
		$this->pengirim = $pengirim;
		$this->penerima = $penerima;
		$this->sesi= $sesi;
		$this->status = $status;
		$this->time = $time;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function setTime($time){
		$this->time = $time;
	}

	public function getId(){
		return $this->id;
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
	public function getStatus(){
		return $this->status;
	}
	public function getTime(){
		return $this->time;
	}	
}