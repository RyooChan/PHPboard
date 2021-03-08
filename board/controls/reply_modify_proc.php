<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();
    //데이터 베이스 연결하기
    include "../controls/mssqllog_proc.php";

    $intboardnumber  = $_POST[boardnumber];
    $intreplynumber  = $_POST[replynumber];
    $intrreplynumber = $_POST[rreplynumber];
    $strcontent      = $_POST[reply_edit_context];
    $strboardwriter  = $_SESSION['id_exist'];

	// 유저의 이름을 받아온다.
	include "./reply_userconfirm_proc.php";

	// 받아온 유저 이름과 세션에 저장된 유저이름이 같은 경우 실행
	if($sqlusername == $strboardwriter)
	{
		$query = "UPDATE dbo.chan_reply SET
		reply_comment = N'$strcontent'
		WHERE boardnumber = '$intboardnumber' and reply_order = '$intreplynumber' and rreply_order = '$intrreplynumber';" ;

		$result=sqlsrv_query($dbconn, $query);
		echo '<script> alert("변경되었습니다.");</script>';

	}
	else
	{
		echo '<script> alert("다른 사람의 댓글은 수정할 수 없습니다.");</script>';
	}


?>	
<script> history.back(); </script>
