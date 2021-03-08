<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	include "./mssqllog_proc.php";

	$page = $_POST['boardnumber'];
    $query = "SELECT file_name, file_directory FROM dbo.chan_board WHERE boardnumber = '$page'";
    $stmt= sqlsrv_query($dbconn, $query);

	while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
	{
		$fileName = $row['file_name']; 
		$DownloadPath = $row['file_directory']."/".$fileName; // 파일 경로 
	}

	// 저장된 이름은 년월일시분초_원래이름 이므로, '_'으로 가장 처음을 나누어 
	$divider = explode('_', $fileName);
	$originname = $divider[1];
	

	$filesize = filesize($DownloadPath);
	$path_parts = pathinfo($DownloadPath);
	$filename = $path_parts['basename'];	// 파일의 전체 이름을 가져온다.
	$extension = $path_parts['extension'];	// 파일의 확장자를 가져온다. - 위에서 전체 이름을 가져오는데 굳이 확장자를 가져올 필요가 있나

        header("Content-type: application/octet-stream"); 
        header("Content-Length: ".filesize("$DownloadPath"));
        header("Content-Disposition: attachment; filename=$originname"); // 다운로드되는 파일명 (실제 파일명과 별개로 지정 가능) 
        header("Content-Transfer-Encoding: binary"); 
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: public"); 
        header("Expires: 0"); 

	$fp = fopen($DownloadPath, 'rb');
	fpassthru($fp);
	fclose($fp);

?>