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
    <nav class="navbar navbar-inverse" id="nav">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="suadminhome.php"><?php echo $_SESSION['sess_username'];?></a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="suadminhome.php">Home</a></li>
          <li><a href="#">Link</a></li>
        </ul>
        <i id="glyph" class="glyphicon glyphicon-log-out"></i>
        <button id="logoutbtn" class="btn navbar-btn"><a href="logout.php">Logout</a></button>
        <h3 class="title">Peter Arachtingi</h3>
      </div>
    </nav>
  </body>  
</html>