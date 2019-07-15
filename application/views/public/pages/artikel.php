<div class="col-md-9 pt-3">
	<article>
		<img src="<?= base_url('assets/images/berita/'.$artikel['gambar']); ?>" class="artikel-image mb-3">
		<div class="artikel-text">
			<h3><?= $artikel['title']; ?></h3>
			<small><?= $artikel['author']; ?></small>
			<p>
				<?= $artikel['deskripsi']; ?>
			</p>
		</div>
	</article>	
</div>
