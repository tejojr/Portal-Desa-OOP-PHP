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
		$row = $db->select("select * from tb_costum where id=?", [$id]);
		$btn = "Edit";
		$id_animasi = $row['id_animasi'];
		$btn_color = $row['id_button_color'];
		$nm_custom = $row['nm_custom'];
		$t_color = $row['text_color'];
		$b_gambar = $row['back_gambar'];
		$b_color = $row['back_color'];
		$l_color = $row['warna_link'];
		$ch_warna = $row['card_warna_header'];
		$cb_warna = $row['card_warna_body'];
		$cf_warna = $row['card_warna_footer'];
		$ct_warna = $row['card_text_color'];
		$b_footer = $row['b_footer'];
		$t_footer = $row['t_footer'];
		$s_back = $row['s_back'];
		//$db->Close();
	} else if ($aksi == "qa" && !empty($id)) {
		$hasil = $db->select("SELECT * FROM tb_header where id_custom=?", [$id]);
		$id_custom = $hasil['id_custom'];
		if ($id_custom == $id) {
			echo "<script>alert('Data Custom sedang dipakai tidak boleh dihapus!')</script>";
			$db->Close();
			echo "<meta http-equiv='refresh' content='0; url=./?page=edit'>";
		} else {

			$result = $db->cud("delete from tb_costum where id=?", [$id]);
			if ($result) {
				echo "<script>alert('Sukses menghapus Data')</script>";
				$db->Close();
				echo "<meta http-equiv='refresh' content='0; url=./?page=edit'>";
			} else {
				echo "<script>alert('Gagal menghapus Data')</script>";
				$db->Close();
				echo "<meta http-equiv='refresh' content='0; url=./?page=edit'>";
			}
		}
	}
} else {
	$btn = "Simpan";
	$id_animasi = '';
	$btn_color = '';
	$nm_custom = '';
	$t_color = '';
	$b_gambar = '';
	$b_color = '';
	$l_color = '';
	$ch_warna = '';
	$cb_warna = '';
	$cf_warna = '';
	$ct_warna = '';
	$b_footer = '';
	$t_footer = '';
	$s_back = '';
}
?>
<section id="breadcrumb">
	<ol class="breadcrumb">
		<li class="active">Dashboard/Form Custom Portal</li>
	</ol>
</section>

<div class="card">
	<h3 class="card-header text-center">Form Custom Portal</h3>
	<div class="card-body">
		<form class="" action="#" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="nama">Nama Custom</label> </br>
				<input type="text" name="nm_custom" required="true" id="nm_custom" class="form-control" placeholder="Ex: Tampilan versi 1.." value="<?php echo $nm_custom ?>" >
			</div>
			<div class="form-group">
				<label for="">Pilih Animasi Menu</label>
				<select class="form-control" name="id_animasi" required="true">
					<?php
$a = $db->selectall("SELECT * from tb_animasi ");
foreach ($a as $row) {
	if ($row['id'] == $id_animasi) {
		$select = "selected";
	} else {
		$select = "";
	}?>
						<option value='<?=$row['id']?>' <?=$select?> ><?=$row['nama']?></option>";
						<?php }

?>
					</select>
				</div>
				<div class="form-group">
					<label for="">Pilih  Warna Tombol</label>
					<select class="form-control" name="id_button_color" required="true">
						<?php
$a = $db->selectall("SELECT * from tb_button_color ");
foreach ($a as $row) {
	if ($row['id'] == $btn_color) {
		$select = "selected";
	} else {
		$select = "";
	}?>
							<option value='<?=$row['id']?>' <?=$select?> ><?=$row['nama']?></option>";
							<?php }

