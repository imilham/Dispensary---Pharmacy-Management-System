<?php 
require_once("include/config.php");
if(!empty($_POST["contact"])) {
	$contactNum= $_POST["contact"];
$result =mysqli_query($con,"SELECT patient_contact FROM tbl_patient WHERE patient_contact='$contactNum'");
$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Contact number already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Contact number available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
