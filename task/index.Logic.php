<?php 
session_start();
	//import pertanyaan
	include_once '../4212/4212.php';

	include_once 'Logic.php';	
	$cendol = new Cendol;

	if(isset($_POST['submit']) && isset($_POST['kepribadian']) && $cendol->bacaFile('../batman/halo.txt'.@$_SESSION['pelajar']) <41):
		Cendol::tulisFile('../batman/halo.txt'.@$_SESSION['pelajar']);
		$kepribadian = $_POST['kepribadian'];
		if(strstr($kepribadian, 'SANGUIN')):
			file_put_contents('../storage/sanguin.dat'.@$_SESSION['pelajar'],$kepribadian."\n\r",FILE_APPEND | LOCK_EX);
		elseif(strstr($kepribadian, 'KOLERIS')):
			file_put_contents('../storage/koleris.dat'.@$_SESSION['pelajar'],$kepribadian."\n\r",FILE_APPEND | LOCK_EX);
		elseif(strstr($kepribadian, 'MELANKOLIS')):
			file_put_contents('../storage/melankolis.dat'.@$_SESSION['pelajar'],$kepribadian."\n\r",FILE_APPEND | LOCK_EX);
		elseif(strstr($kepribadian, 'PLEGMATIS')):
			file_put_contents('../storage/plegmatis.dat'.@$_SESSION['pelajar'],$kepribadian."\n\r",FILE_APPEND | LOCK_EX);
		endif;
		if($cendol->bacaFile('../batman/halo.txt'.@$_SESSION['pelajar']) >= 41):
			echo '<script>window.location.replace("task/Result.php?user='.@$_SESSION['pelajar'].'");</script>';
			exit();
		endif;
	endif;


	//cek jika tidak menjawab
	if(isset($_POST['submit']) and !isset($_POST['kepribadian'])):
		echo '
		<script>
			var pesan = "'.Cendol::pesan().'";
			var gambar = "'.Cendol::gambar().'";
			Swal.fire({
				title: pesan,
		        text: "",
		        imageUrl:"pics/index.Error/"+gambar,
		        imageWidth:100,
		        imageHeight:100
			});
		</script>
		';
		echo '<script>
		window.navigator.vibrate([200,350,450]);
		</script>';
	endif;

	echo '<script src="assets/js/index.Keluar.js"></script>';
	echo '<script src="assets/js/index.Creator.js"></script>';
?>

<section class="opera" id="opera" style="background-color: <?= Cendol::changeColor(); ?>">
	<h1>Pertanyaan ke <?= $cendol->bacaFile('../batman/halo.txt'.@$_SESSION['pelajar']); ?></h1>
	<?php if($cendol->bacaFile('../batman/halo.txt'.@$_SESSION['pelajar']) > 20): ?>
		<h2>Kelebihan</h2>
		<?php include_once '../assets/style/simple.css/index.Smile.css'; ?>
	<?php else: ?>
		<h2>Kelemahan</h2>
		<?php include_once '../assets/style/simple.css/index.Sad.css'; ?>		
	<?php endif; ?>

	<div id="stinger">
		<ol>
			<li class="sanguin">
				<p class="pilihan">
					<input type="radio" name="kepribadian" value="<?= Cendol::getKey()[0].' '; ?><?= $ask['SANGUIN'][$cendol->bacaFile('../batman/halo.txt'.@$_SESSION['pelajar'])]; ?>" id="kepribadianS">
					<label for="kepribadianS"><?= $ask['SANGUIN'][$cendol->bacaFile('../batman/halo.txt'.@$_SESSION['pelajar'])]; ?></label>
				</p>
			</li>

			<li class="koleris">
				<p class="pilihan">
					<input type="radio" name="kepribadian" value="<?= Cendol::getKey()[1].' '; ?><?= $ask['KOLERIS'][$cendol->bacaFile('../batman/halo.txt'.@$_SESSION['pelajar'])]; ?>" id="kepribadianK">
					<label for="kepribadianK"><?= $ask['KOLERIS'][$cendol->bacaFile('../batman/halo.txt'.@$_SESSION['pelajar'])]; ?></label>
				</p>
			</li>
			
			<li class="melankolis">
				<p class="pilihan">
					<input type="radio" name="kepribadian" value="<?= Cendol::getKey()[2].' '; ?><?= $ask['MELANKOLIS'][$cendol->bacaFile('../batman/halo.txt'.@$_SESSION['pelajar'])]; ?>" id="kepribadianM">
					<label for="kepribadianM"><?= $ask['MELANKOLIS'][$cendol->bacaFile('../batman/halo.txt'.@$_SESSION['pelajar'])]; ?></label>
				</p>
			</li>
			
			<li class="plegmatis">
				<p class="pilihan">
					<input type="radio" name="kepribadian" value="<?= Cendol::getKey()[3].' '; ?><?= $ask['PLEGMATIS'][$cendol->bacaFile('../batman/halo.txt'.@$_SESSION['pelajar'])]; ?>" id="kepribadianP">
					<label for="kepribadianP"><?= $ask['PLEGMATIS'][$cendol->bacaFile('../batman/halo.txt'.@$_SESSION['pelajar'])]; ?></label>
				</p>
			</li>
		</ol>	
	</div>
	<button type="submit" name="submit" class="submit" id="submit">Jawab</button>
	<a href="task/index.Keluar.php" class="button-exit" id="keluar"><i class="fas fa-power-off"></i></a>
	<p id="tentang"><a href="#" onclick="creator()">Pembuat</a></p>
</section>