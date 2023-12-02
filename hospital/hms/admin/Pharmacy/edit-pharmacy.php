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
			$sql=mysqli_query($con,"update tbl_pharmacy set pharmacy_status='Approved',pharmacy_app = current_date() where pharmacy_id='$id'  ");
			
			$sqlRead = mysqli_query($con,"select pharmacy_name from tbl_pharmacy where pharmacy_id= '$id'");
			
			
			
			if ($sqlRead->num_rows > 0) {
				$row = $sqlRead->fetch_assoc();
				$columnValue = $row["pharmacy_name"];
				$_SESSION['msg']=" $columnValue  Pharmacy is Approved !!";
				
			  } 

			  header('location:pending-pharmacies.php');
		

		// }
	} 

?>

