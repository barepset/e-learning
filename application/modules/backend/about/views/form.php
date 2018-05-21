<?php require_once "v_header.php"; ?>
  <div class="content-wrapper">
  <section class="content-header">
    <h1>
      About
      <small>LAB I</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Data About</a></li>
      <li class="active">LAB I</li>
    </ol>
  </section>
  <?php
   $about_desc = "";

    if ($ed == "update") {
     foreach ($sql->result() as $obj) {
       $about_desc = $obj->about_desc;
     }
   }

    ?>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
            <div class="box-body">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah About</h3>
            </div>
            <!-- Button trigger modal -->

            <form enctype="multipart/form-data" role="form" action="<?= base_url('backend/about/')."/$ed"?>" method="POST" >
              <div class="box-body">
                <div class="form-group col-md-8 ">
                  <label>About Description</label>
                  <input type="text" name="about_desc" value="<?php echo $about_desc; ?>" class="form-control" placeholder="Description">
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
