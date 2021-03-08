<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();

	include "../controls/mssqllog_proc.php";

    $intboardnumber  = $_POST[boardnumber];
    $intreplynumber  = $_POST[replynumber];
    $intrreplynumber = $_POST[rreplynumber];
    $strcontent      = $_POST[reply_edit_context];
    $strboardwriter  = $_SESSION['id_exist'];
	
	include "./reply_userconfirm_proc.php";

	// 댓글을 삭제하는 경우 대댓글도 같이 모두 삭제한다.
	if($intrreplynumber != 0)
	{
		$deleterange = "and rreply_order = '$intrreplynumber'";
	}



	if($sqlusername == $strboardwriter)
	{
			$query = "DELETE FROM dbo.chan_reply 
			WHERE boardnumber = '$intboardnumber' and reply_order = '$intreplynumber' $deleterange;" ;

			$result=sqlsrv_query($dbconn, $query);
			echo '<script> alert("삭제되었습니다.");</script>';
		
	}
	else
	{
		echo '<script> alert("다른 사람의 댓글은 삭제할 수 없습니다.");</script>';
	}
	
?>
<script> history.back(); </script>
