<?php
date_default_timezone_set('Asia/jakarta');

//pertanyaan
@include_once '../4212/4212.php';

//agar fungsi pesan dan gambar sama, sehingga menghasilkan pesan dan gambar yang sesuai
$libra = mt_rand(0,9);

final class Cendol{

	private static $_noEmpty,$_min,$_max,$_string,$_trim;

	/*BUATAN FARIKUN AZIZ
		mengubah string/data file menjadi array
		1.buka file sesuai nama session dengan mode r (read)
		2.buat array kosong sebagai penampung
		3.selama file ada
		4.tampung hasil dari file ke array kosong dan ubah ke array dengan delimiter .
			4.1.setiap pertanyaan selalu diakhiri dengan . dan ini saya gunakan sebagai delimiter :)
	*/
	private function sanguinString(){
		@$file = fopen('../storage/sanguin.dat'.$_SESSION['pelajar'], 'rb');
		$_CPP = [];
		while($baca = @fgets($file)){
			$_CPP[] = explode('.', $baca);
		}
		return $_CPP;
	}
	private function kolerisString(){
		@$file = fopen('../storage/koleris.dat'.$_SESSION['pelajar'], 'rb');
		$_CPP = [];
		while($baca = @fgets($file)){
			$_CPP[] = explode('.', $baca);
		}
		return $_CPP;
	}
	private function melankolisString(){
		@$file = fopen('../storage/melankolis.dat'.$_SESSION['pelajar'], 'rb');
		$_CPP = [];
		while($baca = @fgets($file)){
			$_CPP[] = explode('.', $baca);
		}
		return $_CPP;
	}
	private function plegmatisString(){
		@$file = fopen('../storage/plegmatis.dat'.$_SESSION['pelajar'], 'rb');
		$_CPP = [];
		while($baca = @fgets($file)){
			$_CPP[] = explode('.', $baca);
		}
		return $_CPP;
	}


	/*menghitung total array dari masing2 pertanyaan yang telah dipilih
		1.tampung hasil dari fungsi array
		2.set ke 0 (awal)
		3.saya menggunakan array 2D, selama ... ... ... -:)
		4.update $jumlah (0) selama kunci mencocoki
	*/
	public function sanguinTotal(){
		$sanguin = $this->sanguinString();
		$jumlahSanguin = 0;
		foreach($sanguin as $sanguinn=>$k){
			foreach($k as $v){
				$jumlahSanguin += substr_count($v, 'SANGUIN');
			}
		}
		return $jumlahSanguin;	
	}
	public function kolerisTotal(){
		$koleris = $this->kolerisString();
		$jumlahKoleris = 0;
		foreach($koleris as $koleriss=>$k){
			foreach($k as $v){
				$jumlahKoleris += substr_count($v, 'KOLERIS');
			}
		}
		return $jumlahKoleris;
	}
	public function melankolisTotal(){
		$melankolis = $this->melankolisString();
		$jumlahMelankolis = 0;
		foreach($melankolis as $melankoliss=>$k){
			foreach($k as $v){
				$jumlahMelankolis += substr_count($v, 'MELANKOLIS');
			}
		}
		return $jumlahMelankolis;
	}
	public function plegmatisTotal(){
		$plegmatis = $this->plegmatisString();
		$jumlahPlegmatis = 0;
		foreach($plegmatis as $plegmatiss=>$k){
			foreach($k as $v){
				$jumlahPlegmatis += substr_count($v, 'PLEGMATIS');
			}
		}
		return $jumlahPlegmatis;
	}

