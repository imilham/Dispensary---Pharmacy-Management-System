<?php 
require_once("hms/include/connect.php");
if(!empty($_POST["email"])) {
	$email= $_POST["email"];
	
		$result =mysqli_query($con,"SELECT user_email FROM tbl_userlogins WHERE user_email='$email'");
		$count=mysqli_num_rows($result);
	if($count>0)
	{
		echo "<span style='color:red'> Email already exists .</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} 
	else{
		
		echo "<span style='color:green'> Email available for Registration .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
else if(!empty($_POST["userName"])) {
	$un= $_POST["userName"];
	
		$result =mysqli_query($con,"SELECT user_name FROM tbl_userlogins WHERE user_name='$un'");
		$count=mysqli_num_rows($result);
	if($count>0)
	{
		echo "<span style='color:red'> Username already exists .</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} 
	else{
		
		echo "<span style='color:green'> Username available for Registration .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
// validating the br number in dispensary add data
else if(!empty($_POST["brNum"])) {
	$br= $_POST["brNum"];
	
		$result =mysqli_query($con,"SELECT dispensary_brNum FROM tbl_dispensary WHERE dispensary_brNum='$br'");
		$count=mysqli_num_rows($result);
	if($count>0)
	{
		echo "<span style='color:red'> Dispensary has been registered with this BR Num.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	} 
	else{
		
		echo "<span style='color:green'> Dispensary number is valid for registration .</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
else if(!empty($_POST["doctorNic"])) {
	$br= $_POST["doctorNic"];
	
	$result = mysqli_query($con, "SELECT doctor_nic FROM tbl_doctor WHERE doctor_nic = '$doctorNic'");
		$count=mysqli_num_rows($result);
	if ($count >= 0) {
		echo "<span style='color:red'>Doctor with this NIC already been registered.</span>";
		echo "<script>$('#submit').prop('disabled', true);</script>";
	} else {
		echo "<span style='color:green'>NIC available for Registration.</span>";
		echo "<script>$('#submit').prop('disabled', false);</script>";
	}
}



?>
