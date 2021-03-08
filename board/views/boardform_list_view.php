
<!-- 여기는 sql변수를 그대로 사용하였는데, sql변수가 돌아가는 쿼리의 while문 내에서 돌아가기 때문이다. -->
      <tbody>
        <tr>
          <td class='board_num'><?php echo $sqlboardnumber ?></td>
          <td class='board_title'><a href="http://phpsample.ybmnet.co.kr/board/models/post.php/?idx=<?php echo $sqlboardnumber;?>"><?php echo $sqlboardtitle ?></a></td>
          <td class='board_writer'><a href="http://phpsample.ybmnet.co.kr/board/models/board.php/?writersearch=<?php echo $sqlboardwriter;?>"><?php echo $sqlboardwriter ?></td>
        </tr>
      </tbody>
	  