<!DOCTYPE html>
<html lang="ko">
 
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="http://phpsample.ybmnet.co.kr/board/resources/css/logincheck.css?after" type="text/css">


</head>
<body>

    <?php
        include "../controls/mssqllog_proc.php";
        include "../views/registerform_view.php";

        $struserid = $_POST[ 'struserid' ];
        $strusername = $_POST[ 'strusername' ];
        $intuserphone = $_POST[ 'intuserphone' ];
        $intuserbirth = $_POST[ 'intuserbirth' ];
        $struserpass = $_POST[ 'struserpass' ];
        $struserpass_confirm = $_POST[ 'struserpass_confirm' ];

		// view에서 받아온 변수들을 미리 변경해 준 후에 register을 진행한다. 변수가 너무 많고, 사용 전에 공백을 지워주어야 하기 때문에 models에서 진행하였다.
        if (isset( $struserid ) && isset($strusername) && isset($intuserphone) && isset($intuserbirth) && isset($struserpass) && isset($struserpass_confirm)) 
        {
			// 공백이 들어가면 다 지워서 해준다. 안그러면 공백이 포함되면 다른 이름이 된다.
			$struserid = preg_replace("/\s+/","",$struserid);
			$strusername = preg_replace("/\s+/","",$strusername);
			$intuserphone = preg_replace("/\s+/","",$intuserphone);
			$intuserbirth = preg_replace("/\s+/","",$intuserbirth);
			$struserpass = preg_replace("/\s+/","",$struserpass);
			$struserpass_confirm = preg_replace("/\s+/","",$struserpass_confirm);
			include "../controls/regist_proc.php";		
        }
        else
        {
            echo "<p>양식을 모두 작성해 주세요.</p>";
        }


        

    ?>
        

  </body>
</html>