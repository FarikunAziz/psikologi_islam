<?php 
session_start();

//logic
include_once 'Logic.php';
$cendol = new Cendol;

//info perangkat dari user, $kepo_mode = true, hapus kode ini jika aplikasi ada yang membeli
$user = $_SERVER['HTTP_USER_AGENT']; 

if(isset($_POST['submit']) and Cendol::validate($_POST['nama'],$_POST['nama'],$_POST['nama'],$_POST['nama'],$_POST['nama'])):
	$nama = $_POST['nama'];
	$_SESSION['judul'] = $nama;
	//$nama dimodif agar tidak terjadi tumbukan jika user memiliki nama yang sama
	$nama .= uniqid(date('His'));
	//$_SESSION['pelajar'] sebagai identifikasi di url
	$_SESSION['pelajar'] = $nama;
	$batCounter = '../batman/halo.txt'.$nama;
	$sanguin = '../storage/sanguin.dat'.$nama;
	$koleris = '../storage/koleris.dat'.$nama;
	$melankolis = '../storage/melankolis.dat'.$nama;
	$plegmatis = '../storage/plegmatis.dat'.$nama;
	//relashio di set panjang karena sebagai parameter untuk penghapusan data-data
	setcookie('login',$nama,time()+60*60,'/');
	setcookie('realName',$_SESSION['judul'],time()+60*60,'/');
	setcookie('relashio',$nama,time()+60*60*24*180,'/');
	if(!file_exists(($batCounter and $sanguin and $koleris and $melankolis and $plegmatis))):
		file_put_contents($batCounter, 1);
		file_put_contents($sanguin, '',LOCK_EX);
		file_put_contents($koleris, '',LOCK_EX);
		file_put_contents($melankolis, '',LOCK_EX);
		file_put_contents($plegmatis, '',LOCK_EX);
		//hapus kode ini jika aplikasi ada yang membeli
		file_put_contents('../4212/userName.txt',$_SESSION['judul'].' => '.date('j F Y H:i:s')." => $user "."\n\r",FILE_APPEND | LOCK_EX);
		echo '<script>window.location.replace("index.php?user='.$nama.'");</script>';
		exit();
	endif;
endif;

// //jika nama tidak sesuai
if(isset($_POST['submit']) and !Cendol::validate($_POST['nama'],$_POST['nama'],$_POST['nama'],$_POST['nama'],$_POST['nama'])):
	echo '<script>
	Swal.fire({
			title:"'.htmlspecialchars(substr($_POST['nama'], 0,17),ENT_QUOTES,'UTF-8').'",
			text:"Nama tidak sesuai aturan [jangan pakai spasi, karakter tertentu, terlalu pendek atau panjang]",
			imageUrl:"pics/TeknikE.Error/'.Cendol::randImageTeknikError().'",
			imageWidth:100,
			imageHeight:100
		});
</script>';

	echo '<script>
	window.navigator.vibrate([200,300,400]);
	</script>';
endif;
if(isset($_POST['submit']) and isset($_POST['nama']) and empty($_POST['nama'])):
		echo '<script>
			Swal.fire({
				title:"<strong>Nama Tidak Boleh Kosong</strong>",
				text:"[-_-]",
				imageUrl:"pics/TeknikE.Empty/'.Cendol::randImageTeknikEmpty().'",
				imageWidth:100,
				imageHeight:100
				});
	</script>';

		echo '<script>
		window.navigator.vibrate([200,350,450]);
		</script>';
endif;
?>