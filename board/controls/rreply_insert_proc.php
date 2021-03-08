<?php

	header("Content-Type:text/html;charset=utf-8");
	session_start();

	include "../controls/mssqllog_proc.php";

	// 쿼리 결과가 없는 경우 최초값 1을 reply_order에 적용할 수 있도록 한다.
	$intrreply_order = 1;

	$strwriter = $_SESSION['id_exist'];
	$strinput = $_POST[rreply_context];
	$intreply_order = $_POST[reply_order];
	$intboardnumber = $_POST[boardnumber];

	$query = "SELECT TOP 1 rreply_order FROM dbo.chan_reply WHERE boardnumber = '$intboardnumber' and reply_order = '$intreply_order' ORDER BY reply_order , rreply_order DESC;";
	$result = sqlsrv_query($dbconn, $query);
	while( $row = sqlsrv_fetch_array( $result ) )
	{
		$intrreply_order = 1 + $row['rreply_order'];
	}

	$query = "INSERT INTO dbo.chan_reply 
	(reply_writer, reply_comment, reply_class, reply_order, rreply_order, boardnumber) 
	VALUES (N'$strwriter', N'$strinput', 1, $intreply_order, $intrreply_order, $intboardnumber);";
	
	$result = sqlsrv_query($dbconn, $query);
	echo '<script> alert("대댓글 작성 완료.");</script>';

	
?>
<script> history.back(); </script>