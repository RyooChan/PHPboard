<?php
	$query = "SELECT boardwriter FROM dbo.chan_board where boardnumber = $intpage;";
	$result = sqlsrv_query($dbconn, $query);

    while ( $row = sqlsrv_fetch_array( $result ) ) 
    {
         $sqlusername = $row['boardwriter'];
    }
	
?>