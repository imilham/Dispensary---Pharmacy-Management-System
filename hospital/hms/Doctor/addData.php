<?php
include_once('../include/connect.php');

$user_id = $_GET['id'];
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
	$doctorName=$_POST['doctorName'];
	$doctorNic=$_POST['doctorNic'];
	$gender=$_POST['gender'];
	$doctorContact=$_POST['doctorContact'];
	$doctorEmail=$_POST['doctorEmail'];
	$docotrSpecial=$_POST['docotrSpecial'];
	$docDOB=$_POST['docDOB'];


	
	
	//$dis_i;

	$query=mysqli_query($con,"insert into tbl_doctor(doctor_name, doctor_nic, doctor_gender, doctor_tp, doctor_email, doctor_speciality, doctor_dob,user_id) 
												values('$doctorName', '$doctorNic', '$gender', '$doctorContact', '$doctorEmail', '$docotrSpecial', '$docDOB' ,'$user_id')");
	if($query)
	{
		header('Location:../../index.php');
	}
	else{
		
	}


}


?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Doctor Data Insert</title>
		
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
				<a href="../index.php"><h2>D & P MS | Insert Doctor Data</h2></a>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register">
					<form name="registration" id="registration"  method="post" onSubmit="return valid();">
						<fieldset>
							<legend>
								Doctor Details
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
							<!-- Doctor name -->
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="doctorName" id="doctorName"   placeholder="Doctor Name" required>
									<i class="fa fa-user"></i> </span>
									 <span id="user-availability-status2" style="font-size:12px;"></span>
							</div>
							

							<!-- Doctor nic -->
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="doctorNic" id="doctorNic" onBlur="doctorAvailability()" placeholder="Doctor National Identity Number" required maxlength="12" oninput="this.value = this.value.toUpperCase();">
									<i class="fa fa-user"></i>
								</span>
								<span id="doctor-availability" style="font-size: 12px;">hiiiiiiiiiiiii</span>
							</div>

							
							<button onclick="doctorAvailability();">Click Me</button>

							<!--  Doctor Gender-->
							

							<div class="form-group">
								<label class="block">
									Select Doctor Gender
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-Doctor" name="gender" value="Male"  required  >
									<label for="rg-Doctor">
										Male
									</label>
									<input type="radio" id="rg-Dispensary" name="gender" value="Female"  required>
									<label for="rg-Dispensary">
										Female
									</label>
									
								</div>
							</div>


							<!-- doctor contact number -->
							<div class="form-group">
								<span class="input-icon">
									<input type="text"maxlength="10" class="form-control" name="doctorContact" id="doctorContact"  placeholder="Doctor Contact Number" required>
									<i class="fa fa-user"></i> </span>
									
							</div>


							<!-- Doctor Email-->
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="doctorEmail" id="doctorEmail" value="<?php echo $email; ?>" placeholder="Doctor Email" required readonly>
									<i class="fa fa-user"></i> </span>
									 
							</div>

							<!-- Doctor Speciality-->
							<!-- <div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="docotrSpecial" id="docotrSpecial"  placeholder="Doctor Speciality" required>
									<i class="fa fa-user"></i> </span>
							</div> -->

							<div class="panel-body">
								<span class="input-icon">
	
									<form role="form" name="docotrSpecial" id = "docotrSpecial" method="post" onSubmit="return valid();">
										<div class="form-group">
											<!-- <label for="DoctorSpecialization">
												Doctor Specialization
											</label> -->
									<select name="docotrSpecial" class="form-control" required="true">
												<option value="">Select Specialization</option>
									<?php $ret=mysqli_query($con,"select * from doctorspecilization");
									while($row=mysqli_fetch_array($ret))
									{
									?>
												<option value="<?php echo htmlentities($row['specilization']);?>">
													<?php echo htmlentities($row['specilization']);?>
												</option>
												<?php } ?>
												
											</select>
											
								</span>
							</div>




							<!-- docot dob -->
							<div class="form-group">
									<label for="birthday">Doctor DOB:</label>
									<input type="date" id="docDOB" name="docDOB" required>
							</div>

						 <div class="form-actions">
							<!-- canceling button	 -->
								<button type="reset" class="btn btn-primary " id="cancel" name="cancel" for="show">
									Cancel Registration 
									<!-- <i class="fa fa-trash-o" aria-hidden="true"></i> -->
									<i class="fa fa-trash" aria-hidden="true"></i>
									<!-- <i class="fa fa- fa-trash-o"></i> -->
								</button>

							<!-- submitting button -->
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit" for="show">
									Complete Profile <i class="fa fa-arrow-circle-right"></i>
								</button>

							</div>

							
<!-- 
							<div class="form-actions">
								
								
							</div> -->
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
				function doctorAvailability() {
					$("#loaderIcon").show();
					jQuery.ajax({
						url: "check_availability.php",
						data: 'doctorNic=' + $("#doctorNic").val(),
						type: "POST",
						success: function(data) {
							$("#doctor-availability").html(data);
							$("#loaderIcon").hide();
						},
						//document.getElementById("doctorContact").value = "fjfjfj";
						error: function() {}
					});
				}
			</script>
   






		
	</body>
	<!-- end: BODY -->
</html>













   
