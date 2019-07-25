<div class="col-md-9 pt-3">
	<article>
		<h3><?= $artikel['title']; ?></h3>
		<small class="mb-3"><?= $artikel['author']; ?></small>
		<img src="<?= base_url('assets/images/berita/'.$artikel['gambar']); ?>" class="artikel-image">
		<div class="artikel-text">
			<p>
				<?= $artikel['deskripsi']; ?>
			</p>
		</div>
	</article>	
</div>
