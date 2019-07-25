<div class="col-md-9 pt-3">
	<div class="artikel">
		<h5 style="display: inline-block;">Acara di Desa Srobyong</h5>
		<p style="float: right;display: inline-block;margin: 0;padding: 0;">Jumlah acara <b><?= count($acara); ?></b></p>
		<hr class="divider">
		<?php if (count($acara) < 1) : ?>
			<h3>Not Result found!</h3>
		<?php else : ?>
			<?php foreach ($acara as $artikel) : ?>
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
							<img src="<?= base_url('assets/images/acara/'.$artikel['gambar']); ?>">
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