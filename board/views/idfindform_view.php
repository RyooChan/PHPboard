<div class="login_whole" >
	<h1>  <a href="http://phpsample.ybmnet.co.kr/board/models/logincheck.php" target="_self" class='subtitle' >YBM Net</a> </h1>
    
    <form method='post' action='http://phpsample.ybmnet.co.kr/board/models/idfind.php'> 
        
        <fieldset>
            <legend>아이디 찾기</legend>
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
	

                </table>

            <button type="button" onclick=" location.href='http://phpsample.ybmnet.co.kr/board/models/logincheck.php' ">돌아가기</button>
            <input type="submit" name="idfindbtn" value="아이디 찾기" />
            
        </fieldset>
        
    </form>
</div>
