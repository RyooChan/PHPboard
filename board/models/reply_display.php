	<?php
		// replyreader에서 쿼리를 통해 받아온 변수들을 헝가리안 표기법으로 바꾸어 표시하였다.
		$strreply_writer	= $sqlreply_writer;
		$strreply_comment	= $sqlreply_comment;
		$intreply_order		= $sqlreply_order;
		$intrreply_order	= $sqlrreply_order;
		$intreply_class		= $sqlreply_class;
	?>

	<!-- 기능은 없고 javascript 활용을 하기 위한 세팅장소여서 models에 배치하였다.-->
	<!-- 이 div class -> reply_zone 내에 두 개의 view를 배치하였는데 변경사항이 생길 경우 view와 javascript 변경을 같이 할 수 있도록 하기 위해서이다. -->
	<div class="reply_zone">

			<!-- 수정을 위한 textarea출력 및 POST로 내용 전달 -->
			<div class="edit_zone">
				<form method="post" action="http://phpsample.ybmnet.co.kr/board/controls/reply_modify_proc.php">
					<input type = "hidden" name="replynumber" value="<?=$intreply_order ?>" >
					<input type = "hidden" name="rreplynumber" value="<?php echo $intrreply_order; ?>" >
					<input type = "hidden" name="boardnumber" value="<?php echo $intboardnumber; ?>" >
					<textarea name="reply_edit_context" class="reply_editarea"> <?php echo $strreply_comment ?></textarea>
					<input type="submit" value="수정 완료">
				</form>
			</div>

			<!-- 대댓글 작성을 위한 textarea출력 및 POST로 내용 전달 -->
			<div class="rereply_zone">
				<form enctype='multipart/form-data' method="post" action="http://phpsample.ybmnet.co.kr/board/controls/rreply_insert_proc.php" >
					<input type = "hidden" name="reply_order" value="<?php echo $intreply_order; ?>" >
					<input type = "hidden" name="boardnumber" value="<?php echo $intboardnumber; ?>" >
					<textarea name="rreply_context" class="reply_editarea"></textarea>
					<input type="submit" name="rreply_save"  value="작성">
				</form>
			</div>

			<!-- 삭제를 위한 삭제 버튼 출력 -->
			<div class="delete_confirm_zone">
				<form method="post" action="http://phpsample.ybmnet.co.kr/board/controls/reply_delete_proc.php">
					<input type = "hidden" name="replynumber" value="<?php echo $intreply_order; ?>" >
					<input type = "hidden" name="rreplynumber" value="<?php echo $intrreply_order; ?>" >
					<input type = "hidden" name="boardnumber" value="<?php echo $intboardnumber; ?>" >
					<input type = "submit" name="reply_delete"  value="삭제하시겠습니까?">
				</form>
			</div>

		<?php

			if(!$intreply_class)	// 0이면 댓글
				include "../views/post_reply_view.php";
			else					// 1이면 대댓글
				include "../views/post_rreply_view.php";
		?>

	</div>
