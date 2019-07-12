<?php

class C_admin extends CI_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model('M_dokter');
		$this->load->model('M_member');
		$this->load->model('M_user');
	}

	public function index(){
		$data="";
		$this->session->set_userdata('nama', 'Admin');
		$this->session->set_userdata('title', 'Admin Telehealth');
		$this->load->view('headerAkun');
    	$this->load->view('sidebarAdmin');
    	$this->load->view('home',$data);
    	$this->load->view('footer');
	}

	public function tambahDokter(){
		$error="";
        $config['upload_path'] = BASEPATH.'../asset/dist/img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']    = '3074';
        $config['max_width']  = '5000';
        $config['max_height']  = '5000';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload("foto")){
            $error = array ('error'=>$this->upload->display_errors());
            print_r($this->upload->display_errors());
        }else {
            $img=$this->upload->data();
            $images=$img['file_name'];
        }
        $this->M_dokter->addDokter($images);
        $this->M_user->addUser($images,2);
        $pesan='Dokter'.$this->input->post('nama'). 'Berhasil Ditambahkan';
        $this->session->set_userdata('pesan', $pesan);
        redirect('C_dokter/listDokter');
	}

	public function hapusMember($idMember){
		$this->M_member->hapusMemberById($idMember);
		$this->M_user->hapusUserById($idMember);
		$this->session->set_userdata('pesan', 'Anda berhasil menghapus member '.$this->input->get('nama'));
		redirect('C_member/listMember');
	}

	public function formTambahDokter(){
		$data="";
		$this->load->view('headerAkun');
		$this->load->view('sidebarAdmin');
		$this->load->view('formDokterBaru',$data);
		$this->load->view('footer');

	}

}