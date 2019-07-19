<nav class="navbar navbar-expand-lg navbar-light">
	<div class="container">
		<a class="navbar-brand" href="<?= base_url(); ?>"><strong>Sipapat.</strong></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?= base_url('acara'); ?>">Acara</a>
		      </li><!-- 
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Kategori
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Satu</a>
		          <a class="dropdown-item" href="#">Dua</a>
		          <a class="dropdown-item" href="#">Tiga</a>
		          <a class="dropdown-item" href="#">Empat</a>
		        </div>
		      </li> -->
		      <li class="nav-item">
		        <a class="nav-link" href="<?= base_url('tentang'); ?>">Info Srobyong</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?= base_url('kontak'); ?>">Kontak</a>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0" action="<?= base_url('cari'); ?>" method="GET">
		    	<div class="input-btn">
		    		<input class="form-control mr-sm-2" type="search" placeholder="Cari artikel..." aria-label="Search" style="border: none;box-shadow: none;outline: none;" name="key">
			    	<button style="background: transparent;border: none;outline: none;color: #555;font-size: 16px;" type="submit"><i class="fas fa-search"></i></button>
		    	</div>
		    </form>
		  </div>
	</div>
</nav>