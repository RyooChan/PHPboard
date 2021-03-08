<?php
	// model에서 include된 것이 아니라 해당 파일로 바로 이동하였기 때문에 한글 설정과 login을 진행한다.
	header("Content-Type:text/html;charset=utf-8");
    include "../controls/mssqllog_proc.php";
	
	// 입력이 되어있지 않은 경우 공지하고 다시 돌아간다. !isset으로 하지 않은 이유는 POST로 올 경우 null이 입력되는데, empty를 써야 0, nulll, ""등을 false로 return할 수 있기 때문.
    if(empty($strusername)|| empty($intuserbirth) || empty($intphonenum))
    {
        echo '<script> alert("항목을 입력하세요"); history.back(); </script>';
    }
    else	//입력이 되어있을 경우 POST된 변수들을 저장시킨다.
    {


        // sql문에서 해당 name, birth, phonenum에 해당하는 조건을 모두 만족하는 값을 가져온다.
        $query = "SELECT userid FROM dbo.chan_user where username = '$strusername'and userbirth = '$intuserbirth' and userphone = '$intphonenum'";
        $stmt = sqlsrv_query($dbconn, $query);

		// 유저의 전화번호, 닉네임은 중복이 불가능하다. 따라서 유저 번호, 혹은 닉네임만으로도 1개의 결과만이 출력될 것이다. 다만 조금 더 정확하게 판단하기 위해 추가로 생년월일을 입력하도록 하였다.
		// SQLSRV_FETCH_ASSOC 사용시 결합형 배열로 반환된다.
		while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
		{
			$sqluserid = $row['userid'];
		}
		if(!empty($sqluserid))
		{
			echo "<script>alert('당신의 아이디는 [ ".$sqluserid." ] 입니다.'); location.replace('http://phpsample.ybmnet.co.kr/board/models/logincheck.php/');</script>";
		}
		else
		{
			// sqluserid가 없는 경우 이를 공지하고 다시 돌아간다. 새로고침이 아니라 replace를 사용해야 boolean출력 메세지가 뜨지 않고 저장된 값을 초기화할 수 있다.
			echo "<script>alert('등록된 아이디가 없습니다.');location.replace('http://phpsample.ybmnet.co.kr/board/models/idfind.php/')</script>";
		}

		
    }
?>