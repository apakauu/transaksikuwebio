<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/fontawesome-free/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.css" integrity="sha512-DYOwgMAsSbNzrSwEU3nQ7bcYo5aEqpIq1lOe5doeuUwXjuFYjIPvIZDZrEOH+QMIXvRpqcc8gPKcoIMIyAZMCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
</head>
<body>

	<nav class="navbar shadow-sm navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="<?php echo base_url() ?>assets/img/Brand2.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(1) == 'dashboard'){ echo 'active';}?>" aria-current="page" href="<?php echo base_url()?>dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(1) == 'barang'){ echo 'active';}?>" href="<?php echo base_url()?>barang">Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(1) == 'transaksi'){ echo 'active';}?>" href="<?php echo base_url()?>transaksi">Transaksi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(1) == 'customer'){ echo 'active';}?>" href="<?php echo base_url()?>customer">Customer</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


	
	