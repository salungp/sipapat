<div class="col-md-9 pt-3">
	<?= $this->session->flashdata('message'); ?>
	<div class="content-wrapper">
		<div class="item">
			<h3>Home / Kontak</h3>
		</div>
	</div>
	<div class="box">
		<form action="<?= base_url('kirim_kontak'); ?>" method="POST">
			<label for="nama">Nama</label><br>
			<input type="text" name="nama" id="nama" placeholder="Masukkan nama" class="form-control" value="<?= set_value('nama');?>">
			<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?><br>
			<label for="email">Email</label><br>
			<input type="text" name="email" id="email" placeholder="Masukkan email" class="form-control" value="<?= set_value('email'); ?>">
			<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?><br>
			<label for="pesan">Pesan</label><br>
			<textarea id="pesan" name="pesan" class="form-control" placeholder="Masukkan pesan"><?= set_value('pesan'); ?></textarea>
			<?= form_error('pesan', '<small class="text-danger pl-3">', '</small>'); ?><br>
			<button type="submit" class="btn btn-primary">Kirim</button>
		</form>
	</div>
</div>