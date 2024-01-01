<?php
include_once('../include/connect.php');

$user_id = $_GET['id'];
$brNum = $_GET['val'];
$email = $_GET['email'];


// Use the values as needed
// echo "user_id: " . $user_id;
// echo "brNum: " . $brNum;
// echo "email is". $email;

if (isset($_GET['id'])) 
	{
		$user_id = $_GET['id'];
		
		
	} 



if(isset($_POST['submit']))
{
	// $brnum=$_POST['brnum'];
	$dispensaryName=$_POST['dispensaryName'];
	$dispensaryLocation=$_POST['dispensaryLocation'];
	$dispensaryIncharge=$_POST['dispensaryIncharge'];
	$dispensaryContact=$_POST['dispensaryContact'];
	$disOpen=$_POST['openingTime'];
	$disClose=$_POST['closingTime'];
	
	//$dis_i;

	$query=mysqli_query($con,"insert into tbl_dispensary(dispensary_name, dispensary_brNum, dispensary_location, dispensary_incharge, dispensary_opening, dispensary_closing, status,user_id, dispensary_reg, dispensary_tp, dispensary_email) 
												values('$dispensaryName','$brNum','$dispensaryLocation','$dispensaryIncharge','$disOpen','$disClose','Pending','$user_id',current_date(), '$dispensaryContact', '$email')");
	if($query)
	{
		header('Location:../../index.php');
	}
	else{
		
	}

		// //to get the lates dispensary id from the database
	// 	$sqlRead = mysqli_query($con,"select dispensary_id from tbl_dispensary where dispensary_brNum = '$brNum'");		
	// 			if ($sqlRead->num_rows > 0) {
	// 				$row = $sqlRead->fetch_assoc();
	// 				$dis_id = $row["dispensary_id"];
	// 				//$_SESSION['msg']=" $columnValue  Dispensary is Approved !!";
					
	// 				// <!-- alert($columnValue); -->
	// 				echo "disp id is " .$dis_id;
					
	// 				$dis_i = $dis_id;
	// 			} 

	// //to get the user email id from the table user_Logins			
	// 			$sqlRead = mysqli_query($con,"select user_email from tbl_userlogins where user_id = '$user_id'");		
	// 			if ($sqlRead->num_rows > 0) {
	// 				$row = $sqlRead->fetch_assoc();
	// 				$user_email = $row["user_email"];
	// 				//$_SESSION['msg']=" $columnValue  Dispensary is Approved !!";
				
	// 				// <!-- alert($columnValue); -->	
	// 			} 
	//updating the dispensary email and the contact number
	//$query=mysqli_query($con,"insert into tbl_dispensary_contact(dispensary_id, dispensary_contact, dispensary_email) values('$dis_i', '$dispensaryContact', '$user_email')");

}


?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Dispensary Data Insert</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../vendor/themify-icons/themify-icons.min.css">
		<link href="../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="../assets/css/styles.css">
		<link rel="stylesheet" href="../assets/css/plugins.css">
		<link rel="stylesheet" href="../assets/css/themes/theme-1.css" id="skin_color" />
		<link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

	</head>

	
	
	<body class="login">

	
	<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.php"><h2>D & P MS | Insert Dispensry Data</h2></a>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register">
					<form name="registration" id="registration"  method="post" onSubmit="return valid();">
						<fieldset>
							<legend>
								Dispensary Details
							</legend>
							
							<p>
								Enter your Registration Details:
							</p>
							<!-- Registration number -->
							<!-- <div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="brnum" id="brnum" onBlur="brNUmAvailability()"  placeholder="Business Registration Number" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status3" style="font-size:12px;"></span>
							</div> -->
							<!-- registration name -->
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="dispensaryName" id="dispensaryName" onBlur="userNameAvailability()"  placeholder="Business Registration Name" required>
									<i class="fa fa-user"></i> </span>
									 <span id="user-availability-status2" style="font-size:12px;"></span>
							</div>

							<!-- Dispensary Location -->
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="dispensaryLocation" id="dispensaryLocation"  placeholder="Dispensary Location" required>
									<i class="fa fa-user"></i> </span>
									 
							</div>

							<!-- Dispensary Incharge -->
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="dispensaryIncharge" id="dispensaryIncharge"  placeholder="Dispensary Incharge" required>
									<i class="fa fa-user"></i> </span>
									
							</div>

							<div class="form-group">
								<span class="input-icon">
									<input type="text"maxlength="10" class="form-control" name="dispensaryContact" id="dispensaryContact"  placeholder="Dispensary Contact Number" required>
									<i class="fa fa-user"></i> </span>
									
							</div>


						
							
							<!-- <div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree" checked="true" readonly=" true" required>
									<label for="agree">
										I agree
									</label>
								</div>
							</div> -->

							
						

							<div class="form-group">
								<label for="">Dispensary Opening Time:</label>
								<input type="time" id="appt" name="openingTime" required>
									
								<br>
							</div>
							<!-- min="09:00" max="18:00" required> -->
							<!-- min="09:00" max="18:00" required> -->
							
							<div class="form-group">
								<label for="">Dispensary Closing Time :</label>
								<input type="time" id="appt" name="closingTime" required>
								
								<br><br>
							</div>



							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit" for="show">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> D & P MS</span>. <span>All rights reserved</span>
					</div>

				</div>

			</div>
		</div>
		<script src="hms/vendor/jquery/jquery.min.js"></script>
		<script src="hms/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="hms/vendor/modernizr/modernizr.js"></script>
		<script src="hms/vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="hms/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="hms/vendor/switchery/switchery.min.js"></script>
		<script src="hms/vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="hms/assets/js/main.js"></script>
		<script src="hms/assets/js/login.js"></script>
	
	<script>
		jQuery(document).ready(function() {
			Main.init();
			Login.init();
			});
	</script>
		
	<script>
		function brNUmAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
		url: "check_brNum_availability.php",
		data:'brnum='+$("#brnum").val(),
		type: "POST",
		success:function(data){
		$("#user-availability-status3").html(data);
		$("#loaderIcon").hide();
		},
		error:function (){}
		});
		}

	</script>	

	<script>

		function userNameAvailability() 
		{
			$("#loaderIcon").show();
			jQuery.ajax
			({
				url: "check_availability.php",
				data:'userName='+$("#userName").val(),
				type: "POST",
				success:function(data){
				$("#user-availability-status2").html(data);
				$("#loaderIcon").hide();
				},
				error:function (){}
			});
		}




	</script>


   






		
	</body>
	<!-- end: BODY -->
</html>













   
