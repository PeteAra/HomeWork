<?php
    session_start();
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
    <script src="js/bootstrap.min.js"></script>
</head>
    
    <?php include('nav.php'); ?>
    <br/><br/><br/>



<!-- <html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<script src="js/bootstrap.min.js"></script>
</head>-->
<body>


<?php
include('DBconfig.php');
if(isset($_POST['search']))
{
    $q = $_POST['srch_query']; // Search query of user saved to the variable 'q'     
?> 


<?php
$search =$db->prepare("SELECT * FROM upload
                       WHERE iname LIKE '%$q%' OR
                             filename LIKE '%$q%'");
$search->execute(); //execute with wildcards
    
if($search->rowcount()==0){ echo "No Match Found!"; }
    
else
{
    echo "Search Results for: $q<br/>";?>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr> 
                 <th scope="col"> Image ID </th>
                 <th scope="col"> Image Name </th>
                 <th scope="col"> File Name </th>
                 <th scope="col"> Action </th>
            </tr>
        </thead>
        <tbody>
<?php foreach($search as $s)
    { ?>
        <tr class="record">
        <td class="table-active"><?php echo $s['id']; ?></td>
        <td class="table-active"><?php echo $s['iname']; ?></td>
        <td class="table-active"><?php echo $s['filename']; ?></td>
        <td class="table-active"><a href="edit.php?id=<?php echo $s['id']; ?>" class="btn btn-warning"> edit </a>&nbsp;
             &nbsp;<a href="delete.php?id=<?php echo $s['id']; ?>" class="btn btn-danger"> delete </a>&nbsp;
             &nbsp;<a href="delete.php?id=<?php echo $s['id']; ?>" class="btn btn-danger"> delete </a>
            </td>
          </tr>
<?php } 
}
} ?> </tbody></table><br/> 
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body> 
</html>
<?php include('footer.php'); ?>