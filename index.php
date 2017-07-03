<?php
					include "/config/koneksi.php";
					include "/config/library.php";
?>
<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie7" lang="en-US"><![endif]-->
<!--[if IE 8 ]><html class="ie8" lang="en-US"><![endif]-->
<!--[if IE 9 ]><html class="ie9" lang="en-US"><![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html lang="en-US"><!--<![endif]-->
<head>
	
    <!-- Basic Page Needs -->
	<meta charset="UTF-8">
	
	<title>SD N 3 Krakitan</title>
	
	<meta name="description" content="HTML5 Theme" /> 

    <meta name="robots" content="index, follow" />

	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=EmulateIE8; IE=EDGE" />
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script>
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

<body class="home page tt_responsive">
	
	<div id="home" >
		
		<div id="layout" class="full">    
			
			<header id="header" class="header_v2 header_v9">
				
				
				<div class="headdown">
					
					<div class="row clearfix">
						
						<div class="info">
							<i class="icon-envelope-alt"></i><a href="mailto:<?php echo "$email"; ?>"><?php echo "$email"; ?></a>
							<i class="icon-phone"></i> <?php echo "$no_telepon"; ?>                       
						</div><!-- end info -->
						
					</div><!-- row -->
				
				</div><!-- headdown -->

				<div class="head my_sticky">
					
					<div class="row clearfix">
						
						<div class="logo">
							<a href="index.html"><img src="images/logo_car2.png" alt="Official" /></a>
						</div><!-- end logo -->	
						
						<!-- Menu -->
						<nav class="main">
							<ul id="menu-main" class="sf-menu">
								<li class="menu-item"><a href="?menu=home">Home</a></li>
								<li class="menu-item"><a href="?menu=profil">Profil</a></li>
								<li class="menu-item"><a href="?menu=tata_cara">Tata Cara</a></li>
								<li class="menu-item"><a href="?menu=login">Lihat Rapot Siswa</a></li>
								<li class="menu-item"><a href="?menu=guru">Guru</a></li>
							</ul>
						</nav><!-- /Menu -->
					
					</div><!-- row -->
				
				</div><!-- headdown -->
			
			</header><!-- end header -->
			<br />
	
<?php
	if($_GET['menu']=="home" OR empty($_GET['menu'])){
?>

			<!-- SLIDER -->   
           <div class="row clearfix fullBG"> 
				
                <div class="sliderr">
					
                    <div class="myslicebox clearfix">
						
                        <ul id="sb-slider" class="sb-slider sbrad ">
                            
                            <li>
                            	<a href="#"><img src="images/images home/banner 1.png" alt="Image Alt" /></a>                                	
                                <div class="sb-description">
                                    <h3>Rapot Online<span>SD N 3 Krakitan</span></h3>
                                </div>
             				</li>
                           
                            <li>
                            	<a href="#"><img src="images/images home/banner 2.png" alt="Image Alt" /></a>                                	
                                <div class="sb-description">
                                        <h3>Sekarang Bisa Lihat Rapot Siswa secara Online</span></h3>
                                </div>
             				</li>
                            
                            <li>
                            	<a href="#"><img src="images/images home/banner 3.png" alt="Image Alt" /></a>                                	
                                <div class="sb-description">
                                <h3>SD N 3 Krakitan<span>SUPPORT ON Line</span></h3>
                                </div>
             				</li>
                        
                        </ul>
                        
                        <div id="shadow" class="shadow"></div>
                        
                        <div id="nav-arrows" class="nav-arrows sbrad">
                            <a href="#"><i class="icon-angle-right"></i></a>
                            <a href="#"><i class="icon-angle-left"></i></a>
                        </div>                       
                    
                    </div>
               
                </div>
           
            </div>
            
            <!-- End SLIDER --> 

<?php		
	}
	else{
?>
   

<?php		
	}
?>

			<div class="page-content">
				
				<!--untuk include content.php -->
				<?php
					include "content.php";
				?>
				<!--end untuk include content.php -->

			
			</div><!-- end page-content -->
        		
				<div class="footer-last row mtf clearfix">
					
					<div class="menu-footer-menu-container">
						<span class="copyright">Copyright © 2015 Official Theme. Designed by <a href="http://themeforest.net/user/tohidgolkar?ref=tohidgolkar" target="_blank">Themetor</a>. Edited by SD N 3 Krakitan</span>
						
						<ul id="menu-footer-menu" class="foot-menu custom-text-color3">
							<li class="menu-item"><a href="?menu=home">Home</a></li>
							<li class="menu-item"><a href="?menu=profil">Profil</a></li>
							<li class="menu-item"><a href="?menu=tata_cara">Tata Cara</a></li>
							<li class="menu-item"><a href="?menu=login">Lihat Rapot Siswa</a></li>
						</ul>
					
					</div> 
				
				</div><!-- end last footer -->
		
		
		</div><!-- end layout -->
	
	</div><!-- end frame -->

	<div id="toTop"><i class="icon-angle-up"></i></div><!-- Back to top -->

<!-- Javascripts -->
	<script type='text/javascript' src='js/jquery/jquery.js?ver=1.11.0'></script>
	<script type='text/javascript' src='js/themetor.js?ver=1.0'></script>
	<script type='text/javascript' src='js/jquery.nicescroll.min.js?ver=3.5.1'></script>
	<script type='text/javascript' src='js/jquery.prettyPhoto.js?ver=3.1.6'></script>
	<script type='text/javascript' src='js/modernizr.custom.46884.js?ver=1'></script>
	<script type='text/javascript' src='js/jquery.slicebox.js?ver=1'></script>
	<script type='text/javascript' src='js/owl.carousel.min.js?ver=2.0.0'></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
	<script type='text/javascript' src='js/custom.js?ver=1.0'></script>
	

		<script>
			jQuery(function($) {
			var Page = (function() {

				var $navArrows = $( '#nav-arrows' ),
					$shadow = $( '#shadow' ).hide(),
					slicebox = $( '#sb-slider' ).slicebox( {
						onReady : function() {

							$shadow.show();

						},
						// (v)ertical, (h)orizontal or (r)andom
						orientation : 'r',
						// number of slices / cuboids
						// needs to be an odd number 15 => number > 0 (if you want the limit higher, change the _validate function).
						cuboidsCount : 5,
						// if true then the number of slices / cuboids is going to be random (cuboidsCount is overwitten)
						cuboidsRandom : true,
						// animation speed
						// this is the speed that takes "1" cuboid to rotate
						speed : 1700,
						// transition easing
						easing : 'ease',
						// if true the slicebox will start the animation automatically
						autoplay : true,
						// time (ms) between each rotation, if autoplay is true
						interval: 4000,
					} ),
					
					init = function() {

						initEvents();
						
					},
					initEvents = function() {

						// add navigation events
						$navArrows.children( ':first' ).on( 'click', function() {
							
							slicebox.next();
							return false;

						} );

						$navArrows.children( ':last' ).on( 'click', function() {
							
							slicebox.previous();
							return false;

						} );

					};

					return { init : init };

			})();

			Page.init();
		});
        </script>
		<script>
	
		jQuery(document).ready(function($) {
			
			// posts Carousel /////////////////////////////
			try {
					
					$("#poc_tt1").owlCarousel({
						items:4,
						loop: true,
						margin:12,
						nav:true,
						navSpeed:1000,
						navText:['<i class="icon-angle-right"></i>','<i class="icon-angle-left"></i>'],
						dots:false,
						autoplay:false,
						autoplayTimeout:4000,
						autoplaySpeed:2000,
						fallbackEasing:'easeInOutExpo',
						autoplayHoverPause:true,
						responsive : {0 : {items : 1,nav : false}, 480 : {items : 2}, 768 : {items : 4}}
						
					});

				
			} catch(e){}
				
		//End Document.ready//
		});	
	</script>


	

</body>
</html>
