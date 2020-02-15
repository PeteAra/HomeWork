<?php 
require 'DBconfig.php';
session_start();

if(isset($_POST['username']))
{	$username = $_POST['username'];	}

if(isset($_POST['password']))
{	$password = $_POST['password'];
	$md5_pass = md5($password);
}

$q = 'SELECT * FROM login WHERE username=:username AND password=:password';
$query = $db->prepare($q);
$query->execute(array(':username' => $username, ':password' => $md5_pass));

if($query->rowCount() == 0)
	{
		header('Location: index.php?err=1');	
	}
else
	
{
	$row = $query->fetch(PDO::FETCH_ASSOC);

	$_SESSION['sess_user_id'] = $row['id'];
	$_SESSION['sess_username'] = $row['username'];
	$_SESSION['sess_userrole'] = $row['role'];

	if($_SESSION['sess_userrole'] == "suadmin")
	{
		header('Location: suadminhome.php');
	}

	elseif($_SESSION['sess_userrole'] == "admin")
	{
		header('Location: adminhome.php');
	}

	else
	{
		header('Location: userhome.php');
	}
}
?>