<?php
include('connect_members.php');
$sql = "INSERT INTO users_information (userid,username,mail_address) VALUES ('fuckyou','yourmother','asfrgrwhh')";
echo($sql);
if(mysqli_query($link,$sql)){
	echo ('fuckyear@@');
}else{
	echo("fuckyou");
}
mysqli_close($link);
?>