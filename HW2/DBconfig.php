<?php

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$database = 'Sindhu';

$db = new PDO('mysql:host='.$host.';
					dbname='.$database, $user, $pass);

if(!$db)
{
	echo "unable to connect to database";
}

?>