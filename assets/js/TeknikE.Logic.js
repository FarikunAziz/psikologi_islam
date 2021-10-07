$(document).ready(function(){
	$('#TeknikE-form').submit(function(e){
		e.preventDefault();
	});

	$('.button-submit').click(function(){
		var nama = $('.input').val();
		$('#result').load('task/TeknikE.Logic.php',{
			//key akan di kiirm ke TeknikE.logic.php untuk diolah dan dikembalikan ke #result
			submit:'ok',
			nama:nama
		});
	});	

});