<?php 
	global $con;
	$con = mysqli_connect("$db_host", "$db_user", "$db_pass", "$db_base");

	if(mysqli_connect_errno()){
		die("Not connected to database".
			mysqli_connect_error().
			"(".mysqli_connect_errno().")"
		);		
	};

