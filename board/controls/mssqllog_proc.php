<?php

	$serverName = "servername";
	$connectionOptions = array(
		"database" => "데이터베이스", // 데이터베이스명
		"uid" => "류찬",   // 유저 아이디
		"pwd" => "비밀번호",    // 유저 비번
		"characterset" => "UTF-8"  // mssql은 utf8로 미리 설정 해줘야 한글이 들어감.
	);

	// DB커넥션 연결
	$dbconn = sqlsrv_connect($serverName, $connectionOptions); 

?>
