<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Website Tutorial</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .navbar {
    margin-bottom: 0;
    border-radius: 0;
    background-color: rgb(38, 38, 38);
    color: #FFF;
    padding: 1% 0;
    font-size: 1.2em;
    border: 0;
  }
  .navbar-brand{
    float: left;
    min-height: 55px;
    padding: 0 15px 5px;
  }
  .navbar-inverse .navbar-nav .active a, .navbar-inverse .navbar-nav .active a:focus, .navbar-inverse .navbar-nav .active a:hover{
    color: #FFF;
    background-color: black;
  }
  .container{
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
  }
  .table{
    width: 700px;
  }
  </style>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-left">
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href="12_to_24.php">Question 1</a></li>
                    <li><a href="increment.php">Question 2</a></li>
                    <li><a href="outputs.php">Question 3</a></li>   
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href=""><i class="glyphicon glyphicon-user"></i> Sign Up</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-log-in"></i> Login</a></li>    
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
<br>
<br>
<br>
<br>
<?php
$x = rand(55,65);
echo "random variable x = " . $x;
echo "<br><br>";

function increment($x)
{
	if($x <= 60)
	{
		echo "[ Condition : " . $x . " <= 60 True ]";
	}
	else
	{
		echo "[ Condition : " . $x . " <= 60 False ]";
	}
	echo "<br><br>";
	$i = 1;
	do {
	    echo 'Iteration ' . $i . ": Increment = " . $x . "<br>";

	    $i++;
	    $x++;
	} while ($x <= 60);
}

?>