	//mengubah warna
	public static function changeColor(){
		$color = '#';
		$colors = [0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E'];
		for($k=0; $k<6; $k++){
			$color .= $colors[array_rand($colors)];
		}
		return $color;	
	}

	//validasi
	public static function validate($noEmpty,$min,$max,$string,$trim){
		self::$_noEmpty = $noEmpty;
		self::$_min = $min;
		self::$_max = $max;
		self::$_string = $string;
		self::$_trim = $trim;
		return (!empty(self::$_noEmpty) and strlen(self::$_min) > 2 and strlen(self::$_max) < 17  and ctype_alnum(self::$_string) and trim(self::$_trim));
	}

	//mencetak tanggal, bulan , tahun, hari
	public static function waktu(&$hari,&$tanggal,&$bulan,&$tahun){
		$hari = date('l');
		$tanggal = date('j');
		$bulan = date('F');
		$tahun = date('Y');

		$stokHari = ['Friday'=>'Jumat, ','Saturday'=>'Sabtu, ','Sunday'=>'Minggu, ',
					'Monday'=>'Senin, ','Tuesday'=>'Selasa, ','Wednesday'=>'Rabu, ',
					'Thursday'=>'Kamis, '];

		$stokBulan = ['February'=>'Februari ','March'=>'Maret ','April'=>'April ',
					'May'=>'Mei ','June'=>'Juni ','July'=>'Juli ','August'=>'Agustus ',
					'Sepetember'=>'Sepetember ','October'=>'Oktober ','November'=>'Nopember ','December'=>'Desember ','January'=>'Januari '];

		foreach($stokHari as $key=>$val){
				if($key === $hari):
					$hari = $val;
				endif;
		}
		
		foreach($stokBulan as $key=>$value){
			if($key === $bulan):
				$bulan = $value;
			endif;
		}
		echo $hari.' '.$tanggal.'  '.$bulan.'  '.$tahun;	
	}

	//untuk menentukan malam/siang/pagi
	public static function nox(&$waktu){
		//akan mengambil waktu sekarang
		$waktu = date('H:i:s');
		//jika waktu lebih dari 00(malam) dan kurang dari 10 pagi, waktu = PAGI dst..
		if($waktu > date('H:i:s',mktime(0,0,0,0,0,0)) and $waktu < date('H:i:s',mktime(10,0,0,0,0,0))):
			echo "Pagi";
		elseif($waktu > date('H:i:s',mktime(10,0,13,0,0,0)) and $waktu < date('H:i:s',mktime(14,25,0,0,0,0))):
			echo "Siang";
		elseif($waktu > date('H:i:s',mktime(14,25,3,0,0,0)) and $waktu < date('H:i:s',mktime(17,0,0,0,0,0))):
			echo "Sore";
		elseif($waktu > date('H:i:s',mktime(17,0,13,0,0,0)) and $waktu < date('H:i:s',mktime(17,40,3,0,0,0))):
			echo "Sore menjelang Malam";
		elseif($waktu > date('H:i:s',mktime(17,40,13,0,0,0)) and $waktu < date('H:i:s',mktime(23,30,13,0,0,0))):
			echo "Malam";
		elseif($waktu > date('H:i:s',mktime(23,30,17,0,0,0))):
			echo "Malam";
			echo "<script>buruanTidur()</script>";
		endif;
	}

	//mencetak sapaan silih berganti
	public static function sapa(){
		$sapa = ['Juara','Pejuang','Queen','King','Profesor','Pelajar','User','Akhi','Ukhti'];
		//array_rand akan meReturn nomor index
		$halo = $sapa[array_rand($sapa)];
		return $halo;
	}

	 //membaca file
   public function bacaFile($file) {
        if(file_exists($file)){
            $handle = fopen($file, 'r+');
            $countVote = fread($handle, 512);
            fclose($handle);
            return $countVote;
        }else{
            $handle = fopen($file, 'w');
            fwrite($handle, 0);
            fclose($handle);
            return $this->bacaFile($file);
        }
    }
  public static function tulisFile($file){
        if(file_exists($file)){
            $handle = fopen($file, 'r+');
        }
        $countVote = fread($handle, 512);
        fseek($handle, 0);
        fwrite($handle, $countVote+1);
        fclose($handle);
    }

	//peringatan yang beragam dalam index.php
   public static function pesan(){
		$pesan = [
		'Eaaa yang mencoba jahil',
		'Hm hm hmm',
		'Duel yuk?',
		'Hancurkan orang iseng ini!!!',
		'Panggil polisi',
		'PENYUSUP!!!!',
		'SAYANGKU ISI DULU YA MUAAACCH',
		'Udah makan blom yang?',
		'GAJADI!!!',
		'Kartu merah!'
		];
		global $libra;
		return $nih = $pesan[$libra];
	}
	public static function gambar(){
		$gambar = [
		'jahil.png',
		'hm_hm.png',
		'duel_yuk.png',
		'hancurkan_orang_asing_ini.png',
		'panggil_polisi.png',
		'penyusup.png',
		'sayangku_isi_dulu_ya.png',
		'udah_makan_belum_yang.png',
		'gajadi.png',
		'kartu_merah.png'
		];
		global $libra;
		return $nih = $gambar[$libra];
	}

	//mendapatkan total angka dari jumlah pertanyaan, digunakan di Teknik.Logic.php
	public static function getUser(){
		if(isset($_GET['user'])):	
			@$now = file_get_contents('batman/halo.txt'.$_GET['user']);
		endif;
		return $now;	
	}
	
	//untuk mendapatkan key pada array pertanyaan, digunakan dalam menentukan key mana yang diklik
	public static function getKey(){
		global $ask;
		$k = array_keys($ask);
		return $k;
	}

	//peringatan untuk TeknikE.php, kode ini tidak efektif
	public static function randImageTeknikEmpty(){
		$image = ['1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png','9.png','10.png'];
		$result = $image[array_rand($image)]; 
		return $result;
	}
	public static function randImageTeknikError(){
		$image = ['1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png','9.png','10.png'];
		$result = $image[array_rand($image)]; 
		return $result;
	}

	//gambar background untuk TEknikE.php
	public static function randImageTeknikEBackground(){
		$image = ['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg'];
		$result = $image[array_rand($image)]; 
		return $result;
	}

	//background Result.php
	public static function randImageResultBackground(){
		$image = ['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg'];
		$result = '../pics/Result.Background/'.$image[array_rand($image)]; 
		return $result;
	}	
}