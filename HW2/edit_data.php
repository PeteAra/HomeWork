<?php
session_start();
$role = $_SESSION['sess_userrole'];

if(!isset($_SESSION['sess_username']) && $role!="admin")
{
  header('Location: index.php?err=2');
}
?>

<html>
<link rel="stylesheet" href="style.css" type="text/css">
<style type="text/css"></style>
<link rel="stylesheet" type="text/css" href="homestyle.css">
<body>
<?php
// open a new connection to the MySQL Server
$con=mysqli_connect("localhost","root","","Sindhu");
    
//Get the id of the row to be edited
$id=$_GET['id'];

//Retreive the data from the database table
$query=mysqli_query($con,"SELECT * FROM upload WHERE id=$id");
    
/* mysqli_fetch_assoc() fetches a result row as an associative array  */   
for($i=0; $get_data=mysqli_fetch_assoc($query); $i++)
{ ?>
<?php include('nav.php'); ?>
    <div id="container">
        <div class="content">
            <form action="update_submit.php?id=<?php echo $get_data['id']; ?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <table width="420" border="0" align="center">
                        <legend>
                            <h1 class="UpD">UPDATE DATA</h1>
                            <tr>
                                <td>Current Image Name:</td>
                                <td width="229">
                                    <input type="text" name="iname" value="<?php echo $get_data['iname']; ?>" /><br /></td>
                            </tr>

                            <tr>
                                <td colspan="2"><br><br>Current Image</td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <img src="upload/<?php echo $get_data['filename']; ?>" width="350"></td>
                            </tr>

                            <tr>
                                <td><br>Replace with new Image:</td>
                                <td align="right"><br><input type="file" name="file" id="file"><br></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><button type="submit" name="submit" class="btn btn-success">Submit</a></button>
                                </td>

                                    <?php } mysqli_close($con); ?>
                            </tr>
                                <button class="btn btn-default" id="gohome"><a href="suadminhome.php">Go back to Home</a></button>
                        </legend>
                    </table>


                </fieldset>
            </form>

        </div>
    </div>
    }

</body>

</html>
