<!doctype html>
<html lang="ko">

<head>
<meta charset="UTF-8">

<link rel="stylesheet" href="http://phpsample.ybmnet.co.kr/board/resources/css/board.css" type="text/css" />

</head>
<body>
	<?php
		include "../controls/mssqllog_proc.php";
		session_start();

		// 로그아웃 버튼을 눌렀거나 세션이 없는 경우 로그아웃된다.
		include "../controls/boardout.php";
		// board는 세 부분으로 나눈다. 
		// head는 맨 위부터 게시판의 성격을 나타내주는 모습이다.
		include "../views/boardform_head_view.php";
//------------------------------------------------------------------------------------------
		// 페이징과 검색을 위해 사용되는 부분이다.

		// condition은 작성자의 이름으로 검색할 때에 필요하다.
		// 그냥 검색할 때, 작성자의 이름으로 검색할 때 각각 다르게 검색하도록 한다.
		$strcondition = $_GET['writersearch'];
		include "../controls/postnum_proc.php";
		$intpostnum = $sqlpostnum;
		// intpostnum이 총 게시물의 갯수

		// foot에서 page번호를 받아온다.
		$intpage = $_GET['page'];

		// 게시물 10개씩 출력, 게시물 개수를 여기서 조정 가능
		$intlist = 10;

		// 현재 페이지
		$intnowpage = $intpage;

		// 처음 페이지는 1페이지이다.
		if(!isset($intnowpage))
			$intnowpage = 1;

		// 페이징을 위해 사용되는 controller이다.
		include "../controls/paging.php";

//------------------------------------------------------------------------------------------


		// 위에서 전체 페이지 개수와 페이징 넘버를 구했기 때문에, list에서는 해당 page에 있는 게시글을 불러오게 한다.
		// list의 경우, 해당하는 페이지 번호에 맞추어 다른 리스트를 불러와야 하기 때문에 boardform_list_view.php를 이곳의 쿼리문을 돌릴 때 마다 호출하게 된다. 
		// 이 호출을 해당 models/board.php에서 진행하려 하였는데 구현이 되지 않아서 주석으로 설명하였다.
		include "../controls/boardlist_proc.php";

		// 로그아웃 버튼과 글쓰기, 현재 페이지와 이동할 페이지를 적어둔 foot이다. 해당 글자를 클릭하면 페이지를 이동할 수 있도록 한다.
		include "../views/boardform_foot_view.php";


	?>
	

</body>
</html>