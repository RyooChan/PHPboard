<!DOCTYPE html>
<html lang="ko">
 
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="http://phpsample.ybmnet.co.kr/board/resources/css/logincheck.css?after" type="text/css">

</head>
<body>

<?php
	// 해당 view에서 버튼 클릭시 controls에 있는 passfinder로 이동한다.
    include "../views/passfindform_view.php";
?>

<?php
	if(isset($_POST['passfindbtn']))
	{
        $strusername = $_POST['strusername'];
        $intuserbirth = $_POST['intuserbirth'];
        $intphonenum = $_POST['intuserphone'];
		$struserid = $_POST['struserid'];
		$struserpass = $_POST['strpassword'];
		$struserpass_confirm = $_POST['strpassword_confirm']; 

		include "../controls/passfinder_proc.php";
	}

?>

    
</body>
</html>