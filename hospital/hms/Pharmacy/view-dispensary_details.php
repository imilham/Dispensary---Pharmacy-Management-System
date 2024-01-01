<?php
session_start();
error_reporting(0);
include('include/connect.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    
    $vid=$_GET['viewid'];
    $bp=$_POST['bp'];
    $bs=$_POST['bs'];
    $weight=$_POST['weight'];
    $temp=$_POST['temp'];
   $pres=$_POST['pres'];
   
 
      $query.=mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
    if ($query) {
    echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | View Dispensary</title>
		
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
	</head>
	<body>
		<div id="app">		
<?php include('include/pharmacy-sidebar.php');?>




<?php 
	$disId =  $_SESSION['id'];
	$rets=mysqli_query($con,"SELECT * FROM tbl_pharmacy WHERE pharmacy_id='$disId' ");
    $ret=mysqli_query($con,"select tbl_userlogins.* , tbl_pharmacy.* from tbl_userlogins
	INNER JOIN tbl_pharmacy
	on tbl_userlogins.user_id = tbl_pharmacy.user_id
	WHERE tbl_pharmacy.user_id = '$disId' ");


    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
    $disName = $num['pharmacy_name'];
	
    $status=1;
	echo $disName;
    }
?>




<div class="app-content">
<?php include('include/header.php');?>
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle"> <?php echo $disName ?> | View Pharmacy</h1>
</div>
<ol class="breadcrumb">
<li>
<span> <?php echo $disName ?></span>
</li>
<li class="active">
<span>View Pharmacy</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">View <span class="text-bold">Pharmacy</span></h5>





<?php
    $vid=$_GET['viewid'];

	// id to view the pharmacy details

	$pharmacyId = $_SESSION['id'];






    $ret=mysqli_query($con,"select * from tbl_pharmacy where pharmacy_id = '$vid'");
	//"SELECT tbl_dispensary.dispensary_name, tbl_dispensary.dispensary_incharge, tbl_dispensary.status, tbl_dispensary.dispensary_brNum,tbl_dispensary.dispensary_location, tbl_dispensary.dispensary_reg, tbl_dispensary.dispensary_app, tbl_dispensary_contact.dispensary_contact, tbl_dispensary_contact.dispensary_email from tbl_dispensary inner join tbl_dispensary_contact on tbl_dispensary.dispensary_id = tbl_dispensary_contact.dispensary_id where tbl_dispensary.dispensary_id = '$vid'" );
    
	$ret1=mysqli_query($con,"SELECT tbl_dispensary.dispensary_name, tbl_dispensary.dispensary_incharge, tbl_dispensary.status, tbl_dispensary.dispensary_brNum,tbl_dispensary.dispensary_location, tbl_dispensary.dispensary_reg, tbl_dispensary.dispensary_app, tbl_dispensary_contact.dispensary_contact, tbl_dispensary_contact.dispensary_email from tbl_dispensary inner join tbl_dispensary_contact on tbl_dispensary.dispensary_id = tbl_dispensary_contact.dispensary_id where tbl_dispensary.dispensary_id = '$vid'" );

	// tbl_dispensary.dispensary_name, tbl_dispensary.dispensary_incharge, tbl_dispensary.status, tbl_dispensary.dispensary_location, tbl_dispensary.dispensary_reg, tbl_dispensary.dispensary_app, tbl_dispensary_contact.dispensary_contact, tbl_dispensary_contact.dispensary_email from tbl_dispensary INNER join tbl_dispensary_contact on tbl_dispensary.dispensary_id = tbl_dispensary_contact.dispensary_id 


$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
                               ?>
	<table border="1" class="table table-bordered">
	<tr align="center">
	<td colspan="4" style="font-size:20px;color:blue">
	Pharmacy Details</td></tr>

		<tr>
		<th scope>Pharmacy Name</th>
		<td><?php  echo $row['pharmacy_name'];?></td>
		<th scope>Pharmacy Incharge</th>
		<td><?php  echo $row['pharmacy_incharge'];?></td>
	</tr>
	<tr>
		<th scope>Pharmacy Contact Number</th>
		<td><?php  echo $row['pharmacy_tp'];?></td>
		<th>Pharmacy Email</th>
		<td><?php  echo $row['pharmacy_email'];?></td>
	</tr>
		<tr>
		<th>Pharmacy Location</th>
		<td><?php  echo $row['pharmacy_location'];?></td>
		<th>Pharmacy Status</th>
		<td><?php  echo $row['pharmacy_status'];?></td>
	</tr>
	<tr>
		
		<th>Pharmacy Registration Number</th>
		<td><?php  echo $row['pharmacy_brNum'];?></td>
		<th>Pharmacy Approved Date</th>
		<td><?php  echo $row['pharmacy_app'];?></td>
	</tr>

	
 
	<?php 
	}
	
	

?>
</table>
<?php  

$ret=mysqli_query($con,"select tbl_doctor.* from tbl_doctor
INNER JOIN tbl_dispensary_doctor
on tbl_doctor.doctor_id = tbl_dispensary_doctor.doctor_id where tbl_dispensary_doctor.dispensary_id ='$vid'");



 ?>
























<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="8" >List of Prescriptions issued</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Doctor Name</th>
<th>Doctor Speciality</th>
<th>Doctor Contact</th>
<th>Doctor Email</th>
<th>Doctor DOB</th>
<!-- <th>Visit Date</th> -->
</tr>
<?php  

while ($row=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['doctor_name'];?></td>
 <td><?php  echo $row['doctor_speciality'];?></td>
 <td><?php  echo $row['doctor_tp'];?></td> 
  <td><?php  echo $row['doctor_email'];?></td>
  <td><?php  echo $row['doctor_dob'];?></td>
  <!-- <td><?php  echo $row['dispensary_id'];?></td>  -->
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
                          
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
