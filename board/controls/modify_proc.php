<?php
    $query = "UPDATE dbo.chan_board SET
	boardtitle = N'$strboardtitle', boardcontent = N'$strboardcontent', anonymous = '$anonymous', file_type = '$intfiletype', file_name = '$strfile_name', file_directory = '$strfile_directory'
	WHERE boardnumber = $intpage;";

    $result=sqlsrv_query($dbconn, $query);

	header("Location: http://phpsample.ybmnet.co.kr/board/models/post.php/?idx=".$intpage);
?>