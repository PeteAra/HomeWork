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
					<li><a class="active" href="#">Home</a></li>
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
  <br>
  <div class="container">         
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Phone Number</th>
          <th>Email</th>
          <th>Edit/Delete</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>USA001</th>
          <td>John</td>
          <td>Doe</td>
          <td>555-245-3456</td>
          <td>john@example.com</td>
          <td><button type="button" class="btn btn-primary">Edit</button></td>
          <td><button type="button" class="btn btn-danger">Delete</button></td>
        </tr>
        <tr>
          <th>USA002</th>
          <td>Mary</td>
          <td>Moe</td>
          <td>555-245-3566</td>
          <td>mary@example.com</td>
          <td><button type="button" class="btn btn-primary">Edit</button></td>
          <td><button type="button" class="btn btn-danger">Delete</button></td>
        </tr>
        <tr>
          <th>USA003</th>
          <td>July</td>
          <td>Dooley</td>
          <td>555-245-7688</td>
          <td>july@example.com</td>
          <td><button type="button" class="btn btn-primary">Edit</button></td>
          <td><button type="button" class="btn btn-danger">Delete</button></td>
        </tr>
        <tr>
          <th>USA004</th>
          <td>John</td>
          <td>Doe</td>
          <td>555-245-3456</td>
          <td>john@example.com</td>
          <td><button type="button" class="btn btn-primary">Edit</button></td>
          <td><button type="button" class="btn btn-danger">Delete</button></td>
        </tr>
        <tr>
          <th>USA005</th>
          <td>Mary</td>
          <td>Moe</td>
          <td>555-245-3566</td>
          <td>mary@example.com</td>
          <td><button type="button" class="btn btn-primary">Edit</button></td>
          <td><button type="button" class="btn btn-danger">Delete</button></td>
        </tr>
        <tr>
          <th>USA006</th>
          <td>July</td>
          <td>Dooley</td>
          <td>555-245-7688</td>
          <td>july@example.com</td>
          <td><button type="button" class="btn btn-primary">Edit</button></td>
          <td><button type="button" class="btn btn-danger">Delete</button></td>
        </tr>
      </tbody>
    </table>
  </div>	 
</body>
</html>