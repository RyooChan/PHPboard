<?php
	$query = "SELECT boardtitle, boardcontent, file_name FROM dbo.chan_board WHERE boardnumber = '$intpage'";
    $result= sqlsrv_query($dbconn, $query); 

    while ( $row = sqlsrv_fetch_array( $result ) ) 
    {
         $sqlcontentset		= $row['boardcontent'];
         $sqltitleset		= $row['boardtitle'];
		 $sqlfile_name		= $row['file_name'];
    }

?>