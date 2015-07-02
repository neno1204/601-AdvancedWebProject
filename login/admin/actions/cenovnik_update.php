<h2>Please wait</h2>

<?php 
	

	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();

	$stavka_id = $_POST['stavka_id'];
	$ischecked = $_POST['ischecked'];
	$popravka_id = $_POST['popravka_id'];

	echo $stavka_id . "<br>" . $ischecked . "<br>". $popravka_id;

	//ako je true updatuj na 1 ako je false na 0

	$query_true= "UPDATE cenovnik SET 
	PLACENO = '1' WHERE id = '$stavka_id'";
	$query_false= "UPDATE cenovnik SET 
	PLACENO = '0' WHERE id = '$stavka_id'";

	if ( $ischecked == 'false'){
		mysqli_query($con, $query_false);
	}
	if ( $ischecked == 'true') {
		mysqli_query($con, $query_true);
	}
	
 ?>

<script type="text/javascript">
		var popravka_id = <?php echo $popravka_id; ?>;
		window.location = "../?action=popravka_read&popravka_id="+popravka_id;
</script>