<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8");
	$intpage = $_GET['idx'];

	include "../controls/mssqllog_proc.php";
	include "../controls/post_userconfirm_proc.php";

	$strusername = $sqlusername;

	// 현재 페이지의 작성자와 로그인된 사용자가 동일하면 삭제 가능하다.
	if($_SESSION['id_exist'] == $strusername)
	{
		include "../controls/post_deleter_proc.php";
	}
	else
	{
		echo "<script>alert(\"글쓴이만 글을 지울 수 있습니다.\");history.back();</script>";
	}
?>