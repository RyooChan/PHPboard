<?php

	if(!isset($_SESSION['id_exist']))
	{
		echo "<script>alert(\"로그인되어있지 않습니다.\"); location.replace('http://phpsample.ybmnet.co.kr/board/models/logincheck.php');</script>";
	}

?>