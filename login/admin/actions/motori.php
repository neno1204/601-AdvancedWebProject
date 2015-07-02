<?php 

	// AJAX SEARCH

	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();

	$user_id = $_POST['user_id'];


	$query = "SELECT * FROM motori WHERE user_id = '$user_id'";
	$result = mysqli_query($con, $query);

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<option value='".$row['id']."'>".$row['motor']."</option>";	
	}


 ?>