<h3>Please wait</h3>

<?php 

	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();

	
	$kvar = $_POST['kvar'];
	$datum = strtotime($_POST['datum']);	
	$kilometraza = $_POST['kilometraza'];
	$popravka_id = $_POST['popravka_id'];

	$query= "UPDATE trenutne_popravke SET 
	KVAR = '$kvar', 
	DATUM = '$datum', 
	KILOMETRAZA = '$kilometraza' 
	WHERE id = '$popravka_id'";

	if (mysqli_query($con, $query)) {
		?>
	
	<script type="text/javascript">
			var popravka_id = <?php echo $popravka_id; ?>;
			window.location = "../?action=popravka_read_only&popravka_id="+popravka_id;
	</script>

<?php
	}
	
 ?>

