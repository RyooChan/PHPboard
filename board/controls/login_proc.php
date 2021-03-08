<?php
// logincheck.php에서 세션이 이미 존재한다.
 
	 
	// 아이디 혹은 비밀번호가 입력되지 않으면 공지하고 탈출.
	if (!isset($struserid) || !isset($struserpass)) {
	  echo "<script>alert('아이디 또는 패스워드를 입력하여 주세요.');history.back();</script>";
	  exit;
	}
	 
 
/* db 조회, post로 받은 id, pw 일치하면 로그인 성공*/
	// username으로 검색하면 하나의 id가 나올텐데, pwdcompare로 비밀번호를 확인하였을 때 일치하면 1, 아니면 0이 출력된다. 
	// id를 검색하여 비밀번호가 해당 아이디의 비밀번호와 일치할 경우 1을 출력할 것이다.
	$query = "SELECT pwdcompare('$struserpass', userpassHash) FROM dbo.chan_user WHERE userid = '$struserid'";
    $result=sqlsrv_query($dbconn, $query); 

	// 쿼리를 통해 얻어진 row값 에서 pwdcompare의 출력을 확인한다. as를 통해 값을 지정할 수 있지만, 하나의select만 진행하여 row[0]에서 찾아오는 것으로 구현하기로 했다.
    while ( $row = sqlsrv_fetch_array( $result ) ) 
    {
         $logincheck = $row[0];
    }

 
/* id, pw 일치하면 로그인 완료 */
    if($logincheck==1) 
    {
		$query = "SELECT username FROM dbo.chan_user WHERE userid = '$struserid';";
		$name=sqlsrv_query($dbconn, $query); 
		while ( $row = sqlsrv_fetch_array( $name ) ) 
		{
			$strusername = $row['username'];
		}
		
		// 유저의 닉네임을 username으로 설정하여 위에서 logincheck 완료되면 해당하는 username으로 세션을 만든다.
		// 이 세션을 통해 이후 board와 post를 제어할 예정이다.
        $_SESSION['id_exist'] = $strusername;
    }
    else /* id, pw 실패하면 이전화면 */
    {
		echo "<script>alert(\"아이디가 없거나 비밀번호가 틀렸습니다..\");</script>";
    }
 
?>
 