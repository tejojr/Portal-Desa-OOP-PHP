<?php
ob_start();
if (isset($_GET['2wsxzaq1'])) {
	$aksi = $_GET['2wsxzaq1'];
} else {
	$aksi = "";
}

if (isset($_GET['1qazxsw2'])) {
	$id = $_GET['1qazxsw2'];
} else {
	$id = "";
}

//=========================================================Get Aksi=============================================
if ($aksi) {
	if ($aksi == "qw" && !empty($id)) {
		$row = $db->select("select * from tb_konten where id=?", [$id]);
		$btn = "Edit";
		$nama = $row['nama'];
		$gbr = $row['gambar'];
		$status = $row['status'];
		$url = $row['url'];
		//$db->Close();
	} else if ($aksi == "qa" && !empty($id)) {
		$result = $db->cud("delete from tb_konten where id=?", [$id]);
		if ($result) {
			echo "<script>alert('Sukses menghapus Data')</script>";
			$db->Close();
			echo $db->redirect('./?page=menu');
		} else {
			echo "<script>alert('Gagal menghapus Data')</script>";
			echo $db->redirect('./?page=menu');
		}
	}
} else {
	$btn = "Simpan";
	$nama = "";
	$gbr = "";
	$status = "";
	$url = "";
}
?>
<section id="breadcrumb">
	<ol class="breadcrumb">
		<li class="active">Dashboard/Form Menu Portal</li>
	</ol>
</section>

<div class="card">
	<h3 class="card-header text-center">Form Menu Portal</h3>
	<div class="card-body">
		<form class="" action="#" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="caption">Nama</label> </br>
				<input type="text" name="nama" required="true" class="form-control" placeholder="Ex:Pemerintahan" value="<?php echo $nama ?>" >
			</div>
			<div class="form-group">
				<label for="caption">Alamat/URL</label> </br>
				<input type="text" name="url" required="true" class="form-control" value="<?php echo $url ?>" >
			</div>
			<div class="form-row">
				<div class="col">
					<label for="">Ikon</label>
					<div class="custom-file">
						<input id="imgInp" type="file" name="gbr" class="form-control-file">
						<label for="imgInp" class="custom-file-label"><?php echo $gbr; ?></label>
					</div>
				</div>
				<div class="col">
					<?php $tmp = "../../assets/ikon/"?>
					<img id="picture" alt="Gambar Anda" class="img-thumbnail" width="200px" height="200" src="<?php echo $tmp . $gbr ?>" >
				</div>
			</div>
			<div class="form-group">
				<label>Aktif</label>
				<div class="radio">
					<label>
						<input type="radio" name="status" id="1" value="1" <?php echo $status == "1" ? "checked" : " " ?>>YA
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="status" id="0" value="0" <?php echo $status == "0" ? "checked" : " " ?>>TIDAK
					</label>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2">
					<button type="submit" name="kirim" class="btn btn-primary"><?php echo "$btn" ?></button>
				</div>
				<div class="col-md-2">
					<button type="reset" name="reset" class="btn btn-danger">Reset</button>
				</div>
				<div class="col-md-2">
					<a href="./?page=menu"><button type="button" name="kembali" class="btn btn-danger">Batal</button></a>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
//==============================Insert update Data==================================================================
if (isset($_POST['kirim'])) {
	$nama = $_POST['nama'];
	$status = $_POST['status'];
	$url = $_POST['url'];
	$favi = $_FILES['gbr']['name'];
	if ($favi == "") {
		$ikon = $gbr;
	} else {
		$ikon = $favi;
	}
	$src = $_FILES['gbr']['tmp_name'];
	move_uploaded_file($src, "../../assets/ikon/" . $ikon);
	if ($aksi == "qw") {
		$update = $db->cud("UPDATE tb_konten SET nama =?, gambar=?, status = ?, url=? WHERE id =?", [$nama, $ikon, $status, $url, $id]);
		if ($update) {
			echo "<script>alert('Sukses Mengubah Data')</script>";
			$db->Close();
			echo $db->redirect('./?page=menu');
		} else {
			echo "<script>alert('UPDATE Gagal!');</script>";
		}

	} else {
		$kirim = $db->cud("INSERT into tb_konten values(?,?,?,?,?,?)", [null, 1, $nama, $ikon, $status, $url]);
		//$db->redirect('./?page=lokasi');
		if ($kirim) {
			echo "<script>alert('Sukses Menambahkan Data')</script>";
			$db->Close();
			echo $db->redirect('./?page=menu');
		} else {
			echo "<script>alert('UPDATE Gagal!');</script>";
		}
	}

	$db->close();
}
ob_end_flush();
?>