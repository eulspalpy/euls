<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<a class="btn btn-primary" href="<?php echo base_url()."Pos_controllers/index" ?>"> Home</a>

	<h1>Login Here</h1>
	
<form id="myForm1" action="<?php echo base_url().'Pos_controllers/login1' ?>" method="post" class="form-horizontal">
<div>	
<label class="col-md-1">Username:</label>
<input type="" id="username" name="txtusername" placeholder="Username">
</div>
<br>
<div>	
<label class="col-md-1">Password:</label>
<input type="Password" id="pass" name="txtpassword" placeholder="Password">
</div>

<button type="submit" id="btnLogin" class="btn-primary">Login</button>

</form>
</body>
</html>



