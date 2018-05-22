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
   $judul_video   = "";
   $deskripsi     = "";
   $video_url     = "";
   $gambar        = "gambar";

    if ($ed == "update") {
     foreach ($sql->result() as $obj) {
       $judul_video       = $obj->judul_video;
       $deskripsi       = $obj->deskripsi;
       $video_url       = $obj->video_url;
       $gambar      = $obj->gambar;
     }
   }

    ?>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
            <div class="box-body">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah URL Video</h3>
            </div>
            <!-- Button trigger modal -->

            <form enctype="multipart/form-data" role="form" action="<?= base_url('backend/video/')."/$ed"?>" method="POST" >
              <div class="box-body">
                <div class="form-group col-md-8 ">
                  <label>Judul</label>
                  <input type="text" name="judul_video" value="<?php echo $judul_video; ?>" class="form-control" placeholder="Mangifera Indica">
                </div>
                <div class="form-group col-md-8 ">
                  <label>Deskripsi</label>
                  <input type="text" name="deskripsi" value="<?php echo $deskripsi; ?>" class="form-control">
                </div>
                <div class="form-group col-md-8 ">
                  <label>URL Video</label>
                  <input type="url" name="video_url" value="<?php echo $video_url; ?>" class="form-control">
                </div>
                <div class="form-group col-md-8 ">
                  <label>Gambar</label>
                  <input type="file" value="<?php echo $gambar; ?>" name="gambar">
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
