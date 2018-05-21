<?php require_once "v_header.php"; ?>
  <div class="content-wrapper">
  <section class="content-header">
    <h1>
      Mapel
      <small>Mapel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Data Mapel</a></li>
      <li class="active">LAB I</li>
    </ol>
  </section>
  <?php
   $mapel = "";

    if ($ed == "update") {
     foreach ($sql->result() as $obj) {
       $mapel = $obj->mapel;
     }
   }

    ?>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
            <div class="box-body">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Mapel</h3>
            </div>
            <form enctype="multipart/form-data" role="form" action="<?= base_url('backend/mapel/')."/$ed"?>" method="POST" >
              <div class="box-body">
                <div class="form-group col-md-8 ">
                  <label>Title</label>
                  <input type="text" name="mapel" value="<?php echo $mapel; ?>" class="form-control" placeholder="Mata Pelajaran">
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
