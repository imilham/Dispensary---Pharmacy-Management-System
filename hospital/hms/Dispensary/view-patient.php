<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

    ?>
    
    
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
	// echo $disName;
    }

if(isset($_POST['submit']))
  {
    
    $vid=$_GET['viewid'];
    $bp=$_POST['bp'];
    $bs=$_POST['bs'];
    $weight=$_POST['weight'];
    $temp=$_POST['temp'];
   $pres=$_POST['pres'];
   $issuedDis = $disName;
   
 
      $query.=mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres,issued_dispensary,issue_status)value('$vid','$bp','$bs','$weight','$temp','$pres','$issuedDis','Pending')");
    if ($query) {
    echo '<script>alert("Medicle history has been added.")</script>';
    //  echo "<script>window.location.href ='view-patient.php'</script>";
    echo "<script>window.location.href ='view-patient.php?vid=$vid&disname=$disName'</script>";

    // ?editid=<?php echo $row['patient_id'];
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
		<title>Doctor | Manage Patients</title>
		
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
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->

            <?php 
	$disId =  $_SESSION['id'];
    $ret=mysqli_query($con,"SELECT * FROM tbl_dispensary WHERE dispensary_id='$disId' ");
    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
    $disName = $num['dispensary_name'];
    $status=1;
	// echo $disName;
    }
?>


<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle"><?php echo $disName ?> | Manage Patients</h1>
</div>
<ol class="breadcrumb">
<li>
<span><?php echo $disName ?></span>
</li>
<li class="active">
<span>Manage Patients</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>
<?php
                               $vid=$_GET['viewid'];
                               $ret=mysqli_query($con,"select * from tbl_patient where dispensary='$disName' && patient_id = '$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
                               ?>
<table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Patient Details</td></tr>

    <tr>
    <th scope>Patient Name</th>
    <td><?php  echo $row['patient_name'];?></td>
    <th scope>Patient Email</th>
    <td><?php  echo $row['patient_email'];?></td>
  </tr>
  <tr>
    <th scope>Patient Mobile Number</th>
    <td><?php  echo $row['patient_contact'];?></td>
    <th>Patient Address</th>
    <td><?php  echo $row['patient_address'];?></td>
  </tr>
    <tr>
    <th>Patient Gender</th>
    <td><?php  echo $row['patient_gender'];?></td>
    <th>Patient Age</th>
    <td><?php  echo $row['patient_age'];?></td>
  </tr>
  <tr>
    
    <th>Patient NIC</th>
    <td><?php  echo $row['patient_nic'];?></td>
     <th>Patient Reg Date</th>
    <td><?php  echo $row['CreationDate'];?></td>
  </tr>
 
<?php }?>
</table>
<?php  

$ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid'");



 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="8" >Medical History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Blood Pressure</th>
<th>Weight</th>
<th>Blood Sugar</th>
<th>Body Temprature</th>
<th>Medical Prescription</th>
<th>Presciption Issued Dispensary | Visit Date</th>
<th>Medicine issued</th>

</tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['BloodPressure'];?></td>
 <td><?php  echo $row['Weight'];?></td>
 <td><?php  echo $row['BloodSugar'];?></td> 
  <td><?php  echo $row['Temperature'];?></td>
  <td><?php  echo $row['MedicalPres'];?></td>



  <!-- <td>  <button class="" data-toggle="modal" data-target="#myModals">Add Medical History</button></p>  
<a href="#myModals=<?php echo $row['ID'];?>"><i class="fa fa-eye"></i></a>    </td> -->

<!-- 

<td>
    <button class="" data-toggle="modal" data-target="#myModals" onclick="setMedicalHistoryID(<?php echo $row['ID']; ?>)">Add Medical History</button>
</td>
 -->






  <td> <?php echo $row['issued_dispensary'] ?> | <?php  echo $row['CreationDate'];?></td> 
  <td><?php  echo $row['issue_status'];?></td> 

</tr>
<?php $cnt=$cnt+1;} ?>
</table>

<p align="center">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button></p>  

<?php  ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Medical History</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
   <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit">

      <tr>
    <th>Blood Pressure :</th>
    <td>
    <input name="bp" placeholder="Blood Pressure" class="form-control wd-450" required="true"></td>
  </tr>                          
     <tr>
    <th>Blood Sugar :</th>
    <td>
    <input name="bs" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
  </tr> 
  <tr>
    <th>Weight :</th>
    <td>
    <input name="weight" placeholder="Weight" class="form-control wd-450" required="true"></td>
  </tr>
  <tr>
    <th>Body Temprature :</th>
    <td>
    <input name="temp" placeholder="Blood Sugar" class="form-control wd-450" required="true"></td>
  </tr>
                         
     <tr>
    <th>Prescription :</th>
    <td>
    <textarea name="pres" placeholder="Medical Prescription" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>  
   
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  
  </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<!-- ///////////////////////////////////////////////////////////////////////////////// -->
<!-- <br><br>

<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Medical Prescriptions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" name="submit">
                    <!-- Add a hidden input field to hold the value of $row['ID'] -->
                    <!-- <input type="hidden" name="patientID" id="patientID" value="">
                    <table class="table table-bordered table-hover data-tables">
                        <tr>
                            <th>Prescription :</th>
                            <td>
                                <textarea name="pres" placeholder="Medical Prescription" rows="12" cols="14"
                                    class="form-control wd-450" required="true"></textarea>
                            </td>
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div> --> -->



<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
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





<script>
    function setMedicalHistoryID(id) {
        // Set the value of the ID in the modal input field or perform any other action you need
        document.getElementById('medicalHistoryID').value = id;

        // Open the modal
        $('#myModals').modal('show');
    }
</script>

<script>
    function setMedicalHistoryID(id) {
        // Set the value of $row['ID'] in the hidden input field
        document.getElementById('patientID').value = id;

        // Open the modal
        $('#myModals').modal('show');
    }
</script>


		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php }  ?>
