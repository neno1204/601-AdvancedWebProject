<!-- ADMIN LOGGED IN PAGE -->
<?php 
	require_once('../lib/functions.php');
	require_once('../lib/config.php');
	require_once('../lib/db_conn.php');

	check_log();
	check_log_admin();
	// if (!isset($_SESSION['user'])) {
	// 	$_SESSION['user'] = 'nikola';
	// }
	require_once('admin-lib/admin-header.php');

	if(!$_GET['action']){
		$action = "read";
	}else{
		$action = $_GET['action'];
	}

	require_once("modules/".$action.".inc.php");

?>



