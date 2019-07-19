<div class="col-md-9 p-3">
	<div class="content-wrapper mb-2" style="background: #f2f2f2;">
		<div class="item" id="text">
			<h1>Selamat datang di website desa <strong>Srobyong</strong>.</h1>
			<a href="#artikel" id="btn" class="btn-custom mr-1" style="font-weight: bold;">Ayo Kunjungi <i class="fas fa-arrow-right"></i></a>
		</div>
	</div>
	<div class="artikel">
		<h5>Berita</h5>
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
	<?php $this->load->view('public/templates/pagination'); ?>
</div>