<?php

class FileKesehatanEntity {
	private $idFile, $pengirim, $penerima, $sesi,$namaFile, $lokasi;
	function __construct($id, $pengirim, $penerima, $sesi, $file, $lokasi){
		$this->idFile = $id;
		$this->pengirim = $pengirim;
		$this->penerima = $penerima;
		$this->sesi = $sesi;
		$this->namaFile = $file;
		$this->lokasi = $lokasi;
	}

	public function getId(){
		return $this->idFile;
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
	public function getNamaFile(){
		return $this->namaFile;
	}
	public function getLokasi(){
		return $this->lokasi;
	}

}