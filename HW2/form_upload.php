<?php
session_start();
$role = $_SESSION['sess_userrole'];

if(!isset($_SESSION['sess_username']) && $role!="suadmin")
{
  header('Location: index.php?err=2');
}
?>
<!DOCTYPE html>
<!-- HTML entities for Page Display -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Role Based Login System</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="homestyle.css">
</head>
    
<body>
    <?php include('nav.php'); ?>
    <div id="container"><div class="content">
        <form action="form_upload.php" method="post" enctype="multipart/form-data">
            <h2 class="uploadtitle">Data Entry</h2>
                <fieldset>
                    <!-- Changed table width below from 350 to 370 -->
                    <table width="370" border="0" align="center">
                        <legend>
                            <tr>
                                <td>
                                    <label for="file">Image Name:<span class="required"></span></label>
                                </td>
                                <td align="center">

								    <input type="text" class="form-control" name="iname" placeholder="Image Name">
                                    <br>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td><label for="file">Upload Picture:</label>
                                </td>&nbsp;
                                <td align="right"><input type="file" name="file" id="file"><br>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp; </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><button type="submit" name="submit" class="btn btn-success">Submit</a></button><br><br> 
                                    <button class="btn btn-default"><a href="suadminhome.php">Go back to Home</a></button></td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;  </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <?php
                                if(isset($_REQUEST['submit']))
                                {
                                    // open a new connection to the MySQL Server
                                    $con=mysqli_connect("localhost","root","","Sindhu");
                                    
                                    //Check connection
                                    if (mysqli_connect_errno()) //returns the error code
                                    {
                                        //return the last error description
                                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                    }
                                    
                                    $iname=$_POST['iname'];
                                    $file=$_FILES["file"]["name"];
                                    $size=$_FILES["file"]["size"];
                                    
                                    
                                    
                                    //Checking if 'image name' entered and 'File attachment' has been done.
                                    if(empty($iname) || empty($file))
                                    {
                                        echo "<label class='err'>All fields are required</label>";
                                    }
                                    
                                    //Checking file size
                                    elseif($size >50000)
                                    {
                                        echo "<label class='err'> Image size must not be greater than 500kb </label>"; }
                                    /* -- Few preparations for checking the file type (extension) --*/
                                    
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
                                /* If file is allowed extension type, then further validations for files are processed */
                                                                    

                                        

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
                                                
                                        /* On passing all validations, the file is moved from temporary location to the directory */

                                        else
                                        {
                                            /* The move_uploaded_file() function moves an uploaded file to a new location */
                                                 
                                                    move_uploaded_file($_FILES["file"]["tmp_name"],
                                                                      "upload/" . $_FILES["file"]["name"] );
                                                    //Insert the 'Image name' and 'file name' to the database
                                                    mysqli_query($con,"INSERT INTO upload (iname, filename)
                                                                                    VALUES ('$iname','$file')");
                                                    echo "Data Entered Successfully Saved!";
                                        }
                                    }                                                  
                                mysqli_close($con); //Close the database connection
                                } ?>
                                </td>
                            </tr>
                        </legend>
                    </table>
                </fieldset>
            </form>
        </div>
    </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
    <?php include('footer.php');


     ?>


