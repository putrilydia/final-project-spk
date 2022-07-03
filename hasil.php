<?php 
session_start();
include('koneksi.php');

//Bobot
$W1	= 0.4;
$W2	= 0.3;
$W3	= 0.3;

//Pembagi Normalisasi
function pembagiNM($matrik){
	for($i=0;$i<3;$i++){
		$pangkatdua[$i] = 0;
		for($j=0;$j<sizeof($matrik);$j++){
			$pangkatdua[$i] = $pangkatdua[$i] + pow($matrik[$j][$i],2);}
		$pembagi[$i] = sqrt($pangkatdua[$i]);
	}
	return $pembagi;
}

//Normalisasi
function Transpose($squareArray) {

    if ($squareArray == null) { return null; }
    $rotatedArray = array();
    $r = 0;

    foreach($squareArray as $row) {
        $c = 0;
        if (is_array($row)) {
            foreach($row as $cell) { 
                $rotatedArray[$c][$r] = $cell;
                ++$c;
            }
        }
        else $rotatedArray[$c][$r] = $row;
        ++$r;
    }
    return $rotatedArray;
}

function JarakIplus($aplus,$bob){
	for ($i=0;$i<sizeof($bob);$i++) {
		$dplus[$i] = 0;
		for($j=0;$j<sizeof($aplus);$j++){
			$dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]),2);
		}
		$dplus[$i] = round(sqrt($dplus[$i]),4);
	}
	return $dplus;
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
						<li><a href="rekomendasi.php">RECCOMENDATION</a></li>
						<li><a href="daftar_hotel.php">HOTEL LIST</a></li>
						<li><a class="active" href="hasil.php">CALCULATION</a></li>
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
			<div class="section-card" style="padding: 20px 0px">
				<!--   Icon Section   -->


				<center>
					<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">HOTEL RECOMMENDATION RESULT</h4>
				</center>
				<ul>
					<li>
						<div class="row">
							<div class="card">
								<div class="card-content">
									<h5 style="margin-bottom: 16px; margin-top: -6px;">Matrix Hotel</h5>
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
											while ($data_hotel=mysqli_fetch_array($query)) {
												$Matrik[$no-1]=array($data_hotel['price_angka'],$data_hotel['location_angka'],$data_hotel['class_angka'] );
												?>
												<tr>
													<td><center><?php echo "A",$no ?></center></td>
													<td><center><?php echo $data_hotel['price_angka'] ?></center></td>
													<td><center><?php echo $data_hotel['location_angka'] ?></center></td>
													<td><center><?php echo $data_hotel['class_angka'] ?></center></td>
												</tr>
												<?php
												$no++;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</li>
				</ul>


				<center>
					<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Normalization Matrix, R:</h4>
				</center>
				<ul>
					<li>
						<div class="row">
							<div class="card">
								<div class="card-content">
									<h5 style="margin-bottom: 16px; margin-top: -6px;">Normalization Matrix "R"</h5>
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
											$pembagiNM=pembagiNM($Matrik);
											while ($data_hotel=mysqli_fetch_array($query)) {

												$MatrikNormalisasi[$no-1]=array($data_hotel['price_angka']/$pembagiNM[0],
													$data_hotel['location_angka']/$pembagiNM[1],
													$data_hotel['class_angka']/$pembagiNM[2]
												)
													?>
													<tr>
														<td><center><?php echo "A",$no ?></center></td>
														<td><center><?php echo round($data_hotel['price_angka']/$pembagiNM[0],6)?></center></td>
														<td><center><?php echo round($data_hotel['location_angka']/$pembagiNM[1],6) ?></center></td>
														<td><center><?php echo round($data_hotel['class_angka']/$pembagiNM[2],6) ?></center></td>
													</tr>
													<?php
													$no++;
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>


					<center>
						<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Weight (W)</h4>
					</center>
					<ul> 
						<li>
							<div class="row">
								<div class="card">
									<div class="card-content">
									<h5 style="margin-bottom: 16px; margin-top: -6px;">Weight (W)</h5>
										<table class="responsive-table">
											<thead>
												<tr>
													<th><center>Value Criteria Price</center></th>
													<th><center>Value Criteria Location</center></th>
													<th><center>Value Criteria Class</center></th>
												</tr>
											</thead>
											<tbody>
												<!--count($W)-->
												<tr>
													<td><center><?php echo($W1);?></center></td>
													<td><center><?php echo($W2);?></center></td>
													<td><center><?php echo($W3);?></center></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>


					<center>
						<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Weighted Matrix Normalized, Y:</h4>
					</center>
					<ul>
						<li>
							<div class="row">
								<div class="card">
									<div class="card-content">
										<h5 style="margin-bottom: 16px; margin-top: -6px;">Weighted Matrix Normalization "Y"</h5>
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
												$pembagiNM=pembagiNM($Matrik);
												while ($data_hotel=mysqli_fetch_array($query)) {
													
													$NormalisasiBobot[$no-1]=array(
														$MatrikNormalisasi[$no-1][0]*$W1,
														$MatrikNormalisasi[$no-1][1]*$W2,
														$MatrikNormalisasi[$no-1][2]*$W3);

														?>
														<tr>
															<td><center><?php echo "A",$no ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][0]*$W1,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][1]*$W2,6) ?></center></td>
															<td><center><?php echo round($MatrikNormalisasi[$no-1][2]*$W3,6) ?></center></td>
														</tr>
														<?php
														$no++;
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Matrix Ideal Solution positive dan negative
							</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card">
										<div class="card-content">
											<h5 style="margin-bottom: 16px; margin-top: -6px;">Matrik Ideal Solution positive "A+" dan negative "A-"
											</h5>
											<table class="responsive-table">

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center></center></th>
														<th><center>Y1 (Cost)</center></th>
														<th><center>Y2 (Cost)</center></th>
														<th><center>Y3 (Benefit)</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$NormalisasiBobotTrans = Transpose($NormalisasiBobot);
													?>
													<tr>
														<?php  
														$idealpositif=array(min($NormalisasiBobotTrans[0]),min($NormalisasiBobotTrans[1]),max($NormalisasiBobotTrans[2]));
														?>
														<td><center><?php echo "Y+" ?> </center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[0]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[1]),6));?>&nbsp(min)</center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[2]),6));?>&nbsp(max)</center></td>
													</tr>
													<tr>
														<?php  
														$idealnegatif=array(max($NormalisasiBobotTrans[0]),max($NormalisasiBobotTrans[1]),min($NormalisasiBobotTrans[2]));
														?>
														<td><center><?php echo "Y-" ?> </center></td>
														<td><center><?php echo(round(max($NormalisasiBobotTrans[0]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[1]),6));?>&nbsp(max)</center></td>
														<td><center><?php echo(round(min($NormalisasiBobotTrans[2]),6));?>&nbsp(min)</center></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">The distance between the weighted value of each Alternative to the positive Ideal Solution											
							</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card" style="margin-left: 320px;margin-right: 320px;">
										<div class="card-content">
											<table class="responsive-table" >

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center>D+</center></th>
														<th><center></center></th>
														<th><center>D-</center></th>
														<th><center></center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$query=mysqli_query($selectdb,"SELECT * FROM data_hotel");
													$no=1;
													$Dplus=JarakIplus($idealpositif,$NormalisasiBobot);
													$Dmin=JarakIplus($idealnegatif,$NormalisasiBobot);
													while ($data_hotel=mysqli_fetch_array($query)) {

														?>
														<tr>
															<td><center><?php echo "D",$no ?></center></td>
															<td><center><?php echo round($Dplus[$no-1],6) ?></center></td>
															<td><center><?php echo "D",$no ?></center></td>
															<td><center><?php echo round($Dmin[$no-1],6) ?></center></td>
														</tr>
														<?php
														$no++;
													}
													?>
												</tbody>
											</table>

										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Preference Value for Each Alternative (V)												
							</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card" style="margin-left: 320px;margin-right: 320px;">
										<div class="card-content">
											<table class="responsive-table" >

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center>Preference Value "V"</center></th>
														<th><center>Value</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													$query=mysqli_query($selectdb,"SELECT * FROM data_hotel");
													$no=1;
													$nilaiV = array();
													while ($data_hotel=mysqli_fetch_array($query)) {
														
														array_push($nilaiV, $Dmin[$no-1]/($Dmin[$no-1]+$Dplus[$no-1]));
														?>
														<tr>
															<td><center><?php echo "V",$no ?></center></td>
															<td><center><?php echo $Dmin[$no-1]/($Dmin[$no-1]+$Dplus[$no-1]); ?></center></td>
														</tr>
														<?php
														$no++;
													}

													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</li>
						</ul>


						<center>
							<h4 class="header" style="margin-left: 24px; margin-bottom: 0px; margin-top: 24px; color: #635c73;">Highest Preference Value
							</h4>
						</center>
						<ul>
							<li>
								<div class="row">
									<div class="card" style="margin-left: 300px;margin-right: 300px;">
										<div class="card-content">
											<table class="responsive-table" >

												<thead style="border-top: 1px solid #d0d0d0;">
													<tr>
														<th><center>Highest Preference Value</center></th>
														<th></th>
														<th><center>Alternative Hotel Choosen</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
														$testmax = max($nilaiV);
														for ($i=0; $i < count($nilaiV); $i++) { 
															if ($nilaiV[$i] == $testmax) {
																$query=mysqli_query($selectdb,"SELECT * FROM data_hotel where id_hotel = $i+1");
																?>
																<tr>
																<td><center><?php echo "V".($i+1); ?></center></td>
																<td><center><?php echo $nilaiV[$i]; ?></center></td>
																<?php while ($user=mysqli_fetch_array($query)) { ?>
																<td><center><?php echo $user['name_hotel']; ?></center></td>
																</tr>
																<?php
															}
														}
													} ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<div class="row center" \>
						<a href="rekomendasi.php" id="download-button" class="waves-effect waves-light btn" style="margin-top: 0px">Recalculate Recommendation</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Daftar Hotel End -->
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