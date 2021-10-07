var myLove = ['1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png','9.png','10.png'];
var acak = myLove[Math.floor(Math.random() * myLove.length)];

function buruanTidur(){
    //confirm in action
    Swal.fire({
    title: '',
    text: "Buruan tidur ya sayang, jangan begadang kalau tidak penting, I LOVE YOU",
    imageUrl:"pics/TeknikE.Love/"+acak,
	imageWidth:100,
	imageHeight:100,
    showCancelButton: false,
    confirmButtonColor: '#ea19b8',
    confirmButtonText: 'Iya sayang',
    });
}