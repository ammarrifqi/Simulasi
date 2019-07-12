<?php

class C_Penyakit extends CI_Controller {
	private $dataJP, $dataGP, $dataRule;
	function __construct(){
		parent::__construct();
        $this->load->model('M_Penyakit');
	}

	public function index(){
		$this->session->set_userdata('title','Daftar Diagnosa Otomatis');
		$this->dataJP = $this->M_Penyakit->getAllJenisPenyakit();
		$data['jenis'] = $this->dataJP;
		$this->autoload('list_diagnose',$data);
	}

	public function autoload($content, $data){
		if ($this->session->userdata('is_login')) {
			$this->casting($this->session->userdata('level'));
		} else{
			$this->load->view('header');
			$this->load->view('sidebar');
		}
		$this->load->view($content,$data);
		$this->load->view('footer');
	}

	public function casting($level){
		switch ($level) {
			case 1:
				$this->load->view('headerAkun');
				$this->load->view('sidebarMember');
				break;
			case 2:
				$this->load->view('headerAkun');
				$this->load->view('sidebarDokter');
				break;
			case 3:
				$this->load->view('headerAkun');
				$this->load->view('sidebarAdmin');
				break;
		}
	}

	public function daftarGejala($jenis){
		$this->session->set_userdata('title','Diagnosa Otomatis');
		$this->dataGP = $this->M_Penyakit->gejalaByJenis($jenis);
		$data['gejala'] = $this->dataGP;
		$data['idjenis'] = $jenis;
		$dataJP = $this->M_Penyakit->JenisById($jenis);
		$this->session->set_userdata('jp',$dataJP->getJenis());
		$this->session->set_userdata('img_gp',$this->input->get('img'));
		$data['jumlah'] = $this->M_Penyakit->jumlahGejala($jenis);
		$this->autoload('auto_diagnose',$data);
	}

	public function listDiagnosis(){
		$this->session->set_userdata('title','Kelola Diagnosa Otomatis');
		$this->dataJP =  $this->M_Penyakit->getAllJenisPenyakit();
		$data['dataJP'] = $this->dataJP;
		$this->autoload('listDiagnosis',$data);
	}

	public function formGejala($idJenis){
		if ($this->input->get('status')=="Kelola") {
			$this->session->set_userdata('status',$this->input->get('status'));
			$data['jp'] = $this->M_Penyakit->JenisById($idJenis);
			$this->session->set_userdata('gmbrJP',$data['jp']->getImg());
			$data['gejala'] = $this->M_Penyakit->RuleByJenis($idJenis);
			$this->autoload('formGejala',$data);
		} else if($this->input->get('status')=="Hapus"){
			$this->M_Penyakit->delJenisPenyakit($idJenis);
			$this->listDiagnosis();
		}
		
	}

	public function kelolaJP(){
		$images="info-default.jpg";
        $error="";
        $config['upload_path'] = BASEPATH.'../asset/dist/img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '5000';
        $this->load->library('upload', $config);
		if(!$this->upload->do_upload("gmbrJP")){
        	$error = array ('error'=>$this->upload->display_errors());
        	print_r($this->upload->display_errors());
        }else {
            $img=$this->upload->data();
            $images=$img['file_name'];
    	}
    	$deskripsi = $this->input->post('deskripsi');
		if($this->input->post('state')=='tambah'){
			$jp = $this->input->post('jp');
       		$this->M_Penyakit->tambahJP($images,$jp,$deskripsi);
       		// redirect('C_Penyakit/listDiagnosis');
		} else{
			$idjenis = $this->input->post('idJenis');
			$jp = $this->input->post('jpH');
			$this->M_Penyakit->editJP($images,$idjenis, $jp,$deskripsi);
			//redirect('C_Penyakit/formDiagnosis/'.$this->input->get('id'));
		}
		redirect('C_Penyakit/listDiagnosis');
	}

	public function ambilRule($id){
		header('Content-Type: application/json');
		$dataRule = $this->M_Penyakit->ruleById($id);
		$data = array(
			'idRule' => $dataRule->getId(), 
			'penyakit' => $dataRule->getPenyakit(),
			'kode' => $dataRule->getKode(),
			'gejala' => $dataRule->getGejala(),
			'densitas' => $dataRule->getDensitas()
			);
		echo json_encode($data);
	}

	public function ambilJP($id){
		header('Content-Type: application/json');
		$dataJP = $this->M_Penyakit->JenisById($id);
		$data = array(
			'idJenis' => $dataJP->getId(), 
			'jenis' => $dataJP->getJenis(),
			'deskripsi' => $dataJP->getDeskripsi(),
			'gambar' => $dataJP->getImg()
			);
		echo json_encode($data);
	}

	public function kelolaGejala ($idJP){
		$state = $this->input->post('state');
		$idRule = $this->input->post('id');
		$penyakit = $this->input->post('penyakit');
		$kode = $this->input->post('kode');
		$gejala = $this->input->post('gejala');
		$densitas = $this->input->post('densitas');
		if($state=="edit"){
			$penyakit = $this->input->post('penyakitH');
			$kode = $this->input->post('kodeH');
			$this->M_Penyakit->editGejala($idRule,$idJP,$penyakit, $kode, $gejala,$densitas);
		} else if($state=="tambah"){
			$penyakit = $this->input->post('penyakit');
			$kode = $this->input->post('kode');
			$this->M_Penyakit->tambahGejala($idJP,$penyakit, $kode,$gejala,$densitas);
		}
		echo 'C_Penyakit/formGejala/'.$idJP;
		//redirect('C_Penyakit/formDiagnosis/'.$idJP);
	}

	public function delGejala($idRule){
		$this->M_Penyakit->hapusGejala($idRule, $this->input->get('kode'),$this->input->get('idJP'));
		redirect('C_Penyakit/formGejala/'.$this->input->get('idJP').'?status=Kelola');
	}

	public function hitungDiagnosa($jenis){
		$hasilpenyakit = array();
		$arrayHasil = array();
		if(null!=$this->input->post('gejala')){
			$inputgejala = $this->input->post('gejala');
			//jika gejala yang diinputkan lebih dari 1
			if(count($inputgejala)>1){
				foreach ($inputgejala as $i => $gejala) {
					//inisialisasi m1
					if($i==0){
						$arrayHasil += $this->inisialisasiM($i,$gejala,$jenis);
						
					}
					//inisialisasi m2
					else{
						$arrayHasil += $this->inisialisasiM($i,$gejala,$jenis);

					   	//perhitungan kombinasi
					   	$kombinasiM = array();
			   			$k = 0;
			   			foreach ($arrayHasil[$i-1] as $key1 => $array1){
			   				foreach ($arrayHasil[$i] as $key2 => $array2){
			    				$kombinasiM += $this->getKombinasiM($array1, $array2, $k);
								$k++;
							}
						}

						//pengecekan hasil kombinasi ada yg memiliki penyakit yang sama atau tidak untuk dijumlahkan.
						$same=array();
						$m=0;
						for($k=0; $k<count($kombinasiM); $k++){
			  				$pembilang = $kombinasiM[$k]['value'];
			  				if (in_array($k, $same)){
			  					continue;
			  				} else{
				    			for ($l=$k+1; $l<count($kombinasiM); $l++){
				      				sort($kombinasiM[$k]['name']);
				      				sort($kombinasiM[$l]['name']);
				      				if(implode(",",$kombinasiM[$k]['name'])==
				      					(implode(",",$kombinasiM[$l]['name']))){
				      						$pembilang += $kombinasiM[$l]['value'];
				      						array_push($same, $l);
				      				}
				      			}
			      			}
							$total_penyebut = 0;
							foreach ($kombinasiM as $idx => $kombinasi){
								if($kombinasi['name'][0] == 1){
			      					$total_penyebut += $kombinasi['value'];
			   					}
							}
			    			$arrayHasil[$i][$m]['name'] = $kombinasiM[$k]['name'];
			     			$arrayHasil[$i][$m]['value'] = number_format($pembilang/(1-$total_penyebut),5, '.', '');
			      			$m++;
						}
					}
				}

				$t = count($inputgejala)-1;
				$diagnosa = $this->nilaiMax($t, $arrayHasil);
				
			   	array_push($hasilpenyakit, $diagnosa);
			   	$data['gejala']= $this->input->post('gejala');
				$data['hasil'] = $hasilpenyakit;
				$data['penyakit'] = $this->M_Penyakit->getPenyakitByJenis($jenis);
				$this->session->set_userdata($data);
				$this->session->set_userdata('title','Hasil Diagnosa Otomatis');
				$this->autoload('hasilDiagnosa',$data);
			} else{
				$this->session->set_flashdata('error', 'Silahkan pilih minimal 2 gejala');
				redirect('C_Penyakit/daftarGejala/'.$jenis.'?img='.$this->session->userdata('img_gp'));
			}
		} else{
			$this->session->set_flashdata('error', 'Silahkan pilih gejala terlebih dahulu');
			redirect('C_Penyakit/daftarGejala/'.$jenis.'?img='.$this->session->userdata('img_gp'));
		}
	}

	public function inisialisasiM($i, $gejala, $jenis){
		$penyakit = array();
		$densitasMaks = 0;
		$plau = 0;
		$this->dataRule = $this->M_Penyakit->getAllRule($gejala,$jenis);
		$j = 0;
		foreach ($this->dataRule as $q) {
			if($j==0){
				$densitasMaks = $q->getDensitas();
				$plau = 1-$densitasMaks;
			}
			$penyakit[$j] = $q->getPenyakit();
  			$j++;
		}
		$hasil [$i] [0] ['name'] = $penyakit;
	   	$hasil [$i] [0] ['value'] = $densitasMaks;
	   	$hasil [$i] [1] ['name'] = array(0);
	   	$hasil [$i] [1] ['value'] = $plau;

	   	return $hasil;
	}

	public function nilaiMax($t, $arrayHasil){
		$diagnosa=array();
		$max = 0;
		for ($x=0;$x<count($arrayHasil[$t]);$x++){
			if($arrayHasil[$t][$x]['value']>=$max){
				$max=$arrayHasil[$t][$x]['value'];
				$diagnosa=$arrayHasil[$t][$x]['name'];
	   		}
	   	}
	   	return $diagnosa;
	}

	public function getKombinasiM($array1, $array2, $k){
		$kombinasiM = array();
		if($array1['name'][0]!="0" && $array2['name'][0]!="0"){
			$irisan1 = array_intersect($array1['name'], $array2['name']);
			if (count ($irisan1)>0){
				$kombinasiM[$k]['name'] = $irisan1;
			} else  {
				$kombinasiM[$k]['name'] = array (1);
			}
		}
		else if ($array1['name'][0]!="0" and $array2['name'][0]=="0"){
			$kombinasiM[$k]['name']=$array1['name'];
		}
		else if ($array1['name'][0]=="0" and $array2['name'][0]!="0"){
			$kombinasiM[$k]['name']=$array2['name'];
		}
		else if ($array1['name'][0]=="0" and $array2['name'][0]=="0"){
			$kombinasiM[$k]['name']=array(0);
		}
		$kombinasiM[$k]['value']=$array1['value']*$array2['value'];

		return $kombinasiM;
	}

}