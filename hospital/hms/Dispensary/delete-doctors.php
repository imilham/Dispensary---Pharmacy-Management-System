<?php
session_start();
error_reporting(0);
include('include/connect.php');
$dispensaryId = $_SESSION['id'];
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

if(isset($_POST['submit']))
{
$doctorspecilization=$_POST['doctorspecilization'];
$sql=mysqli_query($con,"insert into tbl_dispensary(status) values('$doctorspecilization')");
$_SESSION['msg']="Doctor Specialization added successfully !!";
}
//Code Deletion
if(isset($_GET['del']))
{
	$sid=$_GET['id'];
	$sid = $_GET['dispensary_id'];
    $doc_id = $_GET['doctor_id'];
	// mysqli_query($con,"update tbl_dispensary set status = 'Rejected' where dispensary_id = '$sid'");
	 mysqli_query($con,"Delete from tbl_dispensary_doctor where dispensary_id = '$sid' and doctor_id = '$doc_id'");


	$sqlRead = mysqli_query($con,"select doctor_name from tbl_doctor where doctor_id = '$doc_id'");
	if ($sqlRead->num_rows > 0) {
		$row = $sqlRead->fetch_assoc();
		$columnValue = $row["doctor_name"];


	  }

		$_SESSION['msg']=" $columnValue is Removed Successfully !!";

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dispensary | Remove Doctors</title>

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

				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle"><?php echo $disName?> | Remove Doctors</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span><?php echo $disName?></span>
									</li>
									<li class="active">
										<span>Remove Doctors</span>
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
										<div class="col-lg-6 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Remove Doctors</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>
													<form role="form" name="dcotorspcl" method="post" >
														<div class="form-group">
															<label for="exampleInputEmail1">
																<!-- Approval status -->
															</label>
							<!-- <input type="text" name="doctorspecilization" class="form-control"  placeholder="Enter the status"> -->
														</div>




														<!-- <button type="submit" name="submit" class="btn btn-o btn-primary">
															Submit
														</button> -->
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

									<div class="row">





								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Dispensary status</span></h5>

									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th>NIC</th>
												<th>Doctor Name</th>
												<th>Contact</th>
												<th>Email</th>
												<th>Speciality</th>
												<th>Gender</th>




												<th>Remove Doctor</th>

											</tr>
										</thead>
										<tbody>


										<?php
	//$query=mysqli_query($con,"select dispensary_contact from tbl_dispensary_contact where dispensary_id = 1)");





$sql=mysqli_query($con,"SELECT tbl_doctor.*, tbl_dispensary_doctor.*
FROM tbl_doctor
INNER JOIN tbl_dispensary_doctor ON tbl_doctor.doctor_id = tbl_dispensary_doctor.doctor_id
WHERE tbl_dispensary_doctor.dispensary_id = '$dispensaryId';
");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{


?>


											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['doctor_nic'];?></td>
												<td><?php echo $row['doctor_name'];?></td>
												<td><?php echo $row['doctor_tp'];?></td>
												<td><?php echo $row['doctor_email'];?>
												<td id="dis_con"><?php echo $row['doctor_speciality'];?>
												<td><?php echo $row['doctor_gender'];?>

												</td>

												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							<!-- <a href="edit-dispensary.php?id=<?php echo $row['dispensary_id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-check">   Approve</i></a> -->

	<!-- <a href="delete-doctors.php?id=<?php echo $row['dispensary_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"> Remove Doctor</i></a> -->


	<a href="delete-doctors.php?dispensary_id=<?php echo $row['dispensary_id']?>&doctor_id=<?php echo $row['doctor_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove">
    <i class="fa fa-times fa fa-white"> Remove Doctor</i>
</a>

												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<!-- <ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a href="#">
																	Edit
																</a>
															</li>
															<li>
																<a href="#">
																	Share
																</a>
															</li>
															<li>
																<a href="#">
																	Remove
																</a>
															</li>
														</ul> -->
													</div>
												</div></td>
											</tr>

											<?php
$cnt=$cnt+1;
}

// $sqltp=mysqli_query($con,"SELECT SELECT tbl_dispensary.*, tbl_dispensary_contact.* from tbl_dispensary inner JOIN tbl_dispensary_contact on tbl_dispensary.dispensary_id = tbl_dispensary_contact.dispensary_id where status = 'Pending' or status ='pending';");
// while($row=mysqli_fetch_array($sqltp))
// {
// 	$n = $row['dispensary_contact'];
// ?>
// 	<script>
// 			document.getElementById("dis_con").innerHTML = "hh";
// 	</script>
// <?php

// 	$cnt=$cnt+1;
// }




?>










										</tbody>
									</table>
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