?>
						</select>
					</div>
					<div class="form-group">
						<label for="nama">Warna Link</label> </br>
						<input class="jscolor form-control" name="warna_link" required="true"  value="<?php echo $l_color ?>">

					</div>
					<div class="form-group">
						<label for="nama">Warna Text</label> </br>
						<input class="jscolor form-control" placeholder="warna tex.." name="text_color" required="true" value="<?php$echo $t_color ?>">

					</div>
					<div class="form-group">
						<label for="nama">Background Color</label> </br>
						<input class="jscolor form-control" placeholder="warna tex.." name="back_color" value="<?php echo $b_color ?>">

					</div>
					<div class="form-group">
						<label for="nama">Warna Header Menu</label> </br>
						<input class="jscolor form-control" placeholder="warna tex.." name="card_warna_header" required="true" value="<?php echo $ch_warna ?>">
					</div>
					<div class="form-group">
						<label for="nama">Warna Body Menu</label> </br>
						<input class="jscolor form-control" placeholder="warna tex.." name="card_warna_body" required="true" value="<?php echo $cb_warna ?>">
					</div>
					<div class="form-group">
						<label for="nama">Warna Footer Menu</label> </br>
						<input class="jscolor form-control" placeholder="warna tex.." name="card_warna_footer" required="true" value="<?php echo $cf_warna ?>">
					</div>
					<div class="form-group">
						<label for="nama">Warna Judul Menu</label> </br>
						<input class="jscolor form-control" placeholder="warna tex.." name="card_text_color" required="true" value="<?php echo $ct_warna ?>">
					</div>
					<div class="form-group">
						<label for="nama">Warna Background Footer</label> </br>
						<input class="jscolor form-control" placeholder="warna tex.." name="b_footer" required="true" value="<?php echo $b_footer ?>">
					</div>
					<div class="form-group">
						<label for="nama">Warna Text Footer</label> </br>
						<input class="jscolor form-control" placeholder="warna tex.." name="t_footer" required="true" value="<?php echo $t_footer ?>">
					</div>
					<div class="form-row">
						<div class="col">
							<label for="">Background Gambar</label>
							<div class="custom-file">
								<input id="imgInp" type="file" name="back_gambar" class="form-control-file">
								<label for="imgInp" class="custom-file-label"><?php echo $b_gambar; ?></label>
							</div>
						</div>
						<div class="col">
							<?php $tmp = "../../assets/background/"?>
							<img id="picture" alt="Gambar Anda" class="img-thumbnail" width="200px" height="200" src="<?php echo $tmp . $b_gambar ?>" >
						</div>
					</div>
					<div class="form-group">
						<label>Pilih Bakcground</label>
						<div class="radio">
							<label>
								<input type="radio" name="s_back" id="pil" value="warna" <?php echo $s_back == "warna" ? "checked" : " " ?>>Warna
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="s_back" id="pil" value="gambar" <?php echo $s_back == "gambar" ? "checked" : " " ?>>Gambar
							</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1">
							<button type="submit" name="kirim" class="btn btn-primary"><?php echo "$btn" ?></button>
						</div>
						<div class="col-md-2">
							<button type="reset" name="reset" class="btn btn-danger">Reset</button>
						</div>
						<div class="col-md-3">
							<a href="./?page=edit"><button type="button" name="kembali" class="btn btn-danger">Batal</button></a>
						</div>
					</div>

				</form>
			</div>
		</div>
		<?php
//==============================Insert update Data==================================================================
if (isset($_POST['kirim'])) {
	$id_animasi = $_POST['id_animasi'];
	$btn_color = $_POST['id_button_color'];
	$nm_custom = $_POST['nm_custom'];
	$t_color = $_POST['text_color'];
	$b_color = $_POST['back_color'];
	$l_color = $_POST['warna_link'];
	$ch_warna = $_POST['card_warna_header'];
	$cb_warna = $_POST['card_warna_body'];
	$cf_warna = $_POST['card_warna_footer'];
	$ct_warna = $_POST['card_text_color'];
	$b_footer = $_POST['b_footer'];
	$t_footer = $_POST['t_footer'];
	$s_back = $_POST['s_back'];
	$back_gambar = $_FILES['back_gambar']['name'];
	if ($back_gambar == "") {
		$gbr = $b_gambar;
	} else {
		$gbr = $back_gambar;
	}
	$src = $_FILES['back_gambar']['tmp_name'];
	move_uploaded_file($src, "../../assets/background/" . $gbr);
	if ($aksi == "qw") {
		$update = $db->cud("UPDATE tb_costum SET id_animasi= ?, id_button_color=?, nm_custom=?, warna_link=?, back_gambar=?, back_color=?, card_warna_header=?, card_warna_footer=?, card_warna_body=?, text_color=?, card_text_color=?, b_footer=?, t_footer=?, s_back=? where id =?", [$id_animasi, $btn_color, $nm_custom, $l_color, $gbr, $b_color, $ch_warna, $cf_warna, $cb_warna, $t_color, $ct_warna, $b_footer, $t_footer, $s_back, $id]);
		if ($update) {
			echo "<script>alert('Sukses Mengubah Data')</script>";
			$db->Close();
			echo "<meta http-equiv='refresh' content='0; url=./?page=edit'>";
		} else {
			echo "<script>alert('UPDATE Gagal!');</script>";
		}

		//$db->redirect('./?page=lokasi');
	} else {
		$kirim = $db->cud("INSERT into tb_costum values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [null, $id_animasi, $btn_color, $nm_custom, $l_color, $gbr, $b_color, $ch_warna, $cf_warna, $cb_warna, $t_color, $ct_warna, $b_footer, $t_footer, $s_back]);
		if ($kirim) {
			echo "<script>alert('Data Berhasil di Simpan')</script>";
			echo "<meta http-equiv='refresh' content='0; url=./?page=edit'>";
			$db->close();
		} else {
			echo "<script>alert('Gagal Menambah Data!');</script>";
		}
		//$db->redirect('./?page=lokasi');
	}

	$db->close();
}
ob_end_flush();
?>