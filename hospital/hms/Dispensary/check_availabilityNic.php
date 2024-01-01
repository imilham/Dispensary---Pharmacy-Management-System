<?php 
require_once("include/config.php");
if(!empty($_POST["nic"])) {
	$nic= $_POST["nic"];
$result =mysqli_query($con,"SELECT patient_nic FROM tbl_patient WHERE patient_nic='$nic'");
$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> National Identity number already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> National Identity number available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
