<?php

	// 게시글 삭제
	$query = "DELETE FROM dbo.chan_board WHERE boardnumber='$intpage';";
	$result = sqlsrv_query($dbconn, $query);

	// 댓글도 삭제(DB쓸데없는거 지우기)
	$query = "DELETE FROM dbo.chan_reply WHERE boardnumber='$intpage';";
	$result = sqlsrv_query($dbconn, $query);
?>

 <script type="text/javascript">alert("삭제되었습니다.");</script>
 <meta http-equiv="refresh" content="0 url=http://phpsample.ybmnet.co.kr/board/models/board.php/" />