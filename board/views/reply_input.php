<div class="reply_input">

	<form enctype='multipart/form-data' action='http://phpsample.ybmnet.co.kr/board/controls/reply_insert_proc.php' method = post>
		<input type = "hidden" name="intboardnumber" value="<?php echo $intboardnumber; ?>" >
		<textarea class="reply_in" name="reply_input" ></textarea>
		<button type="submit" name="reply_save">작성</button>
	</form>

</div>