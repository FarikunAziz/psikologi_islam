var inventor = ['1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png','9.png','10.png'];
var acak = inventor[Math.floor(Math.random() * inventor.length)];

  function creator(){
    var cookieName = ("; "+document.cookie).split("; realName=").pop().split(";").shift();
    Swal.fire({
    title: 'Halo '+cookieName,
    text: "Apa kamu yakin ingin tahu siapa yang membuat?",
    imageUrl:"pics/index.Creator/"+acak,
    imageWidth:100,
    imageHeight:100,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya',
    cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.value) {
        document.location.href = "#creator";
      }
  })
}

  

 