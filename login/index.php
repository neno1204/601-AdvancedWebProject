<!-- LOG IN CHECK -->
<!-- OVDJE UZIMAM PAS I USER I POZIVAM FUNCKCIU CHECK LOG IN -->
<h3>Please wait</h3>
<?php 
	require_once("lib/functions.php");
	$username = $_POST['username'];
	$password = $_POST['password'];

	log_in($username, $password);

	//echo $_SESSION['user'];

