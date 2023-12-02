<?php
session_start();
error_reporting(0);
include('include/connect.php');
	if(strlen($_SESSION['id']==0)) {
	header('location:logout.php');
	} 
	else
	{
		$id=intval($_GET['id']);// get value
		// if(isset($_POST['submit']))
		// {
			//$docspecialization=$_POST['doctorspecilization'];
			//$appdate = $_POST['adate'];
			$sql=mysqli_query($con,"update tbl_dispensary set status='Approved',dispensary_app = current_date() where dispensary_id='$id'  ");
			
			$sqlRead = mysqli_query($con,"select dispensary_name from tbl_dispensary where dispensary_id = '$id'");
			
			
			
			if ($sqlRead->num_rows > 0) {
				$row = $sqlRead->fetch_assoc();
				$columnValue = $row["dispensary_name"];
				$_SESSION['msg']=" $columnValue  Dispensary is Approved !!";
				
			  } 

			  header('location:pending-dispensaries.php');
		

		// }
	} 

?>

