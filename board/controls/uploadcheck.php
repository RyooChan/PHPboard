<?php	// php가 맨 위에 있지 않으면 txt이외의 파일을 사용할 때에 오류가 나니까 조심해야한다.

	// 사진은 따로 저장한다. 나중에 사진은 그냥 다운로드 없이 보이는 기능을 구현하고 싶어서 미리 코드를 분리해 놓음.
	$picture_type = array('jpg', 'jpeg', 'png', 'gif', 'PNG');

	// 변수 정리
	$error = $_FILES['upload_file']['error'];
	$name = $_FILES['upload_file']['name'];

	// 파일에 날짜정보를 받아와서 년월일시분초_파일이름으로 구현하였다. 동일한 이름의 파일이 저장되는 것을 방지하기 위해서이다.
	$strfile_name =  date("YmdHis")."_".$name;

	// 확장자명을 따로 분리하여 저장하는 ext변수.
	$ext = array_pop(explode('.', $name));
	 
	// 오류 확인 메세지 출력 후 탈출.
	if( $error != UPLOAD_ERR_OK ) 
	{
		switch( $error ) 
		{
			case UPLOAD_ERR_INI_SIZE:		// 내 최대 업로드 사이즈는 2M이다.
			case UPLOAD_ERR_FORM_SIZE:		// 류찬php 최대 업로드 사이즈 초과, 혹은 html최대 사이즈 초과 중 어떤 것이든 간에 같은 에러 메세지를 출력할 것이다.
				echo "파일이 너무 큽니다. ($error)";
				break;
			default:						// 다른 에러는 그냥 업로드 오류로 통합했다.
				echo "업로드 오류. ($error)";
		}
		exit;
	}
	 
	// 확장자 확인
	if( !in_array($ext, $picture_type) )		// 사진 파일이 아닌 경우 그냥 files에 저장, 파일타입은 1.
	{
		$intfiletype = 1;
		$strfile_directory = "../resources/uploads/files";
	}
	else										// 사진 파일인 경우 pictures에 저장, 파일타입은 2.
	{
		$intfiletype = 2;
		$strfile_directory = "../resources/uploads/pictures";
	}

	// 전부 끝나고 나면 파일을 해당하는 디렉터리에 저장시킨다.
	move_uploaded_file( $_FILES['upload_file']['tmp_name'], "$strfile_directory/$strfile_name");
?>