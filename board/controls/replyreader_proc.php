<?php
	$query = "SELECT reply_writer, reply_comment, reply_order, rreply_order, reply_class, boardnumber FROM dbo.chan_reply WHERE boardnumber = '$intboardnumber' ORDER BY reply_order, rreply_order ;";
	$result = sqlsrv_query($dbconn, $query);
	
	while ( $row = sqlsrv_fetch_array( $result) ) 
	{
         $sqlreply_writer		= $row['reply_writer'];
         $sqlreply_comment		= $row['reply_comment'];
         $sqlreply_order		= $row['reply_order'];
		 $sqlrreply_order		= $row['rreply_order'];
		 $sqlreply_class		= $row['reply_class'];
		 // 댓글을 나타내주고, 수정/삭제/대댓글 등 추가 기능들은 이곳에서 진행한다.
		 include "../models/reply_display.php";
	}
?>
