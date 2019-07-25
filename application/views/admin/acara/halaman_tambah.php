<div class="content-wrapper">
	<section class="content-header">
		<h1>
      Acara
      <small>Halaman tambah acara</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">form</a></li>
      <li class="active">Tambah Acara</li>
    </ol>
	</section>
	<section class="content">
		<div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title mb-2">Tambah Acara</h3>
        <?= $this->session->flashdata('message'); ?>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="<?= base_url('acara/tambah'); ?>" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul" value="<?php echo set_value('title'); ?>">
            <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control textarea" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi"><?php echo set_value('email'); ?></textarea>
            <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="start-at">Dimulai pada</label>
            <input type="date" name="start_at" id="start-at" class="form-control">
            <?= form_error('start_at', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="end-at">Berakhir pada</label>
            <input type="date" name="end_at" id="end-at" class="form-control">
            <?= form_error('end_at', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori" class="form-control">
              <option disabled>-- kategori --</option>
              <option>Pertanian</option>
              <option>Peternakan</option>
              <option>Olahraga</option>
              <option>Politik</option>
              <option>Teknologi</option>
            </select>
            <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" id="foto" name="foto">
            <small class="text-danger pl-3"><?= $error; ?></small>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
	</section>
</div>
<script src="<?= base_url('assets/'); ?>bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('deskripsi')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>