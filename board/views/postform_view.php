
<div class="board_whole_area"> 
	<h1>  <a href="http://phpsample.ybmnet.co.kr/board/models/logincheck.php" target="_self" class='subtitle' >YBM Net</a> </h1>
			<table class="list-table">
			  <thead>
				  <tr>
					  <th class='board_num'><?php echo $intboardnumber ?></th>
				      <th class='board_title'><?php echo $strtitle ?></th>
					  <th class='board_writer'><?php echo $strwriter ?></th>
				  </tr>
			  </thead>

			  <tbody>
				<tr>
					<!-- n12br쓰면 줄바꿈 됨 -->
					<td colspan='3' ><?php echo nl2br($strcontent) ?></td>
				</tr>
			  </tbody>

			  
			  <tbody>
				<tr>
					<!-- 업로드 된 파일의 이름을 보여주고, 그 파일을 클릭하면 밑의 숨겨진 download_confirm_zone을 보여준다.   -->
					<th colspan='3' >첨부파일 ) <a class="download" href="#" ><?php echo ($strfilename) ?></a></td>
				</tr>
			  </tbody>


			</table>

			<!-- 원래 바로 download url에 게시판 번호를 get으로 보내서 다운로드 하게 만들려 하였는데, 게시판 구현에서 세션이 있어야 게시판을 이용할 수 있는데 get방식을 사용하면 로그인 되어있지 않아도 다운로드 가능하여 post사용과 동적구현으로 변경하였다.   -->
			<div class="download_confirm_zone">
				<form method="post" action="http://phpsample.ybmnet.co.kr/board/controls/download_proc.php">
					<input type = "hidden" name="boardnumber" value="<?php echo $intboardnumber; ?>" >
					<input type = "submit" name="file_download"  value="다운로드 하시겠습니까?">
				</form>
			</div>

</div>

	<!-- 목록, 수정, 삭제 -->
		<div class="post_additional">
			<ul>
				<a href="http://phpsample.ybmnet.co.kr/board/models/board.php/">  [목록으로]</a>
				<a href="http://phpsample.ybmnet.co.kr/board/models/post_edit.php/?idx=<?php echo $intboardnumber; ?>">  [수정]</a>
				<a href="http://phpsample.ybmnet.co.kr/board/models/post_delete.php/?idx=<?php echo $intboardnumber; ?>">  [삭제]</a> <!-- 내글이면 지워지도록 할것 -->
			</ul>
		</div>

