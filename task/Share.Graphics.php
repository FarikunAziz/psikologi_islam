<?php 
	// prinsipnya sama seperti ShareTest.php
	//halaman ini bertanggung jawab terhadap penampilan grapik Share.php
	$sanguinName = @$_GET['user'].'sanguin'.'.txt';
	$kolerisName = @$_GET['user'].'koleris'.'.txt';
	$melankolisName = @$_GET['user'].'melankolis'.'.txt';
	$plegmatisName = @$_GET['user'].'plegmatis'.'.txt';
	
	$sang = @($_GET['st'] == file_get_contents("../slytherin/$sanguinName") ? file_get_contents("../slytherin/$sanguinName") : 0);
	$koler = @($_GET['kt'] == file_get_contents("../slytherin/$kolerisName") ? file_get_contents("../slytherin/$kolerisName") : 0);
	$melan = @($_GET['mt'] == file_get_contents("../slytherin/$melankolisName") ? file_get_contents("../slytherin/$melankolisName") : 0);
	$pleg = @($_GET['pt'] == file_get_contents("../slytherin/$plegmatisName") ? file_get_contents("../slytherin/$plegmatisName") : 0);
 ?>

	<script>
		var chart = document.getElementById('myChart').getContext('2d');
		
		Chart.defaults.global.defaultFontFamily = 'Ubuntu,serif';
		Chart.defaults.global.defaultFontColor = '#fff';
		Chart.defaults.global.defaultFontSize = 18;

		var typeChart = ['bar','horizontalBar','pie','line','doughnut','radar'];
		var acak = typeChart[Math.floor(Math.random() * typeChart.length)];


		function randColor(){
			return "#" + (Math.round(Math.random() * 0XFFFFFF)).toString(16);
		}

		var showChart = new Chart(chart,{
			type:acak,
			data:{
				labels: [
				'SANGUIN','KOLERIS','MELANKOLIS','PLEGMATIS'
				],
				datasets: [{
					label: "<?= substr(@$_GET['judul'], 0,13); ?>",
					data: [
					<?= $sang ?>,<?= $koler; ?>,<?= $melan; ?>,<?= $pleg; ?>
					],
					backgroundColor:[
						randColor(),
						randColor(),
						randColor(),
						randColor()
					],
					hoverBorderColor:'#fff'
				}]
			},
			options:{
					legend:{
					display:true,
					position:'left',
				},
				tooltips:{
					enabled:true,
				}
			}
		})	;
	</script>
