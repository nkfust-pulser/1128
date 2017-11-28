<?php
session_start();
if(empty($_SESSION['login_userid'])){
  header('Location:login.php');
  exit(); 
}
require_once("connect_members.php");
$userid = $user_real_name = $user_mail_address = $user_sex = $user_phone = $user_height = $user_weight = "";
$userid = $_SESSION['login_userid'];
$sql = "SELECT userid, username, mail_address, user_sex, user_phone, user_height, user_weight FROM users_information where userid = ?";
if($stmt = mysqli_prepare($link, $sql)){
	mysqli_stmt_bind_param($stmt, 's', $param_userid);
	$param_userid = $userid;
	if(mysqli_stmt_execute($stmt)){
		mysqli_stmt_store_result($stmt);
		if(mysqli_stmt_num_rows($stmt) == 1){
			mysqli_stmt_bind_result($stmt,$userid,$user_real_name,$user_mail_address,$user_sex,$user_phone,$user_height,$user_weight);
			if(mysqli_stmt_fetch($stmt)){
				$_SESSION['userid'] = $userid;
				$_SESSION['user_real_name'] = $user_real_name;
				$_SESSION['user_mail_address'] = $user_mail_address;
				$_SESSION['user_sex'] = $user_sex;
				$_SESSION['user_phone'] = $user_phone;
				$_SESSION['user_height'] = $user_height;
				$_SESSION['user_weight'] = $user_weight;
				header("Location:profile.php");
 			}
		}
	}
	echo("不知道哪裡出錯了...抱歉請重新登入");
}
mysqli_stmt_close($stmt);

?>