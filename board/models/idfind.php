<!DOCTYPE html>
<html lang="ko">
 
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="http://phpsample.ybmnet.co.kr/board/resources/css/logincheck.css?after" type="text/css">

</head>
<body>

<?php
	// 해당 view에서 아이디 찾기 버튼을 누르면 (이름, 생년월일, 전화번호)를 입력받아 controls폴더에 있는 idfinder파일로 이동할 것이다.
    include "../views/idfindform_view.php";
?>

    
<?php
	if(isset($_POST['idfindbtn']))
	{
		$strusername = $_POST['strusername'];
		$intuserbirth = $_POST['intuserbirth'];
		$intphonenum = $_POST['intuserphone'];

		include "../controls/idfinder_proc.php";
	}
?>
	

</body>
</html>