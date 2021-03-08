<!DOCTYPE html>
<html lang="ko">
 
<head>
<meta charset="utf-8">
<!-- 바로 적용을 위해 css뒤에 "?after" 을 기입하였다 --> 
<link rel="stylesheet" href="http://phpsample.ybmnet.co.kr/board/resources/css/logincheck.css" type="text/css">

</head>
<body>

 
	<?php 
		// 모든 처음 탬플랫에서 sisa아이디 로그인과 session_start를 해 준다. 다른 include에서는 사용하지 않도록 해서 코드를 줄이기 위해.
		include "../controls/mssqllog_proc.php";
		session_start();

		// userid는 어디서 존재할 수도 있는 변수이기 때문에 id_exist로 사용한다.

		 // user_id가 있는 경우
		 if(isset($_SESSION['id_exist']))
		 {
			 include "../views/after_login_view.php";
		 } 
		 // user_id가 없는 경우
		 else
		 {
			include "../views/before_login_view.php";
		 }
	?>
 

	<?php    
		//--------------------------------------------------------------------
		// before login
		if(isset($_POST['login']))		// 로그인 버튼이 눌렸을 때.
		{
			// before_login에서 보내진 값들을 저장한다.
			$struserid = $_POST[struserid];
			$struserpass = $_POST[struserpass];

			include '../controls/login_proc.php';
			header("refresh:0;");		// 맨 위 include는 session유무로 판단해서 다른 화면을 가져오기 때문에 session이 변화할 때 마다 화면을 새로고침 해준다.
		}


 
		//--------------------------------------------------------------------
		// after login

		// 로그아웃 구현.
		if(isset($_POST['logout']))
		{
			session_destroy();			
			header("refresh:0;");		// 맨 위 include는 session유무로 판단해서 다른 화면을 가져오기 때문에 session이 변화할 때 마다 화면을 새로고침 해준다.
		}

		if(isset($_POST['entry']))
		{
			header('Location: http://phpsample.ybmnet.co.kr/board/models/board.php/');		// 게시판으로 이동한다. 게시판은 로그인해야 사용 가능.
		}
		

	?>



 
</body>
</html>