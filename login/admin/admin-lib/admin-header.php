<!DOCTYPE html>
<html>
<head>

	<title><?php echo $_SESSION['user'] ?> - admin</title>

<!-- 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 -->

	<script src="../../vendor/jquery-1.11.1.min.js"></script>

	<!-- BOOTSTRAP -->
<!-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
 -->
 	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap.min.css">
 	<script src="../../vendor/bootstrap.min.js"></script>


	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<div class="container">
	<div class="row underline">
		<div class="col-xs-4">
			<a href="?action=read"><h4><?php echo $_SESSION['user']; ?></h4></a>
		</div>
		<div class="col-xs-4 pull-right text-right">
			<div>
				<h4>Log out</h4>
			</div>
		</div>
	</div>
</div>
