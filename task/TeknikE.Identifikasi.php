<?php 
//prinsipnya sama, jika user mengClose browser tanpa menutup aplikasi, maka cookie masih ada
if(isset($_COOKIE['login']) && isset($_COOKIE['realName'])){
	if($_COOKIE['login'] === $_COOKIE['login'] && $_COOKIE['realName'] === $_COOKIE['realName']):
		$_SESSION['pelajar'] = $_COOKIE['login'];
		$_SESSION['judul'] = $_COOKIE['realName'];
	endif;
}

/*jika user telah absen dan setelah itu mau bolos*/
if(isset($_SESSION['pelajar'])):
	header("Location: index.php?user=".$_SESSION['pelajar']);
	exit();
endif;

//jika cookie utama telah habis dan user tidak menekan tombol exit, lakukan pengahapusan total terhadap semua dokumen agar tidak menjadi sampah
if(isset($_COOKIE['relashio'])):
	@$sanguinName = $_COOKIE['relashio'].'sanguin';
	@$kolerisName = $_COOKIE['relashio'].'koleris';
	@$melankolisName = $_COOKIE['relashio'].'melankolis';
	@$plegmatisName = $_COOKIE['relashio'].'plegmatis';
	@unlink('batman/halo.txt'.$_COOKIE['relashio']);
	@unlink('storage/sanguin.dat'.$_COOKIE['relashio']);
	@unlink('storage/koleris.dat'.$_COOKIE['relashio']);
	@unlink('storage/melankolis.dat'.$_COOKIE['relashio']);
	@unlink('storage/plegmatis.dat'.$_COOKIE['relashio']);
	@unlink('slytherin/'.$_COOKIE['relashio'].'.php');
	@unlink('slytherin/'.$sanguinName.'.txt');
	@unlink('slytherin/'.$kolerisName.'.txt');
	@unlink('slytherin/'.$melankolisName.'.txt');
	@unlink('slytherin/'.$plegmatisName.'.txt');
	setcookie('relashio','',time()-3600,'/');
endif;

/*jika user mencoba masuk halaman ini padahal dia masih harus melihat hasil testnya*/
if($tuas > 40):
	header("Location: task/Result.php?user".$_SESSION['pelajar']);
	exit();
endif;