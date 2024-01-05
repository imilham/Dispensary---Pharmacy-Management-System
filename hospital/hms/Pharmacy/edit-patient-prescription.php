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
		$disName = $_GET['disName'];
		// if(isset($_POST['submit']))
		// {
			//$docspecialization=$_POST['doctorspecilization'];
			//$appdate = $_POST['adate'];
			// $sql=mysqli_query($con,"update tblmedicalhistory set issue_status='Issued' where ID='$id'  ");
			
			$sqlRead = mysqli_query($con,"UPDATE tblmedicalhistory SET issue_status='Issued', issued_pharmacy = '$disName' WHERE ID='$id'");
			// $sql = mysqli_query($con, "UPDATE tblmedicalhistory SET issue_status='Issued', issued_pharmacy = '$disName' WHERE ID='$id'");

			
			
			if ($sqlRead->num_rows > 0) {
				$row = $sqlRead->fetch_assoc();
				$columnValue = $row["dispensary_name"];
				$_SESSION['msg']=" $columnValue  Medicine Issued !!";
				
			  } 

			  header('location:dashboard.php');
		

		// }
	} 

?>

