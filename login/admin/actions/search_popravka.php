<?php 

	// AJAX SEARCH

	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();

	$search_term = $_POST['search_term'];


	if(isset($search_term) && !empty($search_term)){
		$search_term = mysql_real_escape_string($search_term);
		$query = "SELECT * FROM korisnici WHERE username LIKE '%$search_term%' LIMIT 5";
		$result = mysqli_query($con, $query);
		while($row = mysqli_fetch_assoc($result)) {
			?>

		<?php echo "<li data-id='".$row["id"]."'>".$row['username'] . "</li>"; ?>

		<?php
		}
	}else{
		//
	}


 ?>