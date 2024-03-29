  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url($this->session->userdata('img'))?>" class="img-circle" alt="User Image" style="width:50px; height:50px;">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama')?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU SISTEM</li>
        <li class="<?php echo ($this->session->userdata('title')=="Dokter Telehealth") ? "active" : ""?>">
          <a href="<?php echo base_url()?>C_dokter"><i class="fa fa-home"></i> <span>Halaman Utama</span></a>
        </li>
        <li class="<?php echo (($this->session->userdata('title')=="Daftar Info ".$this->session->userdata('tipe_info'))
                                || (substr($this->session->userdata('title'), 0,4) == "Info")) ? "active" : ""?> treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Info</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($this->session->userdata('tipe_info')=="Kesehatan") ? "active" : ""?>">
              <a href="<?php echo base_url('C_konsultasi/listInfo/'.'Kesehatan')?>"><i class="fa fa-circle-o"></i> Info Kesehatan</a>
            </li>
            <li class="<?php echo ($this->session->userdata('tipe_info')=="Penyakit") ? "active" : ""?>">
              <a href="<?php echo base_url('C_konsultasi/listInfo/'.'Penyakit')?>"><i class="fa fa-circle-o"></i> Info Penyakit</a>
            </li>
            <li class="<?php echo ($this->session->userdata('tipe_info')=="Tambah") ? "active" : ""?>">
              <a href="<?php echo base_url('C_dokter/formAddInfo')?>"><i class="fa fa-plus"></i> Tambah Info Baru</a>
            </li>
          </ul>
        </li>
        <li class="<?php echo ($this->session->userdata('title')=="Daftar Diagnosa Otomatis") ? "active" : ""?>">
          <a href="<?php echo base_url('C_Penyakit')?>"><i class="fa fa-pencil"></i> <span>Diagnosis Otomatis</span></a>
        </li>
        <li class="<?php echo ($this->session->userdata('title')=="Cek IMT dan Gizi") ? "active" : ""?>">
          <a href="<?php echo base_url('C_konsultasi/tampilCheck')?>"><i class="fa fa-male"></i> <span>Cek IMT dan Kebutuhan Gizi</span></a>
        </li>
        <li class="<?php echo ($this->session->userdata('title')=="Daftar Konsultasi") ? "active" : ""?>">
          <a href="<?php echo base_url('C_konsultasi')?>"><i class="fa fa-hospital-o"></i> <span>Daftar Konsultasi</span></a>
        </li>
        <li class="<?php echo ($this->session->userdata('title')=="Kelola Diagnosis Otomatis") ? "active" : ""?>">
          <a href="<?php echo base_url('C_Penyakit/listDiagnosis')?>"><i class="fa fa-edit"></i> <span>Kelola Diagnosis Otomatis</span></a>
        </li>
        <li><a href="<?php echo base_url('C_user/logout')?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>