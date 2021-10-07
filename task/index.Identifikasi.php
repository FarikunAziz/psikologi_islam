<?php 
if(!isset($_SESSION['pelajar'])):
	header("Location: TeknikE.php");
	exit();
endif;


//jika berada di Result.php dan ingin langsung ke halaman awal tanpa izin keluar
if($cendol->bacaFile('batman/halo.txt'.$_SESSION['pelajar']) > 40 or $cendol->bacaFile('batman/halo.txt'.$_SESSION['pelajar']) == 0):
	header("Location: task/Result.php?user=".$_SESSION['pelajar']);
	exit();
endif;
?>
