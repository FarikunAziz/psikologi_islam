$(function(){
	$('body').on('click','#submit',function(){
		var nama = $("input[name='kepribadian']:checked").val();
		$.post('task/index.Logic.php',{
			kepribadian:nama,
			submit:'ok'
		},function(data){
			$('#whoami').html(data);
		});
	});	
});