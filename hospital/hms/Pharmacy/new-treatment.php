<?php
session_start();
error_reporting(0);
include('include/config.php');

if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
	// echo "Hello world!<br>";
	

if(isset($_POST['submit']))
{	

	
	//  echo $_SESSION['id'];
		$disId =  $_SESSION['id'];
	
		$ret=mysqli_query($con,"SELECT * FROM tbl_dispensary WHERE dispensary_id='$disId' ");
		$num=mysqli_fetch_array($ret);
		if($num>0)
		{
		$disName = $num['dispensary_name'];
		echo $disName;
		}
	






	$dispensaryid=$_SESSION['id'];
	$patname=$_POST['patname'];
	$patnic=$_POST['patnic'];
$patcontact=$_POST['patcontact'];
$patemail=$_POST['patemail'];
$gender=$_POST['gender'];
$pataddress=$_POST['pataddress'];
$patage=$_POST['patage'];
$medhis=$_POST['medhis'];
// $sql=mysqli_query($con,"insert into tblpatient(Docid,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis) values('$docid','$patname','$patcontact','$patemail','$gender','$pataddress','$patage','$medhis')");
// $sql=mysqli_query($con,"insert into tblpatient(patient_nic,patient_name,patient_age,patient_contact,patient_address,patient_email,patient_gender,medhistory,medicine,status,dispensary,pharmacy)  values('$patname','$patnic','$patcontact','$patemail','$gender','$pataddress','$patage','$medhis')");
$sql=mysqli_query($con,"insert into tbl_patient(patient_nic,patient_name,patient_age,patient_contact,patient_address,patient_email,patient_gender,medhistory,dispensary) 
						values('$patnic','$patname','$patage','$patcontact','$pataddress','$patemail','$gender','$medhis','$disName')");

if($sql)
{
echo "<script>alert('Patient info added Successfully');</script>";
header('location:new-treatment.php');

}
// else{
// 	hospital\index.php
// }
}
?>




<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dispensary | New Treatment</title>
		
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

		<!-- BEGINING OF THE  EMAIL VALIDATOR -->
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#patemail").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

		<!-- END OF THE OF THE EMAIL VALIDATOR -->
		
		<!-- BEGINING OF THE  NIC VALIDATOR -->
	<script>
function userAvailabilityNic() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availabilityNic.php",
data:'nic='+$("#patnic").val(),
type: "POST",
success:function(data){
$("#user-availability-status2").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<!-- END OF THE OF THE NIC VALIDATOR -->

<!-- BEGINING OF THE  cONTACT VALIDATOR -->
<script>
function userAvailabilityContact() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availabilityContact.php",
data:'contact='+$("#patcontact").val(),
type: "POST",
success:function(data){
$("#user-availability-status3").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<!-- END OF THE OF THE cONTACT VALIDATOR -->

	</head>
	<body>
		<div id="app">		
<?php include('include/dispensary-sidebar.php');?>
<div class="app-content">
<?php include('include/header.php');?>



						
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle"><?php echo $disName?> | New Treatment</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Dispensary </span>
</li>
<li class="active">
<span> New Treatment</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<div class="row margin-top-30">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h5 class="panel-title">New Treatment</h5>
</div>
<div class="panel-body">
<form role="form" name="" method="post">



<?php 
//  echo $_SESSION['id'];
	$disId =  $_SESSION['id'];

    $ret=mysqli_query($con,"SELECT * FROM tbl_dispensary WHERE dispensary_id='$disId' ");
    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
    $disName = $num['dispensary_name'];
	echo $disName;
    }
?>


<!-- patient name -->
<div class="form-group">
<label for="doctorname">
Patient Name
</label>
<input type="text" name="patname" class="form-control"  placeholder="Enter Patient Name" required="true">
</div>


<!-- patient nic -->

<div class="form-group">
<label for="fess">
Patient Nic
</label>
<input type="tel" id="patnic" name="patnic" class="form-control"  placeholder="Enter Patient NIC" required="true" onBlur="userAvailabilityNic()">
<span id="user-availability-status2" style="font-size:12px;"></span>
</div> 

<!-- patient contact num -->

<div class="form-group">
<label for="fess">
Patient Contact
</label>
<input type="text" id="patcontact" name="patcontact" class="form-control"  placeholder="Enter Patient Contact no" required="true" maxlength="10" pattern="[0-9]+" onBlur="userAvailabilityContact()">
<span id="user-availability-status3" style="font-size:12px;"></span>
</div> 


<!-- patient email -->

<div class="form-group">
<label for="fess">
Patient Email
</label>
<input type="email" id="patemail" name="patemail" class="form-control"  placeholder="Enter Patient Email id" required="true" onBlur="userAvailability()">
<span id="user-availability-status1" style="font-size:12px;"></span>
</div>

<!-- patient gender -->

<div class="form-group">
<label class="block">
Gender
</label>
<div class="clip-radio radio-primary">
<input type="radio" id="rg-female" name="gender" value="female" >
<label for="rg-female">
Female
</label>
<input type="radio" id="rg-male" name="gender" value="male">
<label for="rg-male">
Male
</label>
</div>
</div>




<!-- patient address -->
<div class="form-group">
<label for="address">
Patient Address
</label>
<textarea name="pataddress" class="form-control"  placeholder="Enter Patient Address" required="true"></textarea>
</div>

<!-- patient age -->

<div class="form-group">
<label for="fess">
 Patient Age
</label>
<input type="text" name="patage" class="form-control"  placeholder="Enter Patient Age" required="true">
</div>
<div class="form-group">
<label for="fess">
 Medical History
</label>
<textarea type="text" name="medhis" class="form-control"  placeholder="Enter Patient Medical Remarks" required="true"></textarea>
</div>	

<!-- the medicines -->
<div class="form-group">
<label for="fess">
 Medicine List
</label>
<textarea type="text" name="medhis" class="form-control"  placeholder="Enter the medicines (if any)" required="true"></textarea>
</div>	


<!-- button for submision -->
<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
Create Treatment
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
