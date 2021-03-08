<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();

	include "../controls/mssqllog_proc.php";

	// 아래의 query를 돌렸을 때 reply_order가 없을 경우 최초의 reply_order는 1로 만들어 준다.
	$intreply_order = 1;

	// 
	$strwriter = $_SESSION['id_exist'];
	$strinput = $_POST[reply_input];
	$intboardnumber = $_POST[intboardnumber];


	if(isset($_SESSION['id_exist']))
	{
			$query = "SELECT TOP 1 reply_order FROM dbo.chan_reply WHERE boardnumber = '$intboardnumber' ORDER BY reply_order DESC;";
			$result = sqlsrv_query($dbconn, $query);
			while( $row = sqlsrv_fetch_array( $result ) )
			{
				$intreply_order = 1 + $row['reply_order'];		// 위에 미리 선언하였기 때문에 sql임에도 부득이하게 int형으로 선언하였다.(같은 변수이기 때문)
			}

			$query = "INSERT INTO dbo.chan_reply 
			(reply_writer, reply_comment, reply_class, reply_order, rreply_order, boardnumber) 
			VALUES (N'$strwriter', N'$strinput', 0, $intreply_order, 0, '$intboardnumber');";
			
			$result = sqlsrv_query($dbconn, $query);
		
	}

	header('Location: http://phpsample.ybmnet.co.kr/board/models/post.php?idx='.$intboardnumber);
?>