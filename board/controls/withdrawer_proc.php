<?php

	$query = "delete from dbo.chan_user where username='{$_SESSION['id_exist']}';";
	$result = sqlsrv_query($dbconn, $query);

	session_destroy();
?>