<div class="content-wrapper">
  <div class="content-header">
    <h1>
      Log Login
      <small>Detail dari log login</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tabel</a></li>
      <li class="active">Log Login</li>
    </ol>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tabel Log</h3>
            <div class="box-tools">
              <form action="<?= base_url('menu/search/log_login'); ?>" method="get">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="key" class="form-control pull-right" placeholder="Search">
                    <input type="hidden" name="field" value="username">
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
                <th>Username</th>
                <th>Password</th>
                <th>Login at</th>
                <th>Type</th>
              </tr>
              <?php $i = 1; ?>
              <?php foreach ($log_login as $log) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $log['id']; ?></td>
                  <td><?= $log['username']; ?></td>
                  <td><?= $log['password']; ?></td>
                  <td><?= $log['created_at']; ?></td>
                  <td>
                    <?php
                    switch ($log['type']) {
                      case 'success' :
                        echo '<div class="label label-success">'.$log['type'].'</div>';
                      break;
                      case 'wrong password' :
                        echo '<div class="label label-warning">'.$log['type'].'</div>';
                      break;
                      case 'failed email' :
                        echo '<div class="label label-danger">'.$log['type'].'</div>';
                      break;
                    } ?>
                  </td>
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
