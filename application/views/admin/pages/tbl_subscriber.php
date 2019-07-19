<div class="content-wrapper">
  <div class="content-header">
    <h1>
      Subscriber
      <small>Detail dari tabel subscriber</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tabel</a></li>
      <li class="active">Subscriber</li>
    </ol>
    <?= $this->session->flashdata('message'); ?>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tabel Subscriber</h3>
            <div class="box-tools">
              <form action="<?= base_url('menu/search/subscriber'); ?>" method="get">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="key" class="form-control pull-right" placeholder="Search">
                    <input type="hidden" name="field" value="email">
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
                <th>Email</th>
                <th>Send at</th>
                <th>Aksi</th>
              </tr>
              <?php $i = 1; ?>
              <?php foreach ($subscriber as $item) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $item['id']; ?></td>
                  <td><?= $item['email']; ?></td>
                  <td><?= $item['created_at']; ?></td>
                  <td><a href="<?= base_url('menu/subs_delete/'.$item['id']); ?>" class="btn btn-danger" style="margin-bottom: 20px;"><i class="fa fa-trash"></i></a></td>
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
