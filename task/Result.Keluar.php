<?php 
session_start();
@$sanguinName = $_SESSION['pelajar'].'sanguin';
@$kolerisName = $_SESSION['pelajar'].'koleris';
@$melankolisName = $_SESSION['pelajar'].'melankolis';
@$plegmatisName = $_SESSION['pelajar'].'plegmatis';
@unlink('../batman/halo.txt'.$_SESSION['pelajar']);
@unlink('../storage/sanguin.dat'.$_SESSION['pelajar']);
@unlink('../storage/koleris.dat'.$_SESSION['pelajar']);
@unlink('../storage/melankolis.dat'.$_SESSION['pelajar']);
@unlink('../storage/plegmatis.dat'.$_SESSION['pelajar']);
@unlink('../slytherin/'.$_SESSION['pelajar'].'.php');
@unlink('../slytherin/'.$sanguinName.'.txt');
@unlink('../slytherin/'.$kolerisName.'.txt');
@unlink('../slytherin/'.$melankolisName.'.txt');
@unlink('../slytherin/'.$plegmatisName.'.txt');
session_destroy();
session_unset();
$_SESSION = [];
setcookie('login','',time()-3600,'/');
setcookie('realName','',time()-3600,'/');
setcookie('relashio','',time()-3600,'/');
header("Location: ../TeknikE.php");
 ?>