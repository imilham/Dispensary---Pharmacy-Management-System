<?php
require_once("../include/connect.php");

if (!empty($_POST["doctorNic"])) {
	$doctorNic = $_POST["doctorNic"];
	$result = mysqli_query($con, "SELECT doctor_nic FROM tbl_doctor WHERE doctor_nic = '$doctorNic'");
	$count = mysqli_num_rows($result);
	echo $doctorNic;

	if ($count > 0) {
		echo "<span style='color:red'>Doctor with this NIC already been registered.</span>";
		echo "<script>$('#submit').prop('disabled', true);</script>";
	} else {
		echo "<span style='color:green'>NIC available for Registration.</span>";
		echo "<script>$('#submit').prop('disabled', false);</script>";
	}
}
?>
