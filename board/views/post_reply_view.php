<!-- 댓글과 대댓글은 기능적으로 동일하지만 외관을 다르게 하여 구분하기 쉽게 하였다. -->
<hr class="line"/>

		<div>
			<!-- 수정/삭제/대댓글작성 모두 #을 사용했었는데 그러면 글 맨 위로 가서 "javascript:;"를 사용하였다. -->
			<b><?php echo $strreply_writer;?></b>
			<a class="reply_edit" href="javascript:;"> [수정] </a>
			<a class="reply_delete" href="javascript:;"> [삭제]</a>
			<a class="rreply" href="javascript:;"> [대댓글 작성]</a>
		</div>


		<div class="comment"><?php echo nl2br("$strreply_comment"); ?></div>

<hr class="line"/>
