<?php

		// 페이징 시 이전 페이지 다음부터 boardnumber순서대로 나오게.
		$boardlist = "SELECT TOP ".$intlist." boardnumber, boardtitle, boardwriter, anonymous FROM dbo.chan_board
		where boardnumber NOT IN (SELECT TOP ".(($intnowpage-1) * $intlist)." boardnumber FROM dbo.chan_board ".$paging_writer." ORDER BY boardnumber DESC)".$writer_name."ORDER BY boardnumber DESC";
		// nowpage는 기본 1을 가지게 한다. 따라서 0부터 값을 가져오려면 nowpage-1에다 곱해야 한다.
		// 기본으로 intlist페이지 만큼 검색을 하되, 작성자 이름으로 검색하는 경우 paging_writer, writer_name을 통해 작성자 이름으로 검색하도록 한다.
		// 안에 있는 서브쿼리를 통해 앞의 페이지까지의 값을 제외하고 가져올 수 있다. 여기서 작성자 이름으로 검색하는 경우 아니면 null이 되는 변수를 적용함으로서 아무 조건이 없을 때에도 쿼리가 적용되게 한다.

		$result = sqlsrv_query($dbconn, $boardlist);

		while ( $row = sqlsrv_fetch_array( $result ) ) 
		{
			 $sqlboardtitle = $row['boardtitle'];
			 $sqlboardwriter = $row['boardwriter'];
			 $sqlboardnumber = $row['boardnumber'];
			 $sqlanonymous = $row['anonymous'];
			
			// 익명처리는 여기저기 쓰이므로 짧긴 하지만 함수처럼 사용하기 위해 따로 코딩하였다.
			include "../controls/anonymous.php";

			// 밖으로 빼면 에러가 나서 안으로 넣어줌. 리스트는 매번 받아올 때 마다 달라져야 한다.
			include "../views/boardform_list_view.php";
		} 
?>