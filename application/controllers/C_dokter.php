<?php

class C_dokter extends CI_Controller{
	private $dataDokter;

	function __construct(){
		parent:: __construct();
		$this->load->model('M_dokter');
	}

	public function index(){
    	$data="";
    	$dataDokter = $this->M_dokter->dokterById($this->session->userdata('id'));
    	$sessionData['nama'] = $dataDokter->getNama();
    	$sessionData['ttl'] = $dataDokter->getTtl();
    	$sessionData['pendidikan'] = $dataDokter->getPendidikan();
    	$sessionData['kota'] = $dataDokter->getKota();
    	$sessionData['jkl'] = $dataDokter->getJenis_kl();
    	$sessionData['status'] = $dataDokter->getStatus();
    	$sessionData['title'] = 'Dokter Telehealth | Home';
    	$this->session->set_userdata($sessionData);
    	$this->autoload('home',$data);
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

	public function cekStatus($id){
		$this->dokter = $this->M_dokter->dokterById($id);
		if($dr->getStatus()=="Online"){
            echo '<a href=""><i class="fa fa-circle text-success"></i>'.
            $dr->getStatus().
            '</a>';
        } else {
            echo '<i class="fa fa-circle text-danger"></i>'. 
            '<font color="red">'.$dr->getStatus().
            '</font>';
        }

	}

    public function listDokter(){
    	$this->session->set_userdata('title','Daftar Dokter');
		$this->dataDokter= $this->M_dokter->allDokter();
		$data['allDokter'] = $this->dataDokter;
		$this->autoload('list_dokter',$data);
	}

	public function searchDokter(){
		$this->dataDokter = $this->M_dokter->cari($this->input->post('cari'));
		if(count($this->dataDokter) != 0){
			foreach ($this->dataDokter as $dr) {
				echo '<li class="item">'.
                      '<div class="product-img">'.
                        '<img src="'.base_url($dr->getImg()).'" class="img-circle"/>'.
                      '</div>'.
                      '<div class="dokter-info">'.
                        '<a href="'. base_url('C_konsultasi/halamanKonsul/'.$dr->getId()).'" class="product-title"><font size="3">Dr.'. $dr->getNama().'</font>';
                if($this->session->userdata('level')!=3){
                    echo '<button type="submit" class="btn btn-primary pull-right" id="konsul-dokter">'.
                         '<i class="fa fa-comments">&nbsp;&nbsp;Konsul</i>'.
                    	 '</button>';
                }
                echo '<span class="product-description">'.
                        'Pendidikan: '.$dr->getPendidikan().
                      '</span>'.
                      '<span class="product-description">'.
                        'Kota: '.$dr->getKota().
                      '</span>'.
                      '</a>
                      </div>
                    </li>';
			}
		} else{
			echo '<div> <font size="3"> Dokter Tidak Ditemukan</font></div>';
		}
	}

	public function formeditprofile(){
		$data['status']= "Dokter Telehealth";
		$data['link']="C_dokter/edit";
		$this->session->set_userdata('title','Edit Profil');
        $this->autoload('editProfil',$data);
    }
	
	public function formAddInfo(){
		$data="";
		$this->session->set_userdata('title','Telehealth-Tambah Info');
		$this->session->set_userdata('tipe_info','Tambah');
		$this->autoload('formTambahInfo',$data);
	}
}