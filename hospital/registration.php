<?php
include_once('hms/include/connect.php');
$brNum;
if(isset($_POST['submit']))
{
	$userName=$_POST['userName'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$userType=$_POST['userType'];
	$brNum=$_POST['brNum'];
	

	$query=mysqli_query($con,"insert into tbl_userlogins(user_name, user_password, user_email, user_type) values('$userName','$password','$email','$userType')");	
	
	if($query)
	{
		//echo "<script>alert('Successfully Registered. You can login now');</script>";
		//header('location:user-login.php');

		$sqlRead = mysqli_query($con,"select user_id from tbl_userlogins where user_name = '$userName'");
			
			
			
			if ($sqlRead->num_rows > 0) {
				$row = $sqlRead->fetch_assoc();
				$columnValue = $row["user_id"];
				$_SESSION['msg']=" $columnValue  Dispensary is Approved !!";
				?>
				<!-- alert($columnValue); -->
				
				<?php
			  } 

		if($userType == "Dispensary")
		{
		//echo "<script>alert('Doctor Successfully Registered. You can login now');</script>";
//		header('Location: hms/dispensary/addData.php?id='.urlencode($row['user_id'] . val = .urlencode($row['user_id'] ));
// header('Location: hms/dispensary/addData.php?id=' . urlencode($row['user_id']) . '&val=' . urlencode($row['user_id']));
		//header('Location: hms/dispensary/addData.php?id=' . urlencode($row['user_id']) . '&val=' . urlencode($brNum) . '&email=' . urlencode($email));
		header('Location: hms/dispensary/addData.php?id=' . urlencode($row['user_id']) . '&val=' . urlencode($brNum) . '&email=' . urlencode($email));
	
		}
		else if($userType == "Doctor")
		{
			header('Location: hms/doctor/addData.php?id=' . urlencode($row['user_id']) . '&email=' . urlencode($email));			
		}
		else if($userType == "Pharmacy"){
			header('Location: hms/Pharmacy/addData.php?id=' . urlencode($row['user_id']) . '&val=' . urlencode($brNum) . '&email=' . urlencode($email));
	
		}
		
	}
	
}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>User Registration</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="hms/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="hms/vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="hms/vendor/themify-icons/themify-icons.min.css">
		<link href="hms/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="hms/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="hms/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="hms/assets/css/styles.css">
		<link rel="stylesheet" href="hms/assets/css/plugins.css">
		<link rel="stylesheet" href="hms/assets/css/themes/theme-1.css" id="skin_color" />
		<link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>


	  




		
	<script type="text/javascript">
	
		function valid()
		{
			if(document.registration.password.value != document.registration.password_again.value)
			{
			//alert("Password and Confirm Password Field do not match  !!");
			document.getElementById("user-availability-status4").style.color = "red";	
			document.getElementById("user-availability-status4").textContent = "Password Not Matching";

			document.registration.password_again.focus();
			return false;
			}
			document.getElementById("user-availability-status4").style.color = "black";	
			document.getElementById("user-availability-status4").textContent = "";
		
		return true;
		}
	</script>
		

	</head>

	
	
	<body class="login">





















	
	<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.php"><h2>D & P MS | User Registration</h2></a>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register">
					<form name="registration" id="registration"  method="post" onSubmit="return valid();">
							<legend>
								Sign Up
							</legend>
							
							<p>
								Enter your account details below:
							</p>

									<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" required>
									<i class="fa fa-envelope"></i> </span>

									<input type="text" class="form-control" name="userName" id="userName" onBlur="userNameAvailability()"  placeholder="Username" required>
									<i class="fa fa-user"></i> </span>


								<label class="block">
									Slect Your User Account Type
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-Doctor" name="userType" value="Doctor" onclick = "disableTextField()" required  >
									<label for="rg-Doctor">
										Doctor
									</label>
									<input type="radio" id="rg-Dispensary" name="userType" value="Dispensary" onclick = "disEnableTextField()" required>
									<label for="rg-Dispensary">
										Dispensary
									</label>
									<input type="radio" id="rg-Pharmacy" name="userType" value="Pharmacy" onclick = "pharmEnableTextField()" required>
									<label for="rg-Pharmacy">
										Pharmacy
									</label>
								</div>
							</div>

							
							<div class="form-group" id="brNumDiv">
								<span class="input-icon">
									<input type="text" class="form-control" name="brNum" id="brNum" onBlur="validateBrNum()"  placeholder=""  >
									<i class="fa fa-user"></i> </span>
									 <span id="user-availability-status3" style="font-size:12px;"></span>
							</div>








						
							<!-- <div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i> </span>
							</div> -->

							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i> </span>
							</div>




							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Confirm Password" required>
									<i class="fa fa-lock"></i> </span>
									<span id="user-availability-status4" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree" checked="false" readonly=" true" required>
									<label for="agree">
										I agree
									</label>
									<a href="index.php#logins">
											Terms & Conditions
										</a>
								</div>
							</div>

							<!-- <div class="form-group">
								<u><a href="index.php#logins">
											Terms & Conditions
										</a>
								</u>
							</div> -->

		

							<div class="form-actions">
								<p>
									Already have an account?
									<a href="index.php#logins">
										Log-in
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit" for="show" >
									Register <i class="fa fa-arrow-circle-right"></i>
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
		function userAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
		url: "check_availability.php",
		data:'email='+$("#email").val(),
		type: "POST",
		success:function(data){
		$("#user-availability-status1").html(data);
		// $("#user-availability-status2").html(data);
		
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


	<script>
	function brNumAvailability() 
	{
		$("#loaderIcon").show();
		jQuery.ajax
		({
			url: "check_availability.php",
			data:'brNum='+$("#brNum").val(),
			type: "POST",
			success:function(data){
			$("#user-availability-status3").html(data);
			$("#loaderIcon").hide();
			},
			error:function (){}
		});
	}

	//dispensary enabling
	function disEnableTextField() {
	document.getElementById("brNum").disabled = false;
	document.getElementById("brNum").placeholder = "Dispensary Registration number";
	document.getElementById("brNumDiv").style.display = "block";
	document.getElementById("brNum").required ="false";

	}

	//pharmacy enabling
	function pharmEnableTextField() {
	document.getElementById("brNum").disabled = false;
	document.getElementById("brNum").placeholder = "Pharmacy Registration number";
	document.getElementById("brNumDiv").style.display = "block";

	}


	//disable br number for doctor
	function disableTextField() {
	//document.getElementById("brNum").disabled = true;
	document.getElementById("brNum").value = "";
	document.getElementById("user-availability-status3").innerHTML = "";
	document.getElementById("brNum").placeholder = "";
	//document.getElementById("brNum").required ="false";
	document.getElementById("brNumDiv").style.display = "none";
	



	}



	//brnumber validation
	function validateBrNum(){

		if(document.getElementById("rg-Doctor").checked){

		}
		else if((document.getElementById("rg-Dispensary").checked))
		{
			brNumAvailability();
		}


	}



	window.onload = function() {
	// Code to be executed when the page loads
	disableTextField();
	};






</script>






		
	</body>
	<!-- end: BODY -->
</html>













   
