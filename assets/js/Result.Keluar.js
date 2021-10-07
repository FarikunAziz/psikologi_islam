$(document).ready(function(){
	$('.keluar').on('click',function(e){
    var cookieName = ("; "+document.cookie).split("; realName=").pop().split(";").shift();
    var _exit = ['1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png','9.png','10.png'];
    var acak = _exit[Math.floor(Math.random() * _exit.length)];
		e.preventDefault();
		Swal.fire({
        title: 'Keluar '+cookieName+'?',
        text: "Semua Datamu Akan Hilang",
        imageUrl:"../pics/Exit/"+acak,
        imageWidth:100,
        imageHeight:100,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
        }).then((result) => {
          if (result.value) {
           document.location.href = "Result.Keluar.php";
          }
      })
	});
});