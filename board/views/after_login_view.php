<div class="login_whole" >
	<h1>  <a href="http://phpsample.ybmnet.co.kr/board/models/logincheck.php" target="_self" class='subtitle' >YBM Net</a> </h1>
	<!-- 로그인 후 로그아웃 / 탈퇴 / 게시판 입장에 사용되는 HTML부분  -->
	<form method='post' action='http://phpsample.ybmnet.co.kr/board/models/logincheck.php'> 
		<table > 
		<colgroup> <col class="col1"> <col class="col2"> </colgroup>

		
		<!-- table생성 -->
			<tr> <!-- table 1행 생성 -->

				<td colspan="2"> <!-- 게시판 입장 버튼 -->
					<button type="submit" class="entrybtn" name="entry">게시판 입장</button>
				</td>
	 
			</tr>
	 
	 
			<tr><!-- table 2행 생성 -->

				<td class="logout"> <!-- 로그아웃 버튼 -->
					<button type="submit" name="logout">Log-out</button>
				</td>

			   <td class="regist"><!-- 회원 탈퇴 버튼 -->
				  <a href="http://phpsample.ybmnet.co.kr/board/models/withdraw.php" target="_self"> 탈퇴하기   </p> 
			   </td>

			</tr>

		</table>

	</form>
</div>