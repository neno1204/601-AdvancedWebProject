<h3>Please wait</h3>

<?php 
	
	require_once('../../lib/functions.php');
	require_once('../../lib/config.php');
	require_once('../../lib/db_conn.php');

	check_log();
	check_log_admin();

	$opis = $_POST['opis'];
	$cena = $_POST['cena'];
	$valuta = $_POST['valuta'];
	$popravka_id = $_POST['popravka_id_create'];
	$user_id = $_POST['user_id_create'];
	$motor_id = $_POST['motor_id_create'];

	$query="INSERT INTO cenovnik SET 
	POPRAVKA_ID = '$popravka_id', 
	USER_ID = '$user_id', 
	MOTOR_ID = '$motor_id',  
	OPIS = '$opis', 
	CENA = '$cena', 
	PLACENO = '0', 
	VALUTA = '$valuta'";

	if (mysqli_query($con, $query)) {
	?>

	<script type="text/javascript">
		var popravka_id = <?php echo $popravka_id; ?>;
		window.location = "../?action=popravka_read&popravka_id="+popravka_id;
	</script>

<?php
	}


 ?>