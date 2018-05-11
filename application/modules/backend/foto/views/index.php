<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<section class="content">
  <div class="row">
	<form action="" method="post">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title"><?php if(isset($sub_title)) echo $sub_title; ?></h3>
		   	<span class="tombol-title pull-right">
		    	<a id="btn_create" class="btn btn-s btn-info " href="<?php echo backend_url().this_module().'/add'; ?>">
					<i class="ion-plus-round"></i>
  					Create
				</a>
				<a id="btn_bulk_delete" class="btn btn-s btn-danger " remote="<?php echo backend_url().this_module().'/delete_action'; ?>" data-toggle="modal" data-target="#myModal">
					<i class="fa fa-trash"></i>
  					Bulk Delete
				</a>
			</span>
	
			<!-- Modal HTML -->
			<div id="myModal" class="modal fade modal-primary">
				<div class="modal-dialog">
						<div class="modal-content">
							<section>
								<div class="content-wrapper">
									<div class="box box-body">			
									</div>
								</div>
							</section>	
						</div>
				</div>
			</div>	  
		</div><!-- /.box-header -->
		<div class="box-body">
		  <?php show_alert('success',$this->session->flashdata('success_msg'));?>
		  <?php show_alert('warning',$this->session->flashdata('delete_msg'));?>
		  <table id="dt_basic" class="table table-bordered table-striped dataTable dt-responsive">
				<thead>
					<tr>
						<th class="th_no" data-hide="phone"><input id="main_checkbox" name="main_checkbox" type="checkbox" value=""></th>
						<th class="th_no" data-hide="phone">No</th>
						<th data-class="expand">Nama</th>
						<th data-hide="phone,tablet">Image</th>				
						<th>Action</th>
					</tr>
					 <?php
	           $no=0;
             foreach ($sql as $obj){
             $no++;
           ?>
				</thead>
			<tbody>
				<tr>
					<td class="th_no" data-hide="phone"><input id="main_checkbox" name="main_checkbox" type="checkbox" value=""></td>
					<td><?php echo $no; ?></td>
					<td class="sorting_1"><?php echo $obj['judul'] ?></td>
          			<td><?php echo $obj['cover'] ?></td>
          <td>
          	<a href="<?=base_url(); ?>backend/foto/ubah/<?php echo $obj['id']; ?>"class='btn btn-xs btn-flat btn-info'>Ubah</a>
            <a href="javascript:if(confirm('Apakah Anda Yakin Menghapus Data ini  ?')){document.location='<?php echo base_url(); ?>backend/foto/hapus/<?php echo $obj['id']; ?>';}" class='btn btn-flat btn-xs btn-danger'>Hapus</a>
          </td>
				</tr>
			</tbody>
				<?php
					}
				?>
		  </table>
		</div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
	</form>
  </div><!-- /.row -->
</section><!-- /.content -->
</div>
