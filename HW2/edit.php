<?php
session_start();?>

<?php
// Configuration
include('DBconfig.php');

// New Data
$id = $_POST['id'];
$iname = $_POST['iname'];
$filename = $_POST['filename'];
#$id = $_POST['memids'];

// Query
$sql = "UPDATE image
        SET iname=?, filename=?
        WHERE id=?";
        // ? represents "Parameterized Query"

$q = $db->prepare($sql);
$q->execute(array($iname,$filename,$id));
#header("location: index.php"); ?>