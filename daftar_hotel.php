<?php
session_start();
include('koneksi.php');
?>

<?php
	if(isset($_POST["tambah_hotel"])){
		$name      = $_POST["name"];
		$price     = $_POST["price"];
		$class       = $_POST["class"];
		$location       = $_POST["location"];
		
		$price_angka = $class_angka = $location_angka = 0;

		if($price < 1000000){
			$price_angka = 5;
		} 
		elseif($price >= 1000000 && $price <= 2000000){
			$price_angka = 4;
		}
		elseif($price > 2000000 && $price <= 3000000){
			$price_angka = 3;
		}
		elseif($price > 3000000 && $price <= 5000000){
			$price_angka = 2;
		}
		elseif($price > 5000000){
			$price_angka = 1;
		}


		if($class < 6){
			$class_angka = $class;
		}
		elseif($class == 6){
			$class_angka = 5;
		} 

		switch($location){
			case "Suburban":
				$location_angka = 1;
				break;
			case "Near Mall and Supermarket":
				$location_angka = 2;
				break;
			case "Near Downtown":
				$location_angka = 3;
				break;
			case "Downtown":
				$location_angka = 4;
				break;
			case "Near from Station":
				$location_angka = 5;
				break;
		}

		$sql = "INSERT INTO `data_hotel` (`id_hotel`, `name_hotel`, `price_hotel`, `class_hotel`, `location_hotel`,`price_angka`, `class_angka`, `location_angka`) 
				VALUES (NULL, :name_hotel, :price_hotel, :class_hotel, :location_hotel, :price_angka, :class_angka, :location_angka)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':name_hotel', $name);
		$stmt->bindValue(':price_hotel', $price);
		$stmt->bindValue(':class_hotel', $class);
		$stmt->bindValue(':location_hotel', $location);
		$stmt->bindValue(':price_angka', $price_angka);
		$stmt->bindValue(':class_angka', $class_angka);
		$stmt->bindValue(':location_angka', $location_angka);
		$stmt->execute();
	}

	if(isset($_POST["hapus_hotel"])){
		$id_hapus_hotel = $_POST['id_hapus_hotel'];
		$sql_delete = "DELETE FROM `data_hotel` WHERE `id_hotel` = :id_hapus_hotel";
		$stmt_delete = $db->prepare($sql_delete);
		$stmt_delete->bindValue(':id_hapus_hotel', $id_hapus_hotel);
		$stmt_delete->execute();
		$query_reorder_id=mysqli_query($selectdb,"ALTER TABLE data_hotel AUTO_INCREMENT = 1");
	}
?>

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

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--Import jQuery before materialize.js-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/materialize.js"></script>
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

	<!-- Data Table -->
	<link rel="stylesheet" type="text/css" href="assets/dataTable/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="assets/dataTable/jquery.dataTables.min.js"></script>

</head>
<body>
	<div class="navbar-fixed">
	<nav>
    	<div class="container">
					
						<div class="nav-wrapper">
								<ul class="left" style="margin-left: -52px;">
									<li><a href="index.php">HOME</a></li>
									<li><a href="rekomendasi.php">RECOMMENDATION</a></li>
									<li><a class="active" href="daftar_hotel.php">HOTEL LIST</a></li>
									<li><a href="#about">ABOUT</a></li>
								</ul>
						</div>
					
        </div>
		</nav>
		</div>
		<!-- Body Start -->

		<!-- Daftar hotel Start -->
	<div style="background-color: #efefef">
		<div class="container">
		    <div class="section-card" style="padding: 40px 0px 20px 0px;">
				<ul>
				    <li>
						<div class="row">
						<div class="card">
								<div class="card-content">
									<center><h4 style="margin-bottom: 0px; margin-top: -8px;">Hotel List</h4></center>
									<table id="table_id" class="hover dataTablesCustom" style="width:100%">
											<thead style="border-top: 1px solid #d0d0d0;">
												<tr>
													<th><center>No </center></th>
													<th><center>Name hotel</center></th>
													<th><center>Price hotel</center></th>
													<th><center>Location of the hotel</center></th>
													<th><center>Class hotel</center></th>
													<th><center>Remove</center></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query=mysqli_query($selectdb,"SELECT * FROM data_hotel");
												$no=1;
												while ($data=mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
													<td><center><?php echo $data['name_hotel'] ?></center></td>
													<td><center><?php echo "Rp. ", $data['price_hotel'] ?></center></td>
													<td><center><?php echo $data['location_hotel'] ?></center></td>
													<td><center><?php echo $data['class_hotel'] ?></center></td>
													<td>
														<center>
															<form method="POST">
																<input type="hidden" name="id_hapus_hotel" value="<?php echo $data['id_hotel'] ?>">
																<button type="submit" name="hapus_hotel" style="height: 32px; width: 32px;" class="btn-floating btn-small waves-effect waves-light red"><i style="line-height: 32px;" class="material-icons">remove</i></button>
															</form>
														</center>
													</td>
												</tr>
												<?php
														$no++;}
												?>
											</tbody>
									</table>
									</div>
									
							</div>
							<a href="#tambah" class="btn-floating btn-large waves-effect waves-light teal btn-float-custom"><i class="material-icons">add</i></a>
						</div>
				    </li>
				</ul>	     
	    	</div>
		</div>
	</div>
	<!-- Daftar hotel End -->

	<!-- Daftar hotel Start -->
	<div style="background-color: #efefef">
		<div class="container">
		    <div class="section-card" style="padding: 1px 20% 24px 20%;">
				<ul>
				    <li>
						<div class="row">
							<div class="card">
								<div class="card-content" style="padding-top: 10px;">
									<center><h5 style="margin-bottom: 10px;">Analisa Hotel</h5></center>
									<table class="responsive-table">
									
											<thead style="border-top: 1px solid #d0d0d0;">
												<tr>
													<th><center>Alternative</center></th>
													<th><center>C1 (Cost)</center></th>
													<th><center>C2 (Cost)</center></th>
													<th><center>C3 (Benefit)</center></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query=mysqli_query($selectdb,"SELECT * FROM data_hotel");
												$no=1;
												while ($data=mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><center><?php echo "A",$no ?></center></td>
													<td><center><?php echo $data['price_angka'] ?></center></td>
													<td><center><?php echo $data['location_angka'] ?></center></td>
													<td><center><?php echo $data['class_angka'] ?></center></td>
												</tr>
												<?php
														$no++;}
												?>
											</tbody>
									</table>
									</div>
							</div>
						</div>
				    </li>
				</ul>	     
	    	</div>
		</div>
	</div>
	<!-- Daftar hotel End -->

	<!-- Modal Start -->
	<div id="tambah" class="modal" style="width: 40%; height: 100%;">
		<div class="modal-content">
			<div class="col s6">
					<div class="card-content">
						<div class="row">
							<center><h5 style="margin-top:-8px;">Insert Hotel</h5></center>
							<form method="POST" action="">
								<div class = "row">
									<div class="col s12">

										<div class="col s6" style="margin-top: 10px;">
											<b>Name</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem;" name="name" type="text" required>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>Price</b>
										</div>
										<div class="col s6">
											<input style="height: 2rem;" name="price" type="number" required>
										</div>
										
										<div class="col s6" style="margin-top: 10px;">
										<b>Location</b>
										</div>
										<div class="col s6">
											<select style="display: block; margin-bottom: 4px;" required name="location">
												<!-- <option value = "" disabled selected>Kriteria class</option>  -->
												<option value = "Suburban">Suburban</option>
												<option value = "Near Mall and Supermarket">Near Mall and Supermarket</option>
												<option value = "Near Downtown">Near Downtown</option>
												<option value = "Downtown">Downtown</option>
												<option value = "Near from Station">Near from Station</option>
											</select>
										</div>

										<div class="col s6" style="margin-top: 10px;">
											<b>Class</b>
										</div>
										<div class="col s6">
											<select style="display: block; margin-bottom: 4px;" required name="class">
												<!-- <option value = "" disabled selected>Kriteria Penyimpanan</option> -->
												<option value = "1">1 Star</option>
												<option value = "2">2 Star</option>
												<option value = "3">3 Star</option>
												<option value = "4">4 Star</option>
												<option value = "5">5 Star</option>
											</select>
										</div>
									</div>  
								</div> 
								<center><button name="tambah_hotel" type="submit" class="waves-effect waves-light btn teal" style="margin-top: 0px;">Add</button></center>	
							</form>
						</div>
					</div>
				</div>
			</div>
		<div style="height: 0px; "class="modal-footer">
          <a style="margin-top: -30px;" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
	</div>
	<!-- Modal End -->

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
		$('#table_id').DataTable({
    		"paging": false
		});
	    });
	</script>
</body>
</html>