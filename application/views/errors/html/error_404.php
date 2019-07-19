<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>404 Page Not Found</title>
<style type="text/css">
body {
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	background: #f2f2f2;
}

.image {
	background: url('http://localhost/codeigniter/assets/images/404/undraw_not_found_60pq.svg') center center;
	background-repeat: no-repeat;
	background-size: contain;
	padding: 30px;
}

a {
	padding: 7px 20px;
	border-radius: 40px;
	background: #70d9e6;
	color: #ffffff;
	box-shadow: 0 2px 5px rgba(0,0,0,0.05);
	text-decoration: none;
	font-family: 'Arial', 'Helvetica', sans-serrif;
	font-size: 12px;
	display: inline-block;
	text-align: center;
	transition: .3s;
}

a:hover {
	background: #64c3cf;
}

.container h1 {
	position: relative;
	top: -20px;
	letter-spacing: 15px;
	color: #444;
	text-align: center;
}

@media (min-width: 786px) {
	.container h1 {
		display: inline-block;
		font-family: 'Arial', 'Helvetica', sans-serrif;
		font-size: 50px;
	}

	.container h1 span {
		font-size: 120px;
	}
}

@media (max-width: 786px) {
	.container h1 {
		display: inline-block;
		font-family: 'Arial', 'Helvetica', sans-serrif;
		font-size: 30px;
	}

	.container h1 span {
		font-size: 70px;
	}
}

p {
	text-align: center;
}
</style>
</head>
<body>
	<div class="container">
		<div class="image">
			<h1><span>404</span></h1>
		</div>
		<p><a href="http://localhost/codeigniter/">Beranda</a></p>
	</div>
</body>
</html>