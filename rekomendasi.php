<!DOCTYPE html>
<html>
<head>
	<title>Decision Support System for Choosing Hotel</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
	<link rel="stylesheet" href="assets/css/table.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<link rel="apple-touch-icon" sizes="76x76" href="assets/image/apple-icon.png"> 	<link rel="icon" type="image/png" sizes="96x96" href="assets/image/favicon.png">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--Import jQuery before materialize.js-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/materialize.js"></script>
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
	<div class="navbar-fixed">
	<nav>
    	<div class="container">
					
						<div class="nav-wrapper">

								<ul class="left" style="margin-left: -52px;">
									<li><a href="index.php">HOME</a></li>
									<li><a class="active" href="rekomendasi.php">RECOMMENDATION</a></li>
                                    <li><a href="daftar_hotel.php">HOTEL LIST</a></li>
                                    <li><a href="#about">ABOUT</a></li>
								</ul>
						</div>
					
        </div>
		</nav>
		</div>
		<!-- Body Start -->

		<!-- Daftar Hotel Start -->
        <div style="background-color: #efefef">
            <div class="container">
                <div class="section-card" style="padding: 32px 0px 20px 0px">
                    <ul>
                        <li>
                            <div class="row">
                                <div class="col s3">
                                </div>
                                <div class="col s6">      
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="row">
                                                <center><h4>Insert Weight</h4></center>
                                                <br>
                                                <form class = "col s12" method="POST" action="hasil.php">
                                                    <div class = "row">
                                                        <div class="col s12">

                                                            <div class="col s6" style="margin-top: 10px;">
                                                                <b>Price Criteria</b>
                                                            </div>
                                                            <div class="col s6">
                                                                <select required name="price">
                                                                    <option value = "" disabled selected style="color: #eceff1;"><i>Price Criteria</i></option>
                                                                    <option value = "1">< Rp. 1.000.000</option>
                                                                    <option value = "2">1.001.000 - 2.000.000</option>
                                                                    <option value = "3">2.001.000 - 3.000.000</option>
                                                                    <option value = "4">3.001.000 - 5.000.000</option>
                                                                    <option value = "5">> 5.000.000</option>
                                                                </select>
                                                            </div>

                                                            <div class="col s6" style="margin-top: 10px;">
                                                            <b>Location</b>
                                                            </div>
                                                            <div class="col s6">
                                                                <select required name="location">
                                                                    <option value = "" disabled selected>Location Criteria</option> 
                                                                    <option value = "5">Suburban</option>
                                                                    <option value = "4">Near Mall and Supermarket</option>
                                                                    <option value = "3">Near Downtown</option>
                                                                    <option value = "2">Downtown</option>
                                                                    <option value = "1">Near from Station</option>
                                                                </select>
                                                            </div>

                                                            <div class="col s6" style="margin-top: 10px;">
                                                                <b>Class</b>
                                                            </div>
                                                            <div class="col s6">
                                                                <select required name="class">
                                                                    <option value = "" disabled selected>Class Criteria</option>
                                                                    <option value = "5">1 Star</option>
                                                                    <option value = "4">2 Star</option>
                                                                    <option value = "3">3 Star</option>
                                                                    <option value = "2">4 Star</option>
                                                                    <option value = "1">5 Star</option>
                                                                </select>
                                                            </div>
                                                        </div>  
                                                    <center><button type="submit" class="waves-effect waves-light btn" style="margin-bottom:-46px;">Calculate</button></center>	
                                                </form>       
                                            </div>
                                        </div>
                                    </div>                    
                                </div>
                                <div class="col s3">
                                </div>
                            </div>
                        </li>
                    </ul>	     
                </div>
            </div>
        </div>
        <!-- Rekomendasi Hotel End -->

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
          $('select').material_select();
          $('.modal').modal();
	    });
    </script>
</body>
</html>