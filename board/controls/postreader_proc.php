<?php

	$query = "SELECT boardtitle, boardcontent, boardwriter, anonymous, file_type, file_name, file_directory FROM dbo.chan_board WHERE boardnumber = '$intboardnumber'";
    $result= sqlsrv_query($dbconn, $query); 

    while ( $row = sqlsrv_fetch_array( $result ) ) 
    {
         $sqlcontent		= $row['boardcontent'];
         $sqltitle			= $row['boardtitle'];
         $sqlwriter			= $row['boardwriter'];
		 $sqlanonymous		= $row['anonymous'];
		 $sqlfiletype		= $row['file_type'];
		 $sqlfilename		= $row['file_name'];
		 $sqlfiledirectory	= $row['file_directory'];
    }


?>