<div class="content-wrapper">
	<section class="content-header">
		<h1>
      Add User
      <small>Halaman tambah anggota</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">form</a></li>
      <li class="active">Add User</li>
    </ol>
	</section>
	<section class="content">
		<div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title mb-2">Add Content</h3>
        <?= $this->session->flashdata('message'); ?>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="<?= base_url('admin/tambah_user'); ?>" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" value="<?php echo set_value('nama'); ?>">
            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" value="<?php echo set_value('email'); ?>">
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" value="<?php echo set_value('username'); ?>">
            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="title">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="role_id">Status</label>
            <select name="role_id" id="role_id" class="form-control">
              <option>admin</option>
              <option>editor</option>
              <option>visitor</option>
            </select>
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