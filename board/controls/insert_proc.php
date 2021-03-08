<?php
	header("Content-Type:text/html;charset=utf-8");

	if(empty($strboardtitle))
		echo "<script>alert(\"제목을 입력하세요.\"); location.replace('http://phpsample.ybmnet.co.kr/board/models/board.php');</script>";
	else
	{
		if(isset($_SESSION['id_exist']))
		{
			$query = "INSERT INTO dbo.chan_board
			(boardtitle, boardcontent, boardwriter, anonymous, file_type, file_name, file_directory)
			VALUES (N'$strboardtitle', N'$strboardcontent', N'$strboardwriter', '$anonymous', '$intfiletype', '$strfile_name', '$strfile_directory')";
			$result=sqlsrv_query($dbconn, $query);

			echo "<script>alert(\"글이 작성되었습니다.\"); location.replace('http://phpsample.ybmnet.co.kr/board/models/board.php');</script>";
		}
		else
			echo "<script>alert(\"세션이 없습니다.\"); location.replace('http://phpsample.ybmnet.co.kr/board/models/board.php');</script>";
	}
?>
