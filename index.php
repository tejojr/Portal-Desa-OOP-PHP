 <?php
include_once "inc/Database.php";
$id = 1;
$db = new Database();
$head = $db->select("SELECT  * FROM tb_header where id=?", [$id]);
$id_cus = $head['id_custom'];
$menu = $db->selectall("SELECT * FROM tb_konten WHERE status=? ", ['1']);
$cus = $db->select("SELECT * FROM tb_costum WHERE id=? ", [$id_cus]);
$b = $cus['id_button_color'];
$c = $cus['id_animasi'];
$btn = $db->select("SELECT * FROM tb_button_color WHERE id=? ", [$b]);
$anim = $db->select("SELECT * FROM tb_animasi WHERE id=? ", [$c]);

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0">
  <title>Portal Desa <?=$head['nm_desa']?></title>
  <link rel="shortcut icon" href="assets/favicon/<?=$head['favicon']?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="assets/css/hover-min.css" rel="stylesheet">
  <!--   <link rel="stylesheet" type="text/css" href="assets/css/style1.css"> -->
  <style type="text/css">
  a{
    color: <?php echo '#' . $cus['warna_link'] ?>;
  }
  .card{
    color: <?php echo '#' . $cus['card_text_color']; ?>;
    box-shadow: 0 8px 8px 0 rgba(0,0,0,0.2), 8px 8px 8px 0 rgba(0,0,0,0.19);
  }
  .card-header{
    background-color:<?php echo '#' . $cus['card_warna_header']; ?>;
  }
  .card-body{
   background-color:<?php echo '#' . $cus['card_warna_body']; ?>;
 }
 .card-footer{
  background-color:<?php echo '#' . $cus['card_warna_footer']; ?>;
}
body{
  <?php
if ($cus['s_back'] == "gambar") {
	?>
   background-image: url('<?php echo 'assets/background/' . $cus['back_gambar'] ?>');
   background-size: cover;
   background-repeat: no-repeat;
   width: 100%;
   height: 100%;
   background-position: absolute;
   position: relative;
   <?php
} else {
	?>
   min-height: 100vh;
   position: relative;
   margin: 0;
   background-color: <?php echo '#' . $cus['back_color'] ?>;
   <?php
}

?>
 color: <?php echo '#' . $cus['text_color']; ?>;
}
footer{
  text-align: center;
  font-family: lato;
  position: absolute;
  bottom: 0;
  width: 100%;
  height: auto;
  color: blue;
  line-height: 30px;
  color: <?php echo '#' . $cus['t_footer']; ?>;
  background: <?php echo '#' . $cus['b_footer']; ?>;
}
</style>
</head>
<body>
  <header>
   <div class="jumbotron jumbotron-fluid" style="background-color: transparent;">
    <div class="container">
     <center>
      <?=$head['judul']?>
    </center>
  </div>
</div>
</header>
<content>
 <div class="container">
  <div class="row">
    <?php foreach ($menu as $a) {
	?>
     <div class="col-lg-3 col-md-4 col-sm-6 col-12" style="margin-bottom:20px; ">
       <div class="card text-center">
        <div class="card-header "><b><?=$a['nama']?></b></div>
        <div class="card-body text-success">
          <div class="hvr-<?=$anim['nama']?> ">
            <img class="img-fluid" style=" height:200px" src="assets/ikon/<?=$a['gambar']?>" alt="">
          </div>
        </div>
        <div class="card-footer"><a href="<?php echo 'http://' . $a['url'] ?>" target="_blank"><button type="button" class="btn btn-outline-<?=$btn['nilai']?> btn-block hvr-underline-from-center">Klik Disini</button></a></div>
      </div>
    </div>
    <?php
}?>

</div>
</div>
</content>
<br><br>
<footer>
	<p><b>
    &copy; 2018 TIM RPL BLC Telkom Klaten<br>
  </b></p>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>