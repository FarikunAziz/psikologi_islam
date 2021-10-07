<?php 
session_start();
	
	//logic
	include_once 'Logic.php';
	$cendol = new Cendol;

	if(!isset($_SESSION['pelajar'])):
		header("Location: ../TeknikE.php");
		exit();
	endif;

	//jika user memaksa masuk halaman ini tanpa menjawab semua pertanyaan
	if($cendol->bacaFile('../batman/halo.txt'.$_SESSION['pelajar']) < 40):
		header("Location:../index.php?user=".$_SESSION['pelajar']);
		exit();
	endif;

	//sebagai duplikasi dari nilai masing2 pilihan, digunakan untuk penstabil dalam Share.php
	$sanguinName = $_SESSION['pelajar'].'sanguin';
	$kolerisName = $_SESSION['pelajar'].'koleris';
	$melankolisName = $_SESSION['pelajar'].'melankolis';
	$plegmatisName = $_SESSION['pelajar'].'plegmatis';
	file_put_contents("../slytherin/$sanguinName".".txt",$cendol->sanguinTotal());
	file_put_contents("../slytherin/$kolerisName".".txt",$cendol->kolerisTotal());
	file_put_contents("../slytherin/$melankolisName".".txt",$cendol->melankolisTotal());
	file_put_contents("../slytherin/$plegmatisName".".txt",$cendol->plegmatisTotal());

	//digunakan sebagai halaman duplikasi yang akan di share jika user berkeinginan 
	file_put_contents("../slytherin/".$_SESSION['pelajar'].".php",'');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		<?php 
		Cendol::waktu($hari, $tanggal, $bulan, $tahun);
		 ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="website untuk melakukan tes psikologi manusia yang ditinjau dari 4 sifat umum, diantaranya sanguin, koleris, melankolis dan plegmatis, karena tidak mungkin hanya ada 1 sifat saja, biasanya ada beberapa sifat yang saling melengkapi satu sama lain">
	<meta name="keywords" content="Tes Psikologi, Sanguin, Melankolis, Plegmatis, Koleris, Tes Kepribadian, Tes sifat manusia, tes melankolis, tes sanguin, tes koleris, tes plegmatis">
	<meta name="author" content="Farikun Aziz">
	<link rel="icon" type="image/png" href="../pics/icon.png">
	<link rel="stylesheet" type="text/css" href='../assets/style/simple.css/Result.css'>
	<link rel="stylesheet" type="text/css" href="../assets/style/simple.css/Result.Fantastic.css">
	<!--chart graphics & icon & sweetalert & javascript-->
	<script src="../assets/js/Chart.min.js"></script>	
	<link rel="stylesheet" type="text/css" href="../assets/fontawasome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/sweetalert/sweetalert2.css">
	<script src="../assets/js/jquery-3.2.1.js"></script>
	<script src="../assets/js/sweetalert/sweetalert2.js"></script>
	<script src="../assets/js/Result.Retest.js"></script>
	<script src="../assets/js/Result.Keluar.js"></script>
<script src="../assets/js/index.Identifikasi.js"></script>
	<!--end of chart graphics-->
</head>
<body>

<div id="bagi">

	<a href="https://api.whatsapp.com/send?text=https://www.odowozko.com/task/Share.php?user=<?= urlencode($_SESSION['pelajar'].'&judul='.$_SESSION['judul'].'&st='.$cendol->sanguinTotal().'&kt='.$cendol->kolerisTotal().'&mt='.$cendol->melankolisTotal().'&pt='.$cendol->plegmatisTotal());?>" target="_blank"><div class="whatsApp"><i class="fab fa-whatsapp"></i></div></a>

	<a href="https://www.facebook.com/sharer/sharer.php?u=https://www.odowozko.com/task/Share.php?user=<?= urlencode($_SESSION['pelajar'].'&judul='.$_SESSION['judul'].'&st='.$cendol->sanguinTotal().'&kt='.$cendol->kolerisTotal().'&mt='.$cendol->melankolisTotal().'&pt='.$cendol->plegmatisTotal());?>" target="_blank"><div class="facebook"><i class="fab fa-facebook-f"></i></div></a>

	<a href="https://wa.me/6285804729111?text=Halo " target="_blank"><div class="chatMe"><i class="fa fa-comments"></i></div></a>
</div>

<div id="grid" style="background-image:url(<?= Cendol::randImageResultBackground(); ?>);">
	<h1 class="hasil"><?= substr($_SESSION['judul'], 0,13); ?></h1>
	<div class="info" style="background-color: <?= $cendol->changeColor(); ?>">
		<?php 
		/*menampilkan hasil*/
			$s = $cendol->sanguinTotal();
			$k = $cendol->kolerisTotal();
			$m = $cendol->melankolisTotal();
			$p = $cendol->plegmatisTotal();

			$b = [
				'sanguin'=>$s,
				'koleris'=>$k,
				'melankolis'=>$m,
				'plegmatis'=>$p
			];
			//sort dari yang terbesar
			arsort($b);
			echo "<ol>";
			foreach($b as $k=>$v):
				echo "<li>";
				echo "<p><a href=\"#$k\">$k</a> ".($v/40*100)."%</p>";//faster than printf
				echo "</li>";
			endforeach;
			echo "</ol>";
		 ?>
	</div>
	
	<div class="box">
		<canvas id="myChart"></canvas>
	</div>

	<form action="" method="POST" class="form">
		<a href="Result.Keluar.php" class="keluar">
			<i class="fas fa-power-off fa-2x"></i>
		</a>
		<a href="Result.Retest.php" class="retest" >
			<i class="fas fa-home fa-2x"></i>
		</a>
	</form> 
</div>

<?php require_once 'Result.Eval.php'; ?>
<?php require_once '../assets/style/simple.html/Result.Fantastic.html'; ?>
</body>
</html>
