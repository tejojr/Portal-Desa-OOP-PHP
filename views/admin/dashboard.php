<section id="breadcrumb">
  <ol class="breadcrumb">
    <li class="active">Dashboard/MyDashboard</li>
  </ol>
</section>
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary">
      <div class="card-body">
        <span class="float-left">
          <?php
$jumlah = $db->selectall("SELECT * FROM tb_costum");
$a = count($jumlah);
echo $a;
?></span>
          <span class="float-right">
            <i class="fa fa-pencil-square-o fa-3x"></i>
          </span>
        </div>
        <a class="card-footer text-white " href="./?page=edit">
          <span class="float-left">Tema</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success">
        <div class="card-body">
          <span class="float-left"><?php
$jumlah = $db->selectall("SELECT * FROM tb_konten");
$a = count($jumlah);
echo $a;?></span>
          <span class="float-right">
            <i class="fa fa-navicon fa-3x"></i>
          </span>
        </div>
        <a class="card-footer text-white" href="./?page=menu">
          <span class="float-left">Menu</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-danger">
        <div class="card-body">
          <span class="float-left"><?php
$jumlah = $db->selectall("SELECT * FROM tb_admin");
$a = count($jumlah);
echo $a;?></span>
          <span class="float-right">
            <i class="fa fa-user fa-3x"></i>
          </span>
        </div>
        <a class="card-footer text-white" href="./?page=akun">
          <span class="float-left">Akun</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
  </div>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h4>Selamat Datang <?php echo $nama; ?> di Dashboard <small>PORTAL</small></h4>
      <p>&copy; TIM RPL BLC Telkom Klaten 2018</p>
    </div>
  </div>
