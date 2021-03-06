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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="homestyle.css">
  </head>
  <body>
    <?php
    //Database Connection
    $con=mysqli_connect("localhost","root","","Sindhu");

    // Retrieve the data from the database table
    $query=mysqli_query($con,"SELECT * FROM upload");

    /* mysqli_fetch_assoc() fetches a result row as an associative array */
    $get_pic=mysqli_fetch_assoc($query); 
    ?>
    <?php include('nav.php'); ?> 
    <div class="container">
      <h2>User Images</h2>
      <p>This table displayes the image files stored in the database.</p>    
      <div class="btn1"><a href="form_upload.php"><button type="button" class="btn btn-default">Add new Image</button></a></div>  
      
      <form id="srch" action="search.php" method="GET"> 
        <div class="row">
          <div class="col-xs-6 col-md-4">
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Search" id="txtSearch"/>
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit" name="search">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <br>
      <br>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Image Name</th>
            <th scope="col">Image</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
         <?php include ('DBconfig.php');
          $result = $db->prepare("SELECT * FROM upload ORDER BY id DESC");
          $result->execute();
          for($i=0; $row = $result->fetch(); $i++)
          { ?>
          <tr>
            <td class="table-active"><?php echo ($row['iname']); ?></td>
            <td class="table-active"><?php echo '<img src="upload/'.$row['filename'].'
            ">'; ?></td>
            <td class="table-active"><a href="edit_data.php?id=<?php echo $row['id']; ?>" class="btn btn-warning"> edit </a>&nbsp;
             &nbsp;<a href="delete_data.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"> delete </a></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>  
</html>
<?php include('footer.php'); ?>

