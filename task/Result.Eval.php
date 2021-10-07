<?php 

	$sang = $cendol->sanguinTotal();
	$koler = $cendol->kolerisTotal();
	$melan = $cendol->melankolisTotal();
	$pleg = $cendol->plegmatisTotal();
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
					label: "<?= substr($_SESSION['judul'], 0,13); ?>",
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
<?php 
	/*sebenarnya tidak perlu, karena secara otomatis php akan menDelete objek yang sudah di pakai, buat jaga2 saja*/
	$sang = null;
	$koler = null;
	$melan = null;
	$pleg = null;
 ?>

