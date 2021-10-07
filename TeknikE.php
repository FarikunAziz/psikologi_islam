<?php
session_start();

//logic
include_once 'task/Logic.php';

//fungsi ini memiliki periku yang sama dengan bacaFile, tapi jika menggunakan fungsi itu akan membuat file bernama halo.txt dengan isi 0 setiap halaman ini di akses, itu jelek
@$tuas = Cendol::getUser();

include_once 'task/TeknikE.Identifikasi.php';
 ?>
<!DOCTYPE html>
<html lang="id">
<head>
	<title>Tes Psikologi | Sanguin | Melankolis | Plegmatis | Koleris</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="website untuk melakukan tes psikologi manusia yang ditinjau dari 4 sifat umum, diantaranya sanguin, koleris, melankolis dan plegmatis, karena tidak mungkin hanya ada 1 sifat saja, biasanya ada beberapa sifat yang saling melengkapi satu sama lain">
	<meta name="keywords" content="Tes Psikologi, Sanguin, Melankolis, Plegmatis, Koleris, Tes Kepribadian, Tes sifat manusia, tes melankolis, tes sanguin, tes koleris, tes plegmatis">
	<meta name="author" content="Farikun Aziz">
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="pics/icon.png">
	<link rel="stylesheet" type="text/css" href="assets/style/simple.css/TeknikE.css">
	<link rel="stylesheet" type="text/css" href="assets/js/sweetalert/sweetalert2.css">
	<script src="assets/js/jquery-3.2.1.js"></script>
	<script src="assets/js/TeknikE.Logic.js"></script>
	<script src="assets/js/sweetalert/sweetalert2.js"></script>
	<script src="assets/js/TeknikE.BuruanTidur.js"></script>
</head>
<body background="pics/TeknikE.Background/<?= Cendol::randImageTeknikEBackground(); ?>">

<div class="wrapper">
	<form method="POST" action="" autocomplete="off" id="TeknikE-form">
	<div class="absen">
		<h1>Selamat <?= Cendol::nox($waktu); ?> <span><?= Cendol::sapa(); ?></span></h1>
		<div class="input-fields">
			<input type="text" name="nama" class="input" placeholder="Masukan nama misal user, newUser ..." autofocus>
		</input>
		</div>
		<button type="submit" class="button-submit" name="submit">Mulai Tes</button>
	</div>
	</form>
</div>

<p id="result"></p>
</body>
</html>