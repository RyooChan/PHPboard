<?php
		if(!empty($strcondition))
		{
			// 추가로 검색할 때 이렇게 해야 익명으로 작성된 글을 불러오지 않는다.
			$writer_name = "and boardwriter = '$strcondition' and anonymous=0";

			// 작성자 검색 페이징에 필요한 쿼리 추가문이다.
			$paging_writer = "where boardwriter = '$strcondition' and anonymous=0";
		}
		

		// 전체 게시글의 갯수를 가져온다. 전체 블록 구현 시 필요하다.
		// 작성자 검색을 하거나 그렇지 않거나 하나의 쿼리로 제어하기 위해 변수명을 더하는 식으로 구현했다.
		$countpost = "SELECT count(boardnumber) from dbo.chan_board where boardnumber !=0 ".$writer_name;
		$result = sqlsrv_query($dbconn, $countpost);

		while( $row = sqlsrv_fetch_array( $result ) )
		{
			// count(*)의 결과값은 변수명이 없이 저장된다. 이를 사용하기 위해 postnum에 row[0]을 저장시킴.
			(int)$sqlpostnum = $row[0];
		}
?>