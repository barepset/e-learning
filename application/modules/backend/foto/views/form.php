<?php require_once "v_header.php"; ?>
  <div class="content-wrapper">
  <section class="content-header">
    <h1>
      Data Barang
      <small>LAB I</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Data Barang</a></li>
      <li class="active">LAB I</li>
    </ol>
  </section>
  <?php
   $judul         = "";
   $deskripsi         = "";
   $cover        = "cover";

    if ($ed == "update") {
     foreach ($sql->result() as $obj) {
       $judul       = $obj->judul;
       $deskripsi       = $obj->deskripsi;
       $cover      = $obj->cover;
     }
   }

    ?>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
            <div class="box-body">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Gallery foto</h3>
            </div>
            <!-- Button trigger modal -->

            <form enctype="multipart/form-data" role="form" action="<?= base_url('backend/foto/')."/$ed"?>" method="POST" >
              <div class="box-body">
                <div class="form-group col-md-8 ">
                  <label>Title</label>
                  <input type="text" name="judul" value="<?php echo $judul; ?>" class="form-control" placeholder="Foto Seksi">
                </div>
                <div class="form-group col-md-8 ">
                  <label>Deskripsi</label>
                  <input type="text" name="deskripsi" value="<?php echo $deskripsi; ?>">
                </div>
                <div class="form-group col-md-4 ">
                  <label>Foto</label>
                  <input type="file" value="<?php echo $cover; ?>" name="cover">
                </div>
            </div>
              <div class="box-footer">
                &nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-flat btn-primary">SIMPAN</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </section>
</div>
