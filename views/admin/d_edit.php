<section id="breadcrumb">
  <ol class="breadcrumb">
    <li class="active">Dashboard/</li>
  </ol>
</section>
<div class="card">
  <h3 class="card-header">Data Lokasi</h3>
  <div class="card-body">
    <a href="./?page=eedit" class="btn btn-danger"><i class="fa fa-user-plus"></i></a><br/>
    <div class="table-responsive">
       <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-light">
          <tr>
            <th>No</th>
            <th>Nama Custom</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php
$row = $db->selectall("SELECT * FROM tb_costum");
$no = 1;
foreach ($row as $a) {
	?>
         <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $a['nm_custom']; ?></td>
          <td>
            <a href="./?page=eedit&2wsxzaq1=qw&1qazxsw2=<?php echo $a['id'] ?>"><i class="fa fa-edit" alt="edit" title="edit"></i></a>
            <a onclick="return confirm('Are you sure you want to delete this item?');" href="./?page=eedit&2wsxzaq1=qa&1qazxsw2=<?php echo $a['id'] ?>"><i class="fa fa-trash" alt="delete" title="delete"></i></a>
          </td>
        </tr>
        <?php $no++;}?>
      </tablee>
    </div>
    <!-- Paging -->
    <!--  -->
 </div>

</div>
