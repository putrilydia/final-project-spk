<!DOCTYPE html>
<html>
<head>
	<title>Decision Support System for Choosing Hotel</title>
	<meta property="og:image" content="assets/image/laptop.jpg" />
	<meta name="description" content="Leppi adalah aplikasi Sistem Pendukung Keputusan Laptop berbasis Metode Weight Product">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
	<link rel="stylesheet" href="assets/css/table.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<link rel="apple-touch-icon" sizes="76x76" href="assets/image/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/image/favicon.png">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--Import jQuery before materialize.js-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/materialize.js"></script>
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<script>
	$(document).ready(function(){
	  $(".button-collapse").sideNav();
	  $(".dropdown-button").dropdown();
	});
	</script>
</head>
<body>
	<div class="navbar-fixed">
	<nav>
    	<div class="container">
						<div class="nav-wrapper">
								<ul class="left" style="margin-left: -52px;">
									<li><a class="active" href="index.php">HOME</a></li>
									<li><a href="rekomendasi.php">RECOMMENDATION</a></li>
									<li><a href="daftar_hotel.php">HOTEL LIST</a></li>
									<li><a href="#about">ABOUT</a></li>
								</ul>
						</div>
					
        </div>
		</nav>
		</div>
    <!-- Body Start -->

		<!-- Jumbotron Start -->
		<div id="index-banner" class="parallax-container">
			<div class="section no-pad-bot">
				<div class="container">
					<h1 class="header jarak center white-text" style="font-size: 40px">DSS USING TOPSIS METHOD</h1>
					<div class="row center">
						<h5 class="header jarak-button col s12 light" style="margin-bottom: 0px; font-size: 26px">FOR CHOOSING HOTEL IN MALANG</h5>
					</div>
					<div class="row center" \>
								<a href="rekomendasi.php" id="download-button" class="waves-effect waves-light btn-large" style="margin-top: 40px">Choose Recommendation</a>
							</div>
				</div>
			</div>
			<div class="parallax"><img src="assets/image/pixel.jpg" alt="Laptop" style="filter: brightness(50%)"></div>
		</div>
		<!-- Jumbotron End -->

	<!-- Info Start -->
	<div style="background-color: white">
		<div class="container">
		    <div class="section-card" style="padding: 36px 0px">
		    	<div class="row">
		    		<div class="col s6">
			    		<center><h5 class="header" style="margin-left: 0px; margin-bottom: 0px; margin-top: 25px; color: #635c73">SYSTEM INFO</h5></center><br>
			    		<p style="text-align: justify; padding-right: 16px;">This Decision Support System is  made using TOPSIS method for accomplish DSS final project.</p>
						</div>
			    	<div class="col s6">
			    		<center><h5 class="header" style="margin-left: 0px; margin-bottom: 0px; margin-top: 25px; color: #635c73">METHOD INFO</h5></center><br>
							<p style="text-align: justify; padding-left: 16px;">The method used is the TOPSIS method. TOPSIS method is one method of solving the decision support system. This method evaluates several alternatives against a set of attributes or criteria, where each attribute is independent of one another.
							</p>
							</div>
		    	</div>
	    	</div>
		</div>
	</div>
	<!-- Info End -->

	<!-- Modal Start -->
	<div id="about" class="modal">
        <div class="modal-content">
          <h4>About</h4>
          <p>This Hotel Selection Decision Support System uses the TOPSIS method which is built using the PHP language.
          This system was created as a Final Project for Decision Support Systems Course <br>
				<br>
				1. Lelyta Salsabila<br>
				2. Putri Lydia P.</a><br>
			</p>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>
    <!-- Modal End -->
	
    <!-- Body End -->

   <!-- Footer Start -->
	<div class="footer-copyright" style="padding: 0px 0px; background-color: white">
      <div class="container">
        <p align="center" style="color: #999">&copy; DSS for Choosing Hotel</p>
      </div>
    </div>
    <!-- Footer End -->
    <script type="text/javascript">
	 			$(document).ready(function(){
	      $('.parallax').parallax();
				$('.modal').modal();
	    });
	</script>
</body>
</html>