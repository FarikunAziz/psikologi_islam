<div id="grid" style="background-image: url(../pics/bgMbah.png)">
	<h1 class="hasil">Hasil dari <? echo substr(@$_GET['judul'], 0,13); ?></h1>
	<div class="info" style="background-color: <?= @$cendol->changeColor(); ?>">
		<?php 
			//hasil duplikasi nilai di DE4F.php dipakai di sini
			$sanguinName = @$_GET['user'].'sanguin'.'.txt';
			$kolerisName = @$_GET['user'].'koleris'.'.txt';
			$melankolisName = @$_GET['user'].'melankolis'.'.txt';
			$plegmatisName = @$_GET['user'].'plegmatis'.'.txt';
			//jika user mengubah nilai (dari URL) sehingga nilainya tidak lagi sama
			$s = @($_GET['st'] == file_get_contents("../slytherin/$sanguinName") ? file_get_contents("../slytherin/$sanguinName") : 0);
			$k = @($_GET['kt'] == file_get_contents("../slytherin/$kolerisName") ? file_get_contents("../slytherin/$kolerisName") : 0);
			$m = @($_GET['mt'] == file_get_contents("../slytherin/$melankolisName") ? file_get_contents("../slytherin/$melankolisName") : 0);
			$p = @($_GET['pt'] == file_get_contents("../slytherin/$plegmatisName") ? file_get_contents("../slytherin/$plegmatisName") : 0);

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
				echo "<p><a href=\"#\">$k</a> ".($v/40*100)."%</p>";
				echo "</li>";
			endforeach;
			echo "</ol>";
		 ?>
	</div>
	
	<div class="box">
		<!--gambar di sini-->
		<canvas id="myChart"></canvas>
	</div>

	<div class="exit">
			<form action="" method="POST">
				<button class="exit" name="test">Ikut Test</button>
			</form> 
	</div>
</div>