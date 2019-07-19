<div class="col-md-9 pt-3">
	<div class="content-wrapper">
		<div class="item">
			<h3>Home / tentang</h3>
		</div>
	</div>
	<div class="box">
		<h3 id="title">{{ message }}</h3>
		<p id="tentang">{{ message }}</p>
	</div>
</div>
<script>
	var title = new Vue({
		el: '#title',
		data: {
			message: 'Tentang Kami'
		}
	})

	var tentang = new Vue({
		el: '#tentang',
		data: {
			message: 'Ini adalah website desa Srobyong, dibuat dengan system codeigniter dan vue js. Website ini dibuat bertujuan untuk merangkup semua data yang dibutuhkan di desa kami.'
		}
	})
</script>