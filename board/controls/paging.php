<?php
// 페이징을 위해 사용되는 부분. 총 7페이지, 현재 (+-3페이지)를 움직일 수 있도록 한다.

	if($intnowpage > 1)							// 현재 페이지가 2일 때부터 이전 페이지 등장
		$intbeforeone_now = $intnowpage - 1;
	if($intnowpage > 2)							// 현재 페이지가 3일 때부터 2이전 페이지 등장
		$intbeforetwo_now = $intnowpage - 2;
	if($intnowpage > 3)							// 현재 페이지가 4일 때부터 3이전 페이지 등장
		$intbeforethree_now = $intnowpage - 3;

	// 올림을 해주는 이유는 총페이지/한페이지 숫자를 구했을 때 예를 들어 2.2이면 2페이지, 2글이 된다. 22개의 글을 나타내야 하므로 10, 10, 2 이런식으로 저장하기 위해 올림을 해주었다.
	if($intnowpage < ceil($intpostnum / $intlist))		// 현재 페이지가 마지막 페이지보다 작을 때 다음 페이지 등장
		$intafterone_now = $intnowpage + 1;
	if($intnowpage < ceil($intpostnum / $intlist) - 1)	// 현재 페이지가 마지막 페이지보다 하나 더 작을 때 2다음 페이지 등장
		$intaftertwo_now = $intnowpage + 2;
	if($intnowpage < ceil($intpostnum / $intlist) - 2)	// 현재 페이지가 마지막 페이지보다 두개 더 작을 때 3다음 페이지 등장
		$intafterthree_now = $intnowpage + 3;
			
	
?>