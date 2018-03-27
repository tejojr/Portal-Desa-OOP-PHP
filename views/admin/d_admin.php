<section id="breadcrumb">
  <ol class="breadcrumb">
    <li class="active">Dashboard/Manajemen Akun</li>
  </ol>
</section>
<div class="card">
  <h3 class="card-header">Manajemen Akun</h3>
  <div class="card-body">
    <a href="./?page=eakun" class="btn btn-danger"><i class="fa fa-user-plus"></i></a><br/>
    <div class="table-responsive">
         <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <?php
$no = 1;
$row = $db->selectall("SELECT * FROM tb_admin ORDER BY ? ASC", ['id']);
foreach ($row as $a) {
	?>
         <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $a['nama']; ?></td>
          <td><?php echo $a['uname']; ?></td>
          <td>
            <a href="./?page=eakun&2wsxzaq1=qw&1qazxsw2=<?php echo $a['id'] ?>"><i class="fa fa-edit" alt="edit" title="edit"></i></a>
            <a onclick="return confirm('Are you sure you want to delete this item?');" href="./?page=eakun&2wsxzaq1=qa&1qazxsw2=<?php echo $a['id'] ?>"><i class="fa fa-trash" alt="delete" title="delete"></i></a>
          </td>
        </tr>
        <?php $no++;}?>
      </table>
    </div>
  </div>
</div>
