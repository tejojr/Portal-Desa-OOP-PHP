<section id="breadcrumb">
  <ol class="breadcrumb">
    <li class="active">Dashboard/Menu Portal</li>
  </ol>
</section>
<div class="card">
  <h3 class="card-header">Menu Portal</h3>
  <div class="card-body">
    <a href="./?page=emenu" class="btn btn-danger"><i class="fa fa-user-plus"></i></a><br/>
    <div class="table-responsive">
       <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-light">
          <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Ikon</th>
             <th scope="col">URL</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <?php
$no = 1;
$row = $db->selectall("SELECT * FROM tb_konten");
foreach ($row as $a) {
	?>
         <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $a['nama']; ?></td>
          <td  class="text-center"> <img width="100" class="img-thumbnail " src="../../assets/ikon/<?php echo $a['gambar']; ?>" ></td>

          <td><?php echo $a['url']; ?></td>
          <td><?php $stat = $a['status'];
	if ($stat == "1") {
		echo 'Aktif';
	} else {
		echo "Tidak Aktif";
	}

	?></td>
          <td>
            <a href="./?page=emenu&2wsxzaq1=qw&1qazxsw2=<?php echo $a['id'] ?>"><i class="fa fa-edit" alt="edit" title="edit"></i></a>
            <a onclick="return confirm('Are you sure you want to delete this item?');" href="./?page=emenu&2wsxzaq1=qa&1qazxsw2=<?php echo $a['id'] ?>"><i class="fa fa-trash" alt="delete" title="delete"></i></a>
          </td>
        </tr>
        <?php $no++;}?>
      </table>
    </div>
  </div>
</div>
