<div class="content-wrapper">
	<section class="content-header">
		<h1>
		Add Content
		<small>Halaman Tambah Konten</small>
		</h1>
		<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Content</a></li>
				<li class="active">Add Content</li>
		</ol>
	</section>
	<section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Add Content</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form">
        <div class="box-body">
          <div class="form-group">
            <label for="title">Judul / Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul">
          </div>
					<div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="deskripsi" placeholder="Masukkan deskripsi"></textarea>
          </div>
					<div class="form-group">
            <label for="jenis">Jenis</label>
            <select name="jenis" id="jenis" class="form-control">
							<option>Header</option>
							<option>Sidebar</option>
							<option>Content</option>
							<option>footer</option>
						</select>
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