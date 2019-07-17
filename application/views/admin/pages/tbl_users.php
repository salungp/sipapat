<?php $userdata = $this->session->userdata(); ?>
<div class="content-wrapper">
  <div class="content-header">
    <h1>
      Tabel Users
      <small>Isi dari tabel users</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tabel</a></li>
      <li class="active">Users</li>
    </ol>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tabel Users</h3>
            <?php if ($userdata['role_id'] == 1) : ?>
              <a href="<?= base_url('admin/add_user'); ?>" class="btn btn-danger"><i class="fa fa-user-plus"></i></a>
            <?php endif; ?>
            <div class="box-tools">
              <form action="<?= base_url('menu/search/users'); ?>" method="get">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="key" class="form-control pull-right" placeholder="Search">
                    <input type="hidden" name="field" value="name">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>No</th>
                <th>ID</th>
                <th>Foto</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role id</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Gambar</th>
                <?php if ($userdata['role_id'] == 1) : ?>
                  <th>Aksi</th>
                <?php endif; ?>
              </tr>
              <?php $i = 1; ?>
              <?php foreach ($users as $user) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $user['id']; ?></td>
                  <th><img src="<?= base_url('assets/images/users/'.$user['gambar']); ?>" width="100" alt="<?= $user['gambar']; ?>"></th>
                  <td><?= $user['name']; ?></td>
                  <td><?= $user['slug']; ?></td>
                  <td><?= $user['email']; ?></td>
                  <td><?= $user['username']; ?></td>
                  <td><?= substr($user['password'], 0, 15); ?>...</td>
                  <td>
                    <?php
                    switch ($user['role_id'])
                    {
                      case 1 :
                        echo '<div class="label label-primary">Admin</div>';
                      break;
                      case 2 :
                        echo '<div class="label label-warning">Editor</div>';
                      break;
                      case 3 :
                        echo '<div class="label label-danger">Visitor</div>';
                      break;
                    }
                    ?>
                  </td>
                  <td><?= $user['created_at']; ?></td>
                  <td><?= $user['updated_at']; ?></td>
                  <td><?= $user['gambar']; ?></td>
                  <?php if ($userdata['role_id'] == 1) : ?>
                    <th>
                      <a href="<?= base_url('admin/delete/'.$user['id']); ?>" class="btn btn-danger" style="margin-bottom: 20px;"><i class="fa fa-trash"></i></a>
                      <a href="<?= base_url('admin/update/'.$user['id']); ?>" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a>
                    </th>
                  <?php endif; ?>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
