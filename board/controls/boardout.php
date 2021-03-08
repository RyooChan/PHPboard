<?php	
		
	if(isset($_POST['logout']))
	{
		session_destroy();
		header("refresh:0;");	
	}

	if(!isset($_SESSION['id_exist']))
	{
		echo "<script>alert(\"게시판은 로그인해야 이용 가능합니다.\"); location.replace('http://phpsample.ybmnet.co.kr/board/models/logincheck.php');</script>";
	}

?> 