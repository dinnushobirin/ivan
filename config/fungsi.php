<?php
//KODE AUTO INCREMENT
function kode_otomatis($tabel, $id)
{
  	//untuk membuat id_admin
	$id_pilih		= mysql_query("SELECT ".$id." FROM `".$tabel."` ORDER BY ".$id." DESC LIMIT 1");
	$id_tampil		= mysql_fetch_array($id_pilih);
		
	$text1 	= substr($id_tampil[$id],0,4)+1;
		//bila angka kurang dari = 10
		if($text1<10){
			$text1a = "000".$text1;
		}
		//bila angka 10-99
		elseif($text1>=10 AND $text1<100){
			$text1a = "00".$text1;
		}
		//bila angka 100-999
		elseif($text1>=100 AND $text1<1000){
			$text1a = "0".$text1;
		}
		//bila angka 1000-9999
		elseif($text1>=1000 AND $text1<9999){
			$text1a = $text1;
		}
	$id_fix		= "$text1a";	
	return $id_fix;
		
}

function id_int($tabel,$id)
{
	//untuk membuat id_int
	$id_pilih		= mysql_query("SELECT ".$id." FROM `".$tabel."` ORDER BY ".$id." DESC LIMIT 1");
	$id_tampil		= mysql_fetch_array($id_pilih);
		
	$text1 	= $id_tampil[$id]+1;
		
	$id_fix		= "$text1";	
	return $id_fix;
}

function validasi_ada($tabel,$validasi,$isi)
{
	//untuk membuat id_int
	$pilih		= mysql_query("SELECT $validasi FROM $tabel WHERE  $validasi='$isi' ");
	while($tampil= mysql_num_rows($pilih)){
		if(!empty($tampil)){
			echo "<script>alert('Tolong Di Perhatikan data sudah ada')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
			exit;		
		}
	}
}

function angka($angka)
{
	$hasil = number_format($angka, 0, ',', '.');
	return $hasil;
}

// Upload gambar
function gambar_upload($lokasi, $id, $nama){
  //upload file
		if (!empty($_FILES['myFile']['name'])  ) {
     		// verifikasi file gambar (GIF, JPEG, atau PNG)
  			$fileType = exif_imagetype($_FILES['myFile']['tmp_name']);
  			$allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
  			if (!in_array($fileType, $allowed)) {
  				echo "<script>alert('hanya diijinkan untuk meng-upload file gambar (gif, jpg, atau png)')</script>";
				echo "<script language=javascript>window.history.go(-1);</script>";
				exit;
  			}
			else{
    			
    			$myFile = $_FILES['myFile'];
    			// ubah paksa nama file yg mengandung selain huruf, angka, ".", "_", dan "-" dengan regex
    			$name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile['name']);
 
    			// periksa ekstensi file
    			$parts = pathinfo($name);      
    				if (isset($parts['extension'])) {
      					$ext = $parts['extension'];
             
      					$name = $nama."_".$id.".jpg";
      				}	
 		      // simpan file
     		 move_uploaded_file($myFile['tmp_name'], $lokasi . $name);
  			}
		}
	
		else{
			echo "<script>alert('Tolong Di Perhatikan Form Gambar')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
			exit;
		}
}
?>