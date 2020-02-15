<?php
$admin_pass = "admin1";
$ADMIN = md5($admin_pass);

$su_admin_pass = "suadmin1";
$SU_ADMIN = md5($su_admin_pass);

$user_pass = "user1";
$USER = md5($user_pass);

echo "ADMIN<br/>Actual password: ",$admin_pass,
		"<br/>MD5 password:",$ADMIN,"<br/><br/>";


echo "SUPER ADMIN<br/>Actual password: ",$su_admin_pass,
		"<br/>MD5 password:",$SU_ADMIN,"<br/><br/>";

echo "ADMIN<br/>Actual password: ",$user_pass,
		"<br/>MD5 password:",$USER,"<br/><br/>";
?>