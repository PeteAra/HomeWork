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
function from12To24($hours, $minutes, $meridian){
    if($meridian == "PM"):
        echo ($hours + 12) . ":" . $minutes . " Hours";
    elseif($meridian == "AM" and $hours == 12):
        $hours = 00;
        echo $hours . ":" . $minutes . " Hours";
    elseif($meridian == "AM"):
        echo $hours . ":" . $minutes . " Hours";
    endif;
}
function from24to12($hours, $minutes){
    if ($hours == 12 && $minutes == 0):
        echo "12" . ":" . "00" . " Noon";
    elseif($hours == 12 && $minutes > 0):
        echo $hours . ":" . $minutes . " PM";
    elseif($hours < 12):
        echo $hours . ":" . $minutes . " AM";
    elseif($hours > 12 && $hours != 12):
        $hours = ($hours - 12);
        echo $hours . ":" . $minutes . " PM";
    endif;
}

$hrs1 = rand(1,12);
$hrs2 = rand(1,24);
$mins = rand(0,59);
$mer = rand(1,2);

if($mer == 1):
    $mer = "AM";
elseif($mer != 1):
    $mer = "PM";
endif;

echo "12-hours to 24-hours";
echo "<br>";
echo $hrs1 . ":" . $mins . " " . $mer . " = ";
from12To24($hrs1, $mins, $mer);
echo "<br>";
echo "<br>";
echo "=============================";
echo "<br>";
echo "24-hour to 12-hours";
echo "<br>";
echo $hrs2 . ":" . $mins . " hours" . " = ";
from24to12($hrs2,$mins);

?>