	<html>
<head>


<style type="text/css">
@media print {
input.noPrint { display: none;
 }
}
</style>
<link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/blog-post.css" rel="stylesheet">
	<link href="../css/docs.css" rel="stylesheet">

 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body onload="window.print()">

		
	 
<?php
	//include "../config/class_paging.php";
	include "../config/koneksi.php";
	include "../config/fungsi.php";
	include "../config/library.php";
	include "../config/fungsi_indotgl.php";

session_start();

	
//untuk menu cetak nilai
if($_GET['menu']=="cetak_nilai"){
	include "cetak/menu_cetak_nilai.php";
}

//untuk menu cetak catatan
elseif($_GET['menu']=="cetak_catatan"){
	include "cetak/menu_cetak_catatan.php";
}

//untuk menu cetak petunjuk
elseif($_GET['menu']=="cetak_petunjuk"){
	include "cetak/menu_cetak_petunjuk.php";
}			

//untuk menu cetak keterangan pindah
elseif($_GET['menu']=="cetak_keterangan_pindah"){
	include "cetak/menu_cetak_keterangan_pindah.php";
}			

//untuk menu cetak biodata siswa
elseif($_GET['menu']=="cetak_biodata_siswa"){
	include "cetak/menu_cetak_biodata_siswa.php";
}

//untuk menu cetak cover siswa
elseif($_GET['menu']=="cetak_cover_siswa"){
	include "cetak/menu_cetak_cover_siswa.php";
}			


else{
	echo "<script>alert('maaf anda mau kemana?')</script>";
	//echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=home'>";
  exit;
}
	 
?>
	
	 
</body>
</html>
