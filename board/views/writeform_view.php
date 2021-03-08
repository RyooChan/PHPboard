<!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
<div class='board_whole_area'>
	<h1>  <a href="http://phpsample.ybmnet.co.kr/board/models/logincheck.php" target="_self" class='subtitle' >YBM Net</a> </h1>
    
    <form enctype='multipart/form-data' action='http://phpsample.ybmnet.co.kr/board/models/write.php' method='post'>

    <table>
        <!-- 입력 부분 -->

        <tr >
            <td colspan="2" class="title">
				<font color=white><B>글 쓰 기</B></font>
            </td>
        </tr>

		<tr>
            <td ><br/></td>
        </tr>

        <tr>
            <td class="board_subtitle">제 목</td>
        </tr>

        <tr>
            <td class="board_title" colspan="2" >
            	<INPUT type=text class="board_title" name="boardtitle">
            </td>
        </tr>

        <tr>
            <td class="board_subtitle" class='boardin'>내 용</td>
        </tr>

        <tr>
            <td class='boardin'>
				<TEXTAREA name="boardcontent" id="boardcontent" class='boardin' ></TEXTAREA>

				<!-- 위의 TEXTAREA boardcontent를 감싸줄 Editor skin의 적용을 위한 코드이다. -->
				<script type="text/javascript">
				var oEditors = [];
				nhn.husky.EZCreator.createInIFrame({
				oAppRef: oEditors,
				elPlaceHolder: "boardcontent",
				sSkinURI: "../resources/demo/SmartEditor2Skin.html",
				fCreator: "createSEditor2"
				});
				
				// 자바스크립트 내에서 실제로 기능이 사용되는 코드이다.
				function submitContents(elClickedObj) {
					// 에디터의 내용이 textarea(boardcontent)에 적용된다.
					oEditors.getById["boardcontent"].exec("UPDATE_CONTENTS_FIELD", []);
					// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("boardcontent").value를 이용해서 처리.
	 
					try {
						elClickedObj.form.submit();
					} catch(e) {}
				}
				</script>
				<!-- 이후로 form에서 제출할 때에 추가로 onclick="submitContents(this)"를 진행해 주어야 한다. -->

            </td>
        </tr>

        <tr>
            <td>
				<INPUT type="checkbox" name="anonymous_check" value="anonymous_check">익명
                        &nbsp;&nbsp;
				<INPUT type="file" name="upload_file">

				<INPUT type=submit name="save" value="글 저장하기" onclick="submitContents(this)">
                        &nbsp;&nbsp;
                <INPUT type=reset value="다시 쓰기">
                        &nbsp;&nbsp;
                <INPUT type=button value="되돌아가기"
                        onclick="history.back(-1)"> <!--버튼이 클릭되었을때 발생하는 이벤트로 자바스크립트를 실행함. 이렇게 하면 바로 이전페이지로 감-->
            </td>
        </tr>

     </table>

    </form>
</div>