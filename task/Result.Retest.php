<?php 
session_start();
$sanguinName = $_SESSION['pelajar'].'sanguin';
$kolerisName = $_SESSION['pelajar'].'koleris';
$melankolisName = $_SESSION['pelajar'].'melankolis';
$plegmatisName = $_SESSION['pelajar'].'plegmatis';
file_put_contents('../storage/sanguin.dat'.$_SESSION['pelajar'], '',LOCK_EX);
file_put_contents('../storage/koleris.dat'.$_SESSION['pelajar'], '',LOCK_EX);
file_put_contents('../storage/melankolis.dat'.$_SESSION['pelajar'], '',LOCK_EX);
file_put_contents('../storage/plegmatis.dat'.$_SESSION['pelajar'], '',LOCK_EX);
file_put_contents('../batman/halo.txt'.$_SESSION['pelajar'], 1);
file_put_contents('../slytherin/'.$sanguinName.'.txt','',LOCK_EX);
file_put_contents('../slytherin/'.$kolerisName.'.txt','',LOCK_EX);
file_put_contents('../slytherin/'.$melankolisName.'.txt','',LOCK_EX);
file_put_contents('../slytherin/'.$plegmatisName.'.txt','',LOCK_EX);
header("Location:../index.php?user=".$_SESSION['pelajar']);
exit();
 ?>