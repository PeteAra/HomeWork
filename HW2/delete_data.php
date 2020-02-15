<?php
//Database Connection
$con=mysqli_connect("localhost","root","","Sindhu");

$id=$_GET['id']; //Retrieve the id to be deleted

//Retrieve the data from the database table
$query=mysqli_query($con,"SELECT * FROM upload WHERE id='$id'");
$imageFile=mysqli_fetch_assoc($query);

//First delete the image from directory
unlink("upload/" .$imageFile['filename']);

//Next, delete the data from the database
mysqli_query($con,"DELETE FROM upload WHERE id='$id'");
mysqli_close($con); //Close database connection

header("location: suadminhome.php");
?>