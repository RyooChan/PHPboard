<!DOCTYPE html>
<html lang="ko">
 
<head>
<meta charset="utf-8">
<!-- 바로 적용을 위해 css뒤에 "?after" 을 기입하였다 --> 
<link rel="stylesheet" href="http://phpsample.ybmnet.co.kr/board/resources/css/logincheck.css" type="text/css">

</head>
<body>


	<?php
		session_start();
		header("Content-Type:text/html;charset=utf-8");

		include "../controls/mssqllog_proc.php";
		include "../views/withdrawform_view.php";
		include "./userout.php";



		if(isset($_POST['request']))
		{
			$struserpass = $_POST['struserpass'];
			include "../controls/withdraw_userconfirm_proc.php";

			if($_SESSION['id_exist'] == $strusername && $strpasscheck != 0)
			{
				echo "<script>alert(\"삭제되었습니다.\"); location.replace('http://phpsample.ybmnet.co.kr/board/models/logincheck.php');</script>";
				include "../controls/withdrawer_proc.php";
			}
			else
			{
				echo "<script>alert(\"비밀번호가 틀렸습니다..\");history.back();</script>";
			}
		}

	?>


</body>
</html>