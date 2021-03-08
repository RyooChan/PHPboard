<?php

	$query = "SELECT reply_writer FROM dbo.chan_reply where boardnumber = '$intboardnumber' and reply_order = '$intreplynumber' and rreply_order = '$intrreplynumber';";
	$result = sqlsrv_query($dbconn, $query);

    while ( $row = sqlsrv_fetch_array( $result ) ) 
    {
         $sqlusername = $row['reply_writer'];
    }
?>