<!DOCTYPE html>
<html lang="ko">
 
<head>
<meta charset="utf-8">
<!-- 바로 적용을 위해 css뒤에 "?after" 을 기입하였다 --> 
<link rel="stylesheet" href="http://phpsample.ybmnet.co.kr/board/resources/css/write.css?after" type="text/css">

<!-- 네이버 스마트 에디터를 사용하기 위한 세팅 -->
<script type="text/javascript" src="http://phpsample.ybmnet.co.kr/board/resources/demo//js/service/HuskyEZCreator.js" charset="utf-8"></script>


</head>
<body>

<?php
	session_start();
	include "../controls/mssqllog_proc.php";

	// idx는 페이지 번호이다.
	// 이곳에서 get으로 받아와도 본 model에서 세션과 아이디 확인을 진행하고, 실제 변경이 이루어지는 곳에서는 POST로 값을 받기 때문에 다른 사람이 변경할 수 없도록 했다.
	$intpage = $_GET['idx'];

	
	// 유저를 확인하여 해당하는 닉네임을 가져온다.
	include "../controls/post_userconfirm_proc.php";
	$strusername = $sqlusername;

	// 가져온 아이디와 같은 경우 진행한다.
	if($_SESSION['id_exist'] == $strusername)
	{
		include "../controls/edit_set_proc.php";
				
		// 수정이기 때문에 이전에 사용한 문자들을 textarea에 출력시켜야 한다. 이를 미리 setting시킨다.
		$strcontentset	 = $sqlcontentset;
		$strtitleset	 = $sqltitleset;

		// 이 view에서 수정완료 버튼을 누르면 models/modify.php로 이동한다. 해당 php파일에서 실제로 수정된 내용이 적용된다(sql update)
		include '../views/post_editform_view.php';
	}
	else		// 아이디가 다른 경우 글을 수정할 수 없다.
	{
			echo "<script>alert(\"글쓴이만 글을 수정할 수 있습니다.\");history.back();</script>";
	}
	
	

?>

 
</body>
</html>