<?php 
	// 1. Chuỗi kết nối đến CSDL
	$ket_noi = mysqli_connect("localhost", "root", "", "ngocpet");
            mysqli_set_charset($ket_noi, 'UTF8');
            if (mysqli_connect_errno()) 
            {
            echo 'Failed to connect to Mysql : '.$mysqli_connect_errno();
            }

	// 2. Lấy ra lấy dữ liệu thu được từ FORM chuyển sang
	$id_tin_tuc = $_POST["txtID"];
	$tieu_de = $_POST["txtTieuDe"];
	$mo_ta = $_POST["txtMoTa"];
	$noi_dung = $_POST["txtNoiDung"];

	//  Lấy ra thông tin ảnh minh họa
	$anh_minh_hoa = "../img/".basename($_FILES["txtAnhMinhHoa"]["name"]);
	$file_anh_tam = $_FILES['txtAnhMinhHoa']["tmp_name"];
	$result = move_uploaded_file($file_anh_tam, $anh_minh_hoa);
	if(!$result) {
		$anh_minh_hoa = NULL;
	}

	// 3. Viết câu lệnh SQL để thêm mới tin tức vào CSDL
	if($anh_minh_hoa == NULL) {
		$sql = "
			UPDATE `tbl_tin_tuc` 
			SET
				`tieu_de` = '".$tieu_de."',
				`mo_ta` = '".$mo_ta."',
				`noi_dung` = '".$noi_dung."'
			WHERE `id_tin_tuc` = '".$id_tin_tuc."'
		";
	} else {
		$sql = "
			UPDATE `tbl_tin_tuc` 
			SET
				`tieu_de` = '".$tieu_de."',
				`mo_ta` = '".$mo_ta."',
				`noi_dung` = '".$noi_dung."',
				`anh_minh_hoa` = '".$anh_minh_hoa."'
			WHERE `id_tin_tuc` = '".$id_tin_tuc."'
		";
	}
	// echo $sql; exit();

	// 4. Thực hiện truy vấn để thêm mới tức trên
	mysqli_query($ket_noi, $sql);

	// 5. Thông báo việc thêm mới tin tức thành công & quay trở lại trang quản lý tin tức
		// Thông báo cho người dùng biết bài viết đã được thêm mới thành công
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã cập nhật bài viết thành công.');
			</script>
		";

		// Chuyển người dùng vào trang quản trị tin tức
		echo 
		"
			<script type='text/javascript'>
				window.location.href = './tt_listing.php'
			</script>
		";
;?>