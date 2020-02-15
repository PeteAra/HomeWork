<?php
if(isset($_REQUEST['submit']))
{
    // require "edit_data.php"; //display edit_data.php HTML elements
    $con=mysqli_connect("localhost","root","","Sindhu");
    
    $id=$_GET['id']; //get the id of the row to be edited
    
    //check connection
    if (mysqli_connect_errno()) //returns the error code
    {
        //return the last error description
        echo "Failed to connect to MySQL: " .mysqli_connect_error();
    }   
}


/* IMAGE NAME PART */

/* Image Name: Should be either same name or enter new name
                But should not be empty */
if(empty($_REQUEST['iname']))
{
    echo "Image name required";
}

else
{
    $iname = $_REQUEST['iname'];
    mysqli_query($con,"UPDATE amalan SET iname='$iname' WHERE id='$id'");
    header("Location:view_data.php");
}

/* FILE PART */
/* Updating new image file is not REQUIRED.
However, if upload a new image file, it should be validated */

/* If auto-global $_FILES is TRUE: i.e. have some data, it shows that a new file has been uploaded */
if($_FILES)
{
    $file=$_FILES["file"]["name"];
    $size=$_FILES["file"]["size"];
    
/* File Validation */    
//Checking the file size. Maximum allowed size: 500,000 bytes (500kb)
if($size >500000)
{echo "Image size must not be greater than 500kb"; }

    
    
/* Few preparations for checking the file type (extension) */
//Store the allowed extensions in an array
    $allowedExts = array("gif","jpeg","jpg","png");
    
/* using explode() function, separate the 'File Name' and its 'Extension' into individual elements of an array: $temp */
    $temp = explode(".", $_FILES["file"]["name"]);
    
    /* The end() function returns the last element of an array. As per array $temp, First element: File Name
                        Last element: Extension */
    $extension = end($temp);
    
    
    
   /* Checking the File Type (extension) */
    if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/x-png")
    || ($_FILES["file"]["type"] == "image/txt")
    || ($_FILES["file"]["size"] == "image/png"))
    && ($_FILES["file"]["type"] <= 500000)
    && in_array($extension, $allowedExts)) 
/* The in_array() searches for a specific value in an array. Here, searches for $extension value in $allowedExts array */
    
    {
// Checks if there are any errors
if ($_FILES["file"]["error"] > 0)
{
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
}                                   
//Checks if the specific file already exists in the directory
elseif(file_exists("upload/" . $_FILES["file"]["name"]))
{
    echo $_FILES["file"]["name"] . " already exists. ";
}
else
/* On passing all validations:
1. Delete the old image file in the directory
2. Move the new file from temporary location to the directory
3. Update the database

To delete an existing image,
first retreive its file name from database based on 'id' */
$query = mysqli_query($con,"SELECT filename FROM amalan WHERE id='$id'");
        
/* mysqli_fetch_assoc() fetches a result row as an associative array */
$imageFile = mysqli_fetch_assoc($query);
        
//The unlink(file name) function deletes the file
unlink("upload/" .$imageFile['filename']);

/* moves an uploaded file to a new location */
move_uploaded_file($_FILES["file"]["tmp_name"],
                              "upload/" . $_FILES["file"]["name"] );
        
//Insert the 'Image name' and 'file name' to the database
mysqli_query($con,"UPDATE amalan SET filename = '$file' WHERE id='$id'");
header("Location:view_data.php");
    }
mysqli_close($con); //Close the database connection
}?>




























