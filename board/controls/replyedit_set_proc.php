<?php
	$query = "SELECT reply_writer FROM dbo.chan_board WHERE boardnumber = '$bno' and reply_order = $reply_order and rreply_order = $rreply_order";
    $result= sqlsrv_query($dbconn, $query); 

    while ( $row = sqlsrv_fetch_array( $result ) ) 
    {
         $sqlcontentset		= $row['boardcontent'];
         $sqltitleset		= $row['boardtitle'];
    }

?>