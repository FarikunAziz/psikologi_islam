$(document).ready(function(){
	$('.retest').on('click',function(e){
    var cookieName = ("; "+document.cookie).split("; realName=").pop().split(";").shift();
    var retest = ['1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png','9.png','10.png'];
    var acak = retest[Math.floor(Math.random() * retest.length)];
		e.preventDefault();
		Swal.fire({
        title: 'Tes Ulang '+cookieName+'?',
        text: '[---><---]',
        imageUrl:"../pics/Result.Retest/"+acak,
        imageWidth:100,
        imageHeight:100,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
        }).then((result) => {
          if (result.value) {
           document.location.href = "Result.Retest.php";
          }
      })
	});
});