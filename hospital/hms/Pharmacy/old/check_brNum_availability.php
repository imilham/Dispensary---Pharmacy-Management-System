<?php 
require_once("include/connect.php");

// validating the br number in dispensary add data
if(!empty($_POST["brnum"])) {
	$br= $_POST["brnum"];
	
		$result =mysqli_query($con,"SELECT dispensary_brNum FROM tbl_dispensary WHERE dispensary_brNum='7485'");
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



?>
