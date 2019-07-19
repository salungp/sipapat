<div class="content-wrapper">
  <div class="content-header">
    <h1>
      Detail Kontak
      <small>Tabel kontak</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tabel</a></li>
      <li class="active">Kontak</li>
    </ol>
    <?= $this->session->flashdata('message'); ?>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tabel Kontak</h3>
            <div class="box-tools">
              <form action="<?= base_url('menu/search/kontak'); ?>" method="get">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="key" class="form-control pull-right" placeholder="Search">
                    <input type="hidden" name="field" value="nama">
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
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Waktu</th>
                <th>Aksi</th>
              </tr>
              <?php $i = 1; ?>
              <?php foreach ($kontak as $item) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $item['id']; ?></td>
                  <td><?= $item['nama']; ?></td>
                  <td><?= $item['email']; ?></td>
                  <td><?= $item['pesan']; ?></td>
                  <td><?= $item['created_at']; ?></td>
                  <td><a href="<?= base_url('menu/kontak_delete/'.$item['id']); ?>" class="btn btn-danger" style="margin-bottom: 20px;"><i class="fa fa-trash"></i></a></td>
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
