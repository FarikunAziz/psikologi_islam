<?php 
session_start();

	//pertanyaan
	include_once '4212/4212.php';

	//logic
	include_once 'task/Logic.php';	
	$cendol = new Cendol;

	include_once 'task/index.Identifikasi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<title>
		<?php 
		Cendol::waktu($hari, $tanggal, $bulan, $tahun)
		 ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="website untuk melakukan tes psikologi manusia yang ditinjau dari 4 sifat umum, diantaranya sanguin, koleris, melankolis dan plegmatis, karena tidak mungkin hanya ada 1 sifat saja, biasanya ada beberapa sifat yang saling melengkapi satu sama lain">
	<meta name="keywords" content="Tes Psikologi, Sanguin, Melankolis, Plegmatis, Koleris, Tes Kepribadian, Tes sifat manusia, tes melankolis, tes sanguin, tes koleris, tes plegmatis">
	<meta name="author" content="Farikun Aziz">
	<link rel="stylesheet" href="assets/style/simple.css/index.css">
	<link rel="icon" type="image/png" href="pics/icon.png">
	<link rel="stylesheet" type="text/css" href="assets/fontawasome/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/style/simple.css/index.Creator.css">
	<link rel="stylesheet" type="text/css" href="assets/js/sweetalert/sweetalert2.css">
	<script src="assets/js/jquery-3.2.1.js"></script>
	<script src="assets/js/sweetalert/sweetalert2.js"></script>
	<script src="assets/js/index.Creator.js"></script>
	<script src="assets/js/index.Keluar.js"></script>
	<script src="assets/js/index.Relashio.js"></script>
	<script src="assets/js/index.Identifikasi.js"></script>
</head>
<body>

<?php if(isset($_SESSION['pelajar']) and $cendol->bacaFile('batman/halo.txt'.$_SESSION['pelajar']) == 1):?>
	<script>
		var pesan = '<?= $_SESSION['judul']; ?>';
		var welcome = ['1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png','9.png','10.png'];
		var acak = welcome[Math.floor(Math.random() * welcome.length)];
		Swal.fire({
		    title: '<i>Selamat Datang '+pesan+' </i>',
		    text: "Harap Menjawab Secara Jujur",
		    imageUrl:"pics/index.Welcome/"+acak,
			imageWidth:100,
			imageHeight:100,
		});
	</script>
<?php endif; ?>

<div id="whoami">
	<section class="opera" id="opera" style="background-color: <?= Cendol::changeColor(); ?>">
		<h1>Pertanyaan ke <?= $cendol->bacaFile('batman/halo.txt'.$_SESSION['pelajar']); ?></h1>
		<?php if($cendol->bacaFile('batman/halo.txt'.$_SESSION['pelajar']) > 20): ?>
			<h2>Kelebihan</h2>
			<?php include_once 'assets/style/simple.css/index.Smile.css'; ?>
		<?php else: ?>
			<h2>Kelemahan</h2>
			<?php include_once 'assets/style/simple.css/index.Sad.css'; ?>		
		<?php endif; ?>

		<div id="stinger">
			<ol>
				<li class="sanguin">
					<p class="pilihan">
						<?php 
						//Cendol::getKey() berisi kunci array, tidak bisa diakses langsung karena berbentuk Array
						//Cendol::getKey()::[0/1/2/3] kunci dengan lebih spesifik, Cendol::getKey()[0] = sanguin dst...
						?>
						<input type="radio" name="kepribadian" value="<?= Cendol::getKey()[0].' '; ?><?= $ask['SANGUIN'][$cendol->bacaFile('batman/halo.txt'.$_SESSION['pelajar'])]; ?>" id="kepribadianS">
						<label for="kepribadianS"><?= $ask['SANGUIN'][$cendol->bacaFile('batman/halo.txt'.$_SESSION['pelajar'])]; ?></label>
					</p>
				</li>

				<li class="koleris">
					<p class="pilihan">
						<input type="radio" name="kepribadian" value="<?= Cendol::getKey()[1].' '; ?><?= $ask['KOLERIS'][$cendol->bacaFile('batman/halo.txt'.$_SESSION['pelajar'])]; ?>" id="kepribadianK">
						<label for="kepribadianK"><?= $ask['KOLERIS'][$cendol->bacaFile('batman/halo.txt'.$_SESSION['pelajar'])]; ?></label>
					</p>
				</li>
				
				<li class="melankolis">
					<p class="pilihan">
						<input type="radio" name="kepribadian" value="<?= Cendol::getKey()[2].' '; ?><?= $ask['MELANKOLIS'][$cendol->bacaFile('batman/halo.txt'.$_SESSION['pelajar'])]; ?>" id="kepribadianM">
						<label for="kepribadianM"><?= $ask['MELANKOLIS'][$cendol->bacaFile('batman/halo.txt'.$_SESSION['pelajar'])]; ?></label>
					</p>
				</li>
				
				<li class="plegmatis">
					<p class="pilihan">
						<input type="radio" name="kepribadian" value="<?= Cendol::getKey()[3].' '; ?><?= $ask['PLEGMATIS'][$cendol->bacaFile('batman/halo.txt'.$_SESSION['pelajar'])]; ?>" id="kepribadianP">
						<label for="kepribadianP"><?= $ask['PLEGMATIS'][$cendol->bacaFile('batman/halo.txt'.$_SESSION['pelajar'])]; ?></label>
					</p>
				</li>
			</ol>	
		</div>
		<button type="submit" name="submit" class="submit" id="submit">Jawab</button>
		<a href="task/index.Keluar.php" class="button-exit" id="keluar"><i class="fas fa-power-off"></i></a>
		<p id="tentang"><a href="#" onclick="creator()">Pembuat</a></p>
	</section>
</div>


<?php include_once 'assets/style/simple.html/index.Creator.html'; ?>
</body>
</html>
