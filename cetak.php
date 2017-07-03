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
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
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
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">  
    
	<!-- Favicons -->
	
    <link href="images/favicon.ico" rel="shortcut icon" /> 
	
	<!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Marcellus:400,400italic,700,700italic|Marcellus:400,400italic,700,700italic|Marcellus:400,400italic,700,700italic|Marcellus:400,400italic,700,700italic|Marcellus:400,400italic,700,700italic|Marcellus:400,400italic,700,700italic&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek,vietnamese' rel='stylesheet' type='text/css'>  
    <link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>

	<!-- Stylesheets -->
    <link rel='stylesheet' id='stylesheet-css'  href='css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' id='icons-css'  href='css/icons.css' type='text/css' media='all' />
	<link rel='stylesheet' id='responsive-css'  href='css/vc.css' type='text/css' media='all' />
    <link rel='stylesheet' id='animate-css'  href='css/animate.css' type='text/css' media='all' />
	<link rel='stylesheet' id='shortcodes-css'  href='css/shortcodes.css?ver=1.0' type='text/css' media='all' />
    <link rel='stylesheet' id='revslider-css'  href='css/settings.css' type='text/css' media='all' />
	<link rel='stylesheet' id='ms-main-css'  href='css/masterslider.main.css?ver=2.3.0' type='text/css' media='all' />
	
    <!-- Responsive CSS -->
    <link rel='stylesheet' id='responsive-css'  href='css/responsive.css' type='text/css' media='all' />
    
	<!-- Custom CSS -->
    <link rel='stylesheet' id='custom-css'  href='css/custom-styles.css' type='text/css' media='all' />


</head>
<body onload="window.print()">

		
	 
<?php
	//include "../config/class_paging.php";
	include "/config/koneksi.php";
	include "/config/fungsi.php";
	include "/config/library.php";
	include "/config/fungsi_indotgl.php";

session_start();

	
//untuk menu cetak nilai
if($_GET['menu']=="cetak_nilai"){
	include "/menu/menu_cetak_nilai.php";
}



else{
	echo "<script>alert('maaf anda mau kemana?')</script>";
	//echo "<meta http-equiv='refresh'content='0;url=tampil.php?menu=home'>";
  exit;
}
	 
?>
	
	 
</body>
</html>
