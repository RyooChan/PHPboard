<?php
			
			// id 중복 체크 process
            $funid_check = "SELECT userid FROM dbo.chan_user WHERE userid = '$struserid';";
            $funidresult = sqlsrv_query( $dbconn, $funid_check );
            while ( $row = sqlsrv_fetch_array( $funidresult ) ) 
            {
                $sqluserid_e = $row[ 'userid' ];
            }
            if ( $struserid === $sqluserid_e ) 
            {
                $sqliderror = 1;
            }

			// 전화번호 중복 체크 process
            $funphone_check = "SELECT userphone FROM dbo.chan_user WHERE userphone = '$intuserphone';";
            $funphoneresult = sqlsrv_query( $dbconn, $funphone_check );
			while ( $row = sqlsrv_fetch_array( $funphoneresult ) ) 
            {
                $sqljb_phone_e = $row[ 'userphone' ];
            }
            if ( $intuserphone == $sqljb_phone_e ) 
            {
                $sqlphoneerror = 1;
            } 

			// 닉네임 중복 체크 process
            $funname_check = "SELECT username FROM dbo.chan_user WHERE username = N'$strusername';";
            $funnameresult = sqlsrv_query( $dbconn, $funname_check );
            while ( $row = sqlsrv_fetch_array( $funnameresult ) ) 
            {
                $sqljb_user_e = $row[ 'username' ];
            }
            if ( $strusername === $sqljb_user_e ) 
            {
                $sqlnameerror = 1;
            } 
	
			// 비밀번호 - 비밀번호 확인 간 동일 여부 process
            if ( $struserpass != $struserpass_confirm ) 
            {
                $sqlpasserror = 1;
            } 

			// 4개 process중 하나라도 해당하는경우가 있으면 회원가입은 실행되지 않는다. 문제가 없을 시 가입 완료된다.
            if(!isset($sqliderror) && !isset($sqlpasserror) && !isset($sqlphoneerror) && !isset($sqlnameerror))
            {
                $registerin = "INSERT INTO dbo.chan_user (userid, userpassHash, username, userphone, userbirth) VALUES ('$struserid', pwdencrypt('$struserpass'), N'$strusername', '$intuserphone', '$intuserbirth');";
				
				$stmt = sqlsrv_query($dbconn, $registerin);
				echo "<script>alert(\"가입 완료되었습니다.\"); location.replace('http://phpsample.ybmnet.co.kr/board/models/logincheck.php')</script>";
            }


	  // 해당하는 문제가 존재하는 경우 에러 메세지를 출력한다.
      if ( $sqliderror == 1 ) {
        echo "<script>alert(\"ID가 중복되었습니다.\");</script>";
      }
      if ( $sqlpasserror == 1 ) {
        echo "<script>alert(\"비밀번호가 다릅니다.\");</script>";
      }
      if ( $sqlphoneerror == 1 ) {
        echo "<script>alert(\"전화번호가 중복되었습니다..\");</script>";
      }
      if ( $sqlnameerror == 1 ) {
        echo "<script>alert(\"닉네임이 중복되었습니다..\");</script>";
      }
?>