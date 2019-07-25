<div class="col-md-9 p-3">
	<div class="artikel">
		<h5>Berita baru baru ini</h5>
		<hr class="divider">
		<?php if (count($berita) < 1) : ?>
			<h3>Not Result found!</h3>
		<?php else : ?>
			<?php foreach ($berita as $artikel) : ?>
				<article>
					<div class="artikel-item" id="artikel">
						<div class="text">
							<a href="<?= base_url('artikel/'.$artikel['slug']); ?>" class="artikel-title"><h3><?= $artikel['title']; ?></h3></a>
							<p>
								<?php if (strlen($artikel['deskripsi']) >= 128) : ?>
									<?= substr($artikel['deskripsi'], 0, 128); ?>...
								<?php else : ?>
									<?= $artikel['deskripsi']; ?>
								<?php endif; ?>
							</p>
							<a class="mr-2" class="a"><?= date('D M Y', strtotime($artikel['created_at'])); ?></a><a class="a">By <?= $artikel['author']; ?></a>
						</div>
						<div class="artikel-image">
							<img src="<?= base_url('assets/images/berita/'.$artikel['gambar']); ?>">
						</div>
					</div>
					<div class="clearfix"></div>
					<hr class="divider">
				</article>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
<?php $this->load->view('public/templates/sidebar'); ?>	


