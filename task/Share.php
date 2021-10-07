<?php 
session_start();

//logic
include_once 'Logic.php';

$cendol = new Cendol;

if(isset($_POST['test'])):
	header("Location: ../TeknikE.php");
	exit();
endif;
 ?>
<!DOCTYPE html>
<html lang="id">
<head>
	<title> <?= @$_GET['judul']; ?>, Sanguin : <?= @$_GET['st'] / 40 * 100; ?>% | Koleris : <?= @$_GET['kt'] / 40 * 100; ?>% | Melankolis : <?= @$_GET['mt'] / 40 * 100; ?>% | Plegmatis : <?= @$_GET['pt'] / 40 * 100; ?>%</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="description" content="website untuk melakukan tes psikologi manusia yang ditinjau dari 4 sifat umum, diantaranya sanguin, koleris, melankolis dan plegmatis, karena tidak mungkin hanya ada 1 sifat saja, biasanya ada beberapa sifat yang saling melengkapi satu sama lain">
	<meta name="keywords" content="Tes Psikologi, Sanguin, Melankolis, Plegmatis, Koleris, Tes Kepribadian, Tes sifat manusia, tes melankolis, tes sanguin, tes koleris, tes plegmatis">
	<meta name="author" content="Farikun Aziz">
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="../pics/icon.png">
	<link rel="stylesheet" type="text/css" href="../assets/style/simple.css/Share.css">
	<!--chart graphics-->
	<script src="../assets/js/Chart.min.js"></script>
	<!--end of chart graphics-->
</head>
<body>

<div id="selimut">
	<?php 
	//ini adalah halman duplikasi dari halaman user yang sedang login, halman ini yang akan di share ke orang lain, sehingga halaman ini dan user yang sedang login saling terkoneksi satu sama lain, dengan kata lain, jika seseorang ingin melihat hasil test yang bersangkutan, maka user tidak boleh keluar dari aplikasi, begitu keluar semua data akan terhapus sehingga halaman ini tidak ada
		if(@file_exists("../slytherin/".$_GET['user'].".php")):?>
			<?php include_once 'Share.Test.php'; ?>
	<?php else: ?>
		<?php include_once 'Share.Error.php'; ?>
	<?php endif; ?>
</div>
<?php include_once 'Share.Graphics.php'; ?>

</body>
</html>

