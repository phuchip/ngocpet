<?php
include 'header.php';
?>

<body>

<h1 style="text-align: center; color: red; font=font-weight: bold; padding-bottom: 30px;">QUẢN TRỊ TIN TỨC</h1>
    <p style="text-align: right; font-weight: bold;"><a href="./quan_tri_tin_tuc_them.php">Thêm mới</a></p>
    <table>
        <tr>
            <td style="font-weight: bold; text-align: center;">STT</td>
            <td style="font-weight: bold; text-align: center;">Ảnh minh họa</td>
            <td style="font-weight: bold; text-align: center;">Tiêu đề</td>
            <td style="font-weight: bold; text-align: center;" colspan="2">Thao tác</td>
        </tr>
        <?php 
            // 1. Chuỗi kết nối đến CSDL
            $ket_noi = mysqli_connect("localhost", "root", "", "ngocpet");
            mysqli_set_charset($ket_noi, 'UTF8');
            if (mysqli_connect_errno()) 
            {
            echo 'Failed to connect to Mysql : '.$mysqli_connect_errno();
            }

            // 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
            $sql = "
                SELECT *
                FROM tbl_tin_tuc
                ORDER BY id_tin_tuc DESC
            ";

            // 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
            $noi_dung_tin_tuc = mysqli_query($ket_noi, $sql);

            // 4. Hiển thị dữ liệu mong muốn
            $i=0;
            while ($row = mysqli_fetch_array($noi_dung_tin_tuc)) {
            $i++;
        ;?>
        <tr>
            <td><?=$i;?></td>
            <td><img src="../img/<?php 
                        if ($row["anh_minh_hoa"]<>"") {
                            echo $row["anh_minh_hoa"];
                        } else {
                            echo "no_image.png";
                        }
                    ;?>" width="180px" height="auto">
            </td>
            <td><?php echo $row["tieu_de"];?></td>
            <td><a href="./quan_tri_tin_tuc_sua.php?id=<?php echo $row["id_tin_tuc"];?>">Sửa</a></td>
            <td><a href="./quan_tri_tin_tuc_xoa.php?id=<?php echo $row["id_tin_tuc"];?>">Xóa</a></td>
        </tr>
        <?php
            }
        ;?>
    </table>
    <?php
include './footer.php';
?>