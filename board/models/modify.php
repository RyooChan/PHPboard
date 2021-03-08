<!DOCTYPE html>
<html lang="ko">
 
<head>
<meta charset="utf-8">
<!-- 바로 적용을 위해 css뒤에 "?after" 을 기입하였다 --> 
<link rel="stylesheet" href="http://phpsample.ybmnet.co.kr/board/resources/css/write.css?after" type="text/css">

</head>
<body>

<?php
	session_start();
	include "../controls/mssqllog_proc.php";
	header("Content-Type:text/html;charset=utf-8");

			// 이전 edit에서 받아온 변수들을 저장한다. 
			$strboardtitle	 = $_POST['strboardtitle'];
			$strboardcontent = $_POST['strboardcontent'];
			$intpage		 = $_POST['page'];

			// anonymous_check가 되어 있는지, 혹은 되어 있지 않은지 - 1은 익명, 0은 비익명
			if(isset($_POST['anonymous_check']))
			{
				$anonymous = 1;
			}
			else
			{
				$anonymous = 0;
			}

			// 처음에 isset으로 했는데 빈칸이여도 set이 된 것으로 인식되어 !empty로 설정해 주었다.
			// 파일이 있는 경우 upload를 진행해 준다.
			if(!empty($_FILES['upload_file']['name']))
			{
				include "../controls/uploadcheck.php";
			}

			 // 해당 controls/modify.php에서 실제로 변경이 이루어진다.
			 include "../controls/modify_proc.php";

?>
<script> history.back(); </script> 


</body>
</html>