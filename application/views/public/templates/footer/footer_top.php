<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h3>Sipapat</h3>
					<ul>
						<li><i class="fas fa-location-arrow"></i> <p>Srobyong, Mlonggo, Jepara, Jawa Tengah</p></li>
						<li><i class="far fa-envelope"></i> <p>infodesa@yahoo.com</p></li>
						<li><i class="fas fa-phone-alt"></i> <p>+62 890 898 890</p></li>
					</ul>
				</div>	
				<div class="col-md-3">
					<h5>Nav Links</h5>
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Kategori</a></li>
						<li><a href="#">Tentang</a></li>
						<li><a href="#">Kontak</a></li>
						<li><a href="#">Acara</a></li>
						<li><a href="#">Donatur</a></li>
						<li><a href="#">Dana</a></li>
					</ul>
				</div>	
				<div class="col-md-3">
					<h5>Nav Links</h5>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt.
					</p>
				</div>	
				<div class="col-md-3">
					<?= $this->session->flashdata('message'); ?>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.
					</p>
					<form action="<?= base_url('subscribe'); ?>" method="POST">
						<div class="input-btn">
							<input type="text" name="email" placeholder="Your email" value="<?= set_value('email'); ?>">
							<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
							<button style="font-weight: bold;text-transform: uppercase;">Subscribe</button>
						</div>
					</form>
				</div>	
			</div>
			<br>