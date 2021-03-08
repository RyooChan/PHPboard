<?php
	$query = "SELECT pwdcompare('$struserpass', userpassHash) as 'pass', username FROM dbo.chan_user where username = '{$_SESSION['id_exist']}';";
	$result = sqlsrv_query($dbconn, $query);

    while ( $row = sqlsrv_fetch_array( $result ) ) 
    {
         $strpasscheck = $row['pass'];
		 $strusername = $row['username'];
    }
?> 