<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->session->userdata('title')?></title>
  <link rel="icon" type="image/png" href="<?php echo base_url('asset/dist/img/tele-icon.png')?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <script type="text/javascript" src="<?php echo base_url()?>asset/dist/js/jquery-1.4.3.min.js"></script>
  <script text="text/javascript">
    $(document).ready(function(){
      var username = $("#username");
      var password = $('#password');
      var msg = $('#error_msg');
      $("#loginH").click(function(e){
        msg.text('');
        msg.hide();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('C_user/loginHeader')?>",
          data: 'username='+username.val()+'&password='+ password.val(),
          success :function(data){
            if ('Error'==data) {
              msg.text('Username atau Password salah');
              msg.show();
            } else {
              window.location.href = "<?php echo base_url() ?>" + data;
            }
          }
        });
      })

      $('#password').on('keydown', function(e){
        if (e.keyCode === 13 && e.shiftKey === false) {
            if ("" == password.val()) {
                e.preventDefault();
                return;
            }
            $.ajax({
              type: "POST",
              url: "<?php echo base_url('C_user/loginHeader')?>",
              data: 'username='+username.val()+'&password='+ password.val(),
              success :function(data){
            // console.log(data);
                if ('Error'==data) {
                  msg.text('Username atau Password salah');
                  msg.show();
                } else {
                  window.location.href = "<?php echo base_url() ?>" + data;
                }
              }
            });
            e.preventDefault(); // stop 
            return false;
        }
      });
        
    });
  </script>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/bootstrap/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/iCheck/flat/blue.css">

  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/iCheck/all.css">
  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/morris/morris.css"> -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url()?>C_user" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>HEAL</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Telehealth</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url('C_user?login=true')?>" >
              <img src="<?php echo base_url()?>asset/dist/img/guest.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Guest</span>
            </a>
            
          </li>

        </ul>
      </div>
    </nav>
  </header>