<div class="content-wrapper">
  <div class="content-header">
    <h1>
      Berita
      <small>Detail dari berita</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tabel</a></li>
      <li class="active">Berita</li>
    </ol>
    <?= $this->session->flashdata('message'); ?>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Tabel Berita</h3>
            <?php if (USER['role_id'] == 1) : ?>
              <a href="<?= base_url('berita/tambah'); ?>" class="btn btn-danger"><b style="font-size: 17px;">+</b></a>
            <?php endif; ?>
            <div class="box-tools">
              <form action="<?= base_url('berita/search/'); ?>" method="get">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="key" class="form-control pull-right" placeholder="Search">
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
                <th>Title</th>
                <th>Slug</th>
                <th>Author</th>
                <th>Deskripsi</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Gambar</th>
                <th>Author ID</th>
                <th>Delete</th>
                <th>Update</th>
              </tr>
              <?php $i = 1; ?>
              <?php foreach ($berita as $item) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $item['id']; ?></td>
                  <td><?= $item['title']; ?></td>
                  <td><?= $item['slug']; ?></td>
                  <td><?= $item['author']; ?></td>
                  <td><?= $item['deskripsi']; ?></td>
                  <td><?= $item['created_at']; ?></td>
                  <td><?= $item['updated_at']; ?></td>
                  <td><?= $item['gambar']; ?></td>
                  <td><?= $item['author_id']; ?></td>
                  <td>
                    <a href="<?= base_url('berita/delete/'.$item['id']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                  </td>
                  <td>
                    <a href="<?= base_url('berita/update/'.$item['id']); ?>" class="btn btn-primary"><i class="fa  fa-pencil-square-o"></i></a>
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
