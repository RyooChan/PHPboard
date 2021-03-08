<div class="login_whole" >
	<h1>  <a href="http://phpsample.ybmnet.co.kr/board/models/logincheck.php" target="_self" class='subtitle' >YBM Net</a> </h1>
    
    <form method='post' action='http://phpsample.ybmnet.co.kr/board/models/passfind.php'> 
        
        <fieldset>
            <legend>비밀번호는 변경만 지원됩니다</legend>
            <!-- id찾기에 활용되는 html부분 -->

                <table><!-- table생성 -->

                <tr><!-- table 1행 생성 -->
                    <td>이름</td>
                    <td><input type="text" name="strusername" placeholder="이름"></td>
                </tr>

                <tr><!-- table 2행 생성 -->
                    <td>생년월일</td>
                    <td><input type="text" name="intuserbirth" placeholder="YYMMDD"></td>
                </tr>                
                
                <tr><!-- table 3행 생성 -->
                    <td>전화번호</td>
                    <td><input type="text" name="intuserphone" placeholder="010xxxxxxxx"></td>
                </tr>

                <tr><!-- table 4행 생성 -->
                    <td>ID</td>
                    <td><input type="text" name="struserid" placeholder="ID입력"></td>
                </tr>

				
                <tr><!-- table 5행 생성 -->
                    <td>변경할 비밀번호 입력</td>
                    <td><input type="password" name="strpassword" placeholder="비밀번호 입력"></td>
                </tr>

                <tr><!-- table 6행 생성 -->
                    <td>비밀번호 확인</td>
                    <td><input type="password" name="strpassword_confirm" placeholder="비밀번호 확인"></td>
                </tr>

                </table>

            <button type="button" onclick=" location.href='logincheck.php' ">돌아가기</button>
            <input type="submit" name="passfindbtn" value="비밀번호 변경" />
            
        </fieldset>
        
    </form>
</div>
