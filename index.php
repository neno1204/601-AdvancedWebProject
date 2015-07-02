<!DOCTYPE html>

<html>
<head>
	<title>Ordinacija - Log in</title>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
	<div class="container">
		<div class="row text-center">
				<img src="assets/ordinacija-logo.png" class="log-in-img">
		</div>
		<div class="row margin-top-20">
			<div class="col-xs-6 col-xs-offset-3">
					<form method="POST" role="form" action="login/index.php">
						<div class="form-group">    
							<input class="form-control" type="text" name='username' id='username' placeholder="Username">
						</div>

						<div class="form-group">
							<input class="form-control" type="password" name="password" id='password' placeholder="Password">
						</div>
						<button type="submit" name="submit" value="Insert" class="btn btn-warning btn-lg btn-block">Log In</button>
					</form>
			</div>
		</div>
	</div>
</body>
</html>