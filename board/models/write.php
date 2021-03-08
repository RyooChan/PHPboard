<!DOCTYPE html>
<html lang="ko">
 
<head>
<meta charset="utf-8">
<!-- 바로 적용을 위해 css뒤에 "?after" 을 기입하였다 --> 
<link rel="stylesheet" href="http://phpsample.ybmnet.co.kr/board/resources/css/write.css?after" type="text/css">

<!-- 네이버 스마트 에디터를 사용하기 위한 세팅 -->
<script type="text/javascript" src="http://phpsample.ybmnet.co.kr/board/resources/demo/js/service/HuskyEZCreator.js" charset="utf-8"></script>


</head>
<body>

    <?php
	session_start();
    //데이터 베이스 연결하기
    include "../controls/mssqllog_proc.php";

		include '../views/writeform_view.php';

		if(isset($_POST['save']))
		{
			$strboardtitle = $_POST[boardtitle];
			$strboardcontent = $_POST[boardcontent];
			$strboardwriter = $_SESSION['id_exist'];

			if(isset($_POST['anonymous_check']))
			{
				$anonymous = 1;
			}
			else
			{
				$anonymous = 0;
			}

			// 처음에 isset으로 했는데 빈칸이여도 set이 된 것으로 인식되어 파일이 없는 경우는 ""으로 설정해 주었다.
			if(!empty($_FILES['upload_file']['name']))
			{
				include "../controls/uploadcheck.php";
			}

			 include "../controls/insert_proc.php";
		}
    ?>


</body>
</html>