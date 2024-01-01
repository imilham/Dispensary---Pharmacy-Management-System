<?php
session_start();
error_reporting(0);
include('include/config.php');
$dispensary_Id = $_SESSION['id'];

if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

if(isset($_POST['submit']))
{	$doctor_name=$_POST['doctor_name'];
// $docname=$_POST['docname'];
// $docaddress=$_POST['clinicaddress'];
// $docfees=$_POST['docfees'];
// $doccontactno=$_POST['doccontact'];
// $docemail=$_POST['docemail'];
// $password=md5($_POST['npass']);



// $query=mysqli_query($con,"insert into tbl_dispensary_doctor(doctor_id, dispensary_id) values('$email','$userType')");	
	
// if($query)
// {
	//echo "<script>alert('Successfully Registered. You can login now');</script>";
	//header('location:user-login.php');

		$sqlRead = mysqli_query($con,"select doctor_id from tbl_doctor where doctor_name = '$doctor_name'");
		
		if ($sqlRead->num_rows > 0) {
			$row = $sqlRead->fetch_assoc();
			$columnValue = $row["doctor_id"];
			//$_SESSION['msg']=" $columnValue  Dispensary is Approved !!";
			?>
			<!-- alert($columnValue); -->
			
			<?php
		  } 

		//   if ($sqlRead->num_rows > 0) {
		// 	$row = $sqlRead->fetch_assoc();
		// 	$columnValue = $row["doctor_id"];
		// 	//$_SESSION['msg']=" $columnValue  Dispensary is Approved !!";
		// 	?>
		// 	<!-- alert($columnValue); -->
			
		// 	<?php
		//   } 

// 	if($userType == "Dispensary")
// 	{
// 	//echo "<script>alert('Doctor Successfully Registered. You can login now');</script>";
// //		header('Location: hms/dispensary/addData.php?id='.urlencode($row['user_id'] . val = .urlencode($row['user_id'] ));
// // header('Location: hms/dispensary/addData.php?id=' . urlencode($row['user_id']) . '&val=' . urlencode($row['user_id']));
// 	//header('Location: hms/dispensary/addData.php?id=' . urlencode($row['user_id']) . '&val=' . urlencode($brNum) . '&email=' . urlencode($email));
// 	header('Location: hms/dispensary/addData.php?id=' . urlencode($row['user_id']) . '&val=' . urlencode($brNum) . '&email=' . urlencode($email));

// }
// 	else if($userType == "Doctor")
// 	{
// 		header('Location: hms/doctor/addData.php?id=' . urlencode($row['user_id']) . '&email=' . urlencode($email));			
// 	}
	
// }
// else{
// 	//echo "<script>alert('Username or Password already exists');</script>";
// }









$sql=mysqli_query($con,"insert into tbl_dispensary_doctor(doctor_id, dispensary_id) values('$columnValue','$dispensary_Id')");
// insert into tbl_dispensary_doctor()
if($sql)
{
echo "<script>alert('Doctor info added Successfully');</script>";
echo "<script>window.location.href ='dashboard.php'</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dispensary | Add Doctor</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
<script type="text/javascript">
function valid()
{
 if(document.adddoc.npass.value!= document.adddoc.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.adddoc.cfpass.focus();
return false;
}
return true;
}
</script>


<script>
function checkemailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#docemail").val(),
type: "POST",
success:function(data){
$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
	</head>
	<body>
		<div id="app">		
<?php include('include/dispensary-sidebar.php');?>


<?php 
	$disId =  $_SESSION['id'];
    // $ret=mysqli_query($con,"SELECT * FROM tbl_dispensary WHERE dispensary_id='$disId' ");
    $ret=mysqli_query($con,"	select tbl_userlogins.* , tbl_dispensary.* from tbl_userlogins
	INNER JOIN tbl_dispensary
	on tbl_userlogins.user_id = tbl_dispensary.user_id
	WHERE tbl_dispensary.user_id ='$disId' ");



    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
    $disName = $num['dispensary_name'];
    $status=1;
	echo $disName;
    }
?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle"><?php echo $disName?> | Add Doctor</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span><?php echo $disName?></span>
									</li>
									<li class="active">
										<span>Add Doctor</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Add Doctor</h5>
												</div>



















	<!-- Doctor Name -->

			<div class="panel-body">
									
						<form role="form" name="doctor_name" method="post" onSubmit="return valid();">
						<div class="form-group">
						<label for="doctor_name"> Doctor Name </label>
							<select name="doctor_name" class="form-control" required="true"><option value="">Select Doctor Name</option>
								<?php $ret=mysqli_query($con,"select * from tbl_doctor");
								while($row=mysqli_fetch_array($ret))
								{
								?>
								<option value="<?php echo htmlentities($row['doctor_name']);?>">
									<?php echo htmlentities($row['doctor_name']);?>
								</option>
								<?php } ?>
												
							</select>
			</div>


	<!-- Doctor Name -->

	

<!-- 	

			<div class="form-group">
															<label for="doctorname">
																 Doctor Name
															</label>
					<input type="text" name="docname" class="form-control"  placeholder="Enter Doctor Name" required="true">
														</div>


			<div class="form-group">
															<label for="address">
																 Doctor Clinic Address
															</label>
					<textarea name="clinicaddress" class="form-control"  placeholder="Enter Doctor Clinic Address" required="true"></textarea>
														</div>
<div class="form-group">
															<label for="fess">
																 Doctor Consultancy Fees
															</label>
					<input type="text" name="docfees" class="form-control"  placeholder="Enter Doctor Consultancy Fees" required="true">
														</div>
	
<div class="form-group">
									<label for="fess">
																 Doctor Contact no
															</label>
					<input type="text" name="doccontact" class="form-control"  placeholder="Enter Doctor Contact no" required="true">
														</div>

<div class="form-group">
									<label for="fess">
																 Doctor Email
															</label>
<input type="email" id="docemail" name="docemail" class="form-control"  placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()">
<span id="email-availability-status"></span>
</div>



														
														<div class="form-group">
															<label for="exampleInputPassword1">
																 Password
															</label>
					<input type="password" name="npass" class="form-control"  placeholder="New Password" required="required">
														</div>
														
<div class="form-group">
															<label for="exampleInputPassword2">
																Confirm Password
															</label>
									<input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" required="required">
														</div>
														 -->
														
														
			<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
				Submit
			</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php } ?>