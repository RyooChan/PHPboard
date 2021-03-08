<?php
	// include된 것이 아니고 url을 통해 이곳으로 이동하였기 때문에 로그인과 한글설정을 해준다.
	// 아이디 찾기와 거의 유사하므로 필요한 해설만 달 예정.
	header("Content-Type:text/html;charset=utf-8");
    include "../controls/mssqllog_proc.php";

	// 항목이 하나라도 입력되지 않았을 시 공지하고 넘어간다.
    if(empty($strusername) || empty($intuserbirth) || empty($intphonenum) || empty($struserid))
    {
        echo '<script> alert("항목을 입력하세요"); history.back(); </script>';
    }
    else
    {
		// 비밀번호와 비밀번호 확인이 다른 경우 다르다 공지한 뒤 이전 화면으로 돌아간다.
		if($struserpass != $struserpass_confirm)
		{
			echo "<script>alert(\"비밀번호를 확인해 주세요.\"); location.replace('http://phpsample.ybmnet.co.kr/board/models/passfind.php');</script>";
		}
		else	// 비밀번호와 확인이 같은 경우 확인 진행.
		{
			// 유저 확인용 아이디를 가져온다. 굳이 아이디를 가져온 이유는 뒤에서 UPDATE를 진행할 때 WHERE문에서 userid를 사용하게 되는데, 이 때 값이 맞는지 id를 통해 확인하기 때문이다.
			// 뒤에서 userid를 활용할 예정이기 때문에 앞에서는 조건문에 넣을 필요는 없다.
			$sqlconfirm_user = "SELECT userid FROM dbo.chan_user WHERE username = '$strusername' and userbirth = '$intuserbirth' and userphone = '$intphonenum'";
			$stmt = sqlsrv_query($dbconn, $sqlconfirm_user);

			// 닉네임, 생일, 전화번호가 일치할 경우 유저 확인용 아이디가 출력될 것이고 그렇지 않을 경우 아무것도 출력되지 않는다.
			while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
			{
				$userconfirm = $row[ 'userid' ];
			}
			
			// user의 확인을 위해 가져온 userconfirm과 입력한 struserid가 같은 경우 비밀번호를 변경할 수 있도록 한다.
			if($userconfirm === $struserid)
			{			
				// 위에서 모든 절차를 진행하였기 때문에 해당 userid의 비밀번호를 암호화하여 변경해 준다.
				$query = "UPDATE dbo.chan_user SET userpassHash = pwdencrypt('$struserpass') WHERE userid = '$userconfirm';";
				$stmt = sqlsrv_query($dbconn, $query);
				
				echo "<script>alert('비밀번호가 변경되었습니다.'); location.replace('http://phpsample.ybmnet.co.kr/board/models/logincheck.php');</script>";
				
			}
			else
			{
				echo "<script>alert('등록된 유저 정보가 없습니다.'); location.replace('http://phpsample.ybmnet.co.kr/board/models/passfind.php');</script>";
			}


		}

		
		
    }
?>