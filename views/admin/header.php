<?php
$id = 1;

if (!empty($id)) {
	$row = $db->select("select * from tb_header where id=?", [$id]);
	$btn = "Edit";
	$nm_desa = $row['nm_desa'];
	$id_cus = $row['id_custom'];
	$fav = $row['favicon'];
	$judul = $row['judul'];
}

//==============================Insert update Data==================================================================
if (isset($_POST['kirim'])) {
	$nama_desa = $_POST['nm_desa'];
	$id_cus = $_POST['id_custom'];
	$judul = $_POST['judul'];
	$favi = $_FILES['fav']['name'];
	if ($favi == "") {
		$gbr = $fav;
	} else {
		$gbr = $favi;
	}
	$src = $_FILES['fav']['tmp_name'];
	move_uploaded_file($src, "../../assets/ikon/" . $gbr);

	$kirim = $db->cud("UPDATE tb_header set id_custom =?, nm_desa=?, favicon=?, judul=? where id=?", [$id_cus, $nama_desa, $gbr, $judul, $id]);
	if ($kirim) {
		echo "<script>alert('Data berhasil diupdate')</script>";
		$db->redirect('./?page=head');
		$db->close();
	} else {
		echo "<script>alert('Update gagal!');</script>";
		$db->close();
	}

}
?>
<section id="breadcrumb">
	<ol class="breadcrumb">
		<li class="active">Dashboard/Form Header</li>
	</ol>
</section>

<div class="card">
	<h3 class="card-header text-center">Form Header</h3>
	<div class="card-body">
		<form class="" action="#" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="caption">Nama Desa</label> </br>
				<input type="text" name="nm_desa" required="true" class="form-control" placeholder="Ex: Desa Fiore" value="<?php echo $nm_desa ?>" >
			</div>
			<div class="form-group">
				<label for="">Pilih Tema</label>
				<select class="form-control" name="id_custom" required="true">
					<?php
$a = $db->selectall("SELECT * from tb_costum ");
foreach ($a as $row) {
	if ($row['id'] == $id_cus) {
		$select = "selected";
	} else {
		$select = "";
	}?>
						<option value='<?php echo $row['id'] ?>' <?php echo $select ?>><?=$row['nm_custom']?></option>";
						<?php
}

?>
				</select>
			</div>
			<div class="form-group">
				<label for="">JUDUL</label>
				<textarea name="judul" rows="10" rerquired="true" class="form-control mce" ><?php echo $judul ?></textarea>
			</div>
			<div class="form-row">
				<div class="col">
					<label for="">Favicon</label>
					<div class="custom-file">
						<input id="imgInp" type="file" name="fav" class="form-control-file" value="<?php echo $fav; ?>">
						<label for="imgInp" class="custom-file-label"><?php echo $fav; ?></label>
					</div>
				</div>
				<div class="col">
					<?php $tmp = "../../assets/favicon/"?>
					<img id="picture" alt="Gambar Anda" class="img-thumbnail" width="48px" height="300" src="<?php echo $tmp . $fav ?>" >
				</div>
			</div>
			<div class="form-row" style="margin-top: 15px">
				<div class="col-md-1">
					<button type="submit" name="kirim" class="btn btn-primary"><?php echo "$btn" ?></button>
				</div>
				<div class="col-md-2">
					<button type="reset" name="reset" class="btn btn-danger">Reset</button>
				</div>
				<div class="col-md-3">
					<a href="./?page=foto"><button type="button" name="kembali" class="btn btn-danger">Batal</button></a>
				</div>
			</div>


		</form>
	</div>
</div>
