<!DOCTYPE html>
<html lang="ko">

<head>
<meta charset="UTF-8">

<title>게시글</title>
<link rel="stylesheet" type="text/css" href="http://phpsample.ybmnet.co.kr/board/resources/css/post.css" />

<!-- 자바스크립트 사용에 필요한 선언이다. -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<!-- post_reply_view, post_rreply_view에서 해당하는 class가 명시된 href가 클릭되면 reply_zone(models/post.php에 있음)에 있는 해당 class를 찾아 dialog형태로 보여준다. 클릭되지 않았을 때에 div들은 display-none형태로 보이지 않는다. -->
<script>
	$(document).ready(function(){
		$(".reply_edit").click(function(){
				var obj = $(this).closest(".reply_zone").find(".edit_zone");
				obj.dialog({
					modal:true,
					width:650,
					height:200,
					title:"댓글 수정"});
			});

			
		$(".rreply").click(function(){
				var obj = $(this).closest(".reply_zone").find(".rereply_zone");
				obj.dialog({
					modal:true,
					width:650,
					height:200,
					title:"대댓글"});
			});

			
		$(".reply_delete").click(function(){
				var obj = $(this).closest(".reply_zone").find(".delete_confirm_zone");
				obj.dialog({
					modal:true,
					height:100,
					title:"삭제"});
			});
			
			
		$(".download").click(function(){
				var obj = $(this).closest(".board_whole_area").find(".download_confirm_zone");
				obj.dialog({
					modal:true,
					height:100,
					title:"다운로드"});
			});
		
});
</script>



</head>
<body>
	<?php
		session_start();
		include "../controls/mssqllog_proc.php";
		header("Content-Type:text/html;charset=utf-8");
		include "../controls/boardout.php";

		// 이전 board의 foot에서 클릭한 페이지를 받아온다.
		$intboardnumber = $_GET['idx'];

		// 글을 읽기위해 내용 제목 등 여러 변수들을 받아온다.
		include "../controls/postreader_proc.php";
		// sql로 받아온 변수를 변환해준다.
        $strcontent			= $sqlcontent;
        $strtitle			= $sqltitle;
        $strwriter			= $sqlwriter;
		$intanonymous		= $sqlanonymous;
		$intfiletype		= $sqlfiletype;
		$strfilename		= $sqlfilename;
		$strfiledirectory	= $sqlfiledirectory;
		
		// post의 실제 구현 화면이다.
		// 이곳에서 controls/download.php를 통해 download를 받을 수 있다.
		// 수정(models/post_edit -> models/modify), 삭제(models/post_delete)를 진행 가능한 form이다.
		include "../views/postform_view.php";

		// 댓글을 작성하는 장소이며 작성 완료시 controls/reply_insert로 이동한다.
		include "../views/reply_input.php";

		// 모든 댓글을 불러와서 보여주는 장소이다. 댓글의 개수만큼 불러와야 하기 때문에 보여주는 코드는 replyreader 내부에 위치시켰다.
		include "../controls/replyreader_proc.php";

	?>

</body>
</html>


 