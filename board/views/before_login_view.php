<div class="login_whole" >
	<h1>  <a href="http://phpsample.ybmnet.co.kr/board/models/logincheck.php" target="_self" class='subtitle' >YBM Net</a> </h1>
	<!-- login / register / ID, PassWord finding에 사용되는 html부분 --> 
	<form method='post' action='http://phpsample.ybmnet.co.kr/board/models/logincheck.php'> 
		<table > 
		<colgroup> <col class="col1"> <col class="col2"> </colgroup>

		
		<!-- table생성 -->
			<tr> <!-- table 1행 생성 -->
				<td colspan="2" class="input"> <!-- E-Mail입력단(email형식으로 만들었음) -->
					<input class="input" type="email" name="struserid" placeholder="E-mail">
				</td>
	 
			</tr>
	 
			<tr> <!-- table 2행 생성 -->
				<td colspan="2" class="input"> <!-- password입력단 -->
					<input class="input" type="password" name="struserpass"  placeholder="password">
				</td>
			</tr>
	 
			<tr ><!-- table 3행 생성 -->
			   	<td colspan="2"  class="login"  >  <!-- 로그인 버튼 생성 -->
					<button class="login" name="login" type="submit">   Log-in   </button>
			    </td>
			</tr>

			<tr ><!-- table 4행 생성 -->
				<td class="reg_find">
				  <!-- 회원가입 문자 클릭시 register.php호출 -->
				  <a class="reg_find" name="regist" href="http://phpsample.ybmnet.co.kr/board/models/register.php" target="_self" >    회원가입   </p> 
				</td>

				<td class="reg_find">
				  <!-- 아이디, 비밀번호 찾기 -->
				  <a class="reg_find" name="find_id" href="http://phpsample.ybmnet.co.kr/board/models/idfind.php" target="_self" >    아이디/   </p> 
				  <a class="reg_find" name="find_pass" href="http://phpsample.ybmnet.co.kr/board/models/passfind.php" target="_self" >    비밀번호 찾기   </p> 
				  </td>
			</tr>

		</table>
				

	</form>
</div>

				