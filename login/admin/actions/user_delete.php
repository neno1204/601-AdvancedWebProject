<h3>Please wait</h3>
<?php 

	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();

	$user_id = $_GET['user_id'];

	$query = "DELETE FROM korisnici WHERE id='$user_id'";
	$query_2 = "DELETE FROM motori WHERE user_id='$user_id'";
	$query_3 = "DELETE FROM trenutne_popravke WHERE user_id='$user_id'";
	$query_4 = "DELETE FROM cenovnik WHERE user_id='$user_id'";

	if (mysqli_query($con, $query) && mysqli_query($con, $query_2) && mysqli_query($con, $query_3) && mysqli_query($con, $query_4)) {
		
		?>

		<script type="text/javascript">
		window.location = "../";
		</script>

	<?php

	}

