	<div class="rreply_form">
		<div>
			<!-- 대댓글, 작성자 이름 앞에 argin:20px 적용, 글자 크기 75% -->
			<b><?php echo $strreply_writer;?></b>
			<a class="reply_edit" href="javascript:;"> [수정] </a>
			<a class="reply_delete" href="javascript:;"> [삭제] </a>
		</div>

		<div class="comment"><?php echo nl2br("$strreply_comment"); ?></div>
	</div>

<hr class="line"/>
