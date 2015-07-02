<h3>Please wait</h3>

<?php 

//delete popravka
//delete cenovnik gdje je popravka

	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();

	$popravka_id = $_GET['popravka_id'];


	$query_1 = "DELETE FROM trenutne_popravke WHERE id='$popravka_id'";

	$query_2 = "DELETE FROM cenovnik WHERE popravka_id='$popravka_id'";

	if (mysqli_query($con, $query_1) && mysqli_query($con, $query_2)) {
	?>

	<script type="text/javascript">
	window.location = "../";
	</script>

	<?php
	}