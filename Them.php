<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Thêm sách</title>
</head>
<body>
<center>
    <h3>Thêm sách</h3>
    <form action="Them.php" method="post">
        <table border="1" width="350">
            <tr>
                <td>Mã sách:</td>
                <td><input type="text" name="txtMa" value="s01" /></td>
            </tr>
            <tr>
                <td>Tên sách:</td>
                <td><input type="text" name="txtTen" value="Lập trình Web" /></td>
            </tr>
            <tr>
                <td>Năm xuất bản:</td>
                <td><input type="text" name="txtNamXB" value="2020" /></td>
            </tr>
            <tr>
                <td>Số trang:</td>
                <td><input type="text" name="txtSoTrang" value="120" /></td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td><input type="text" name="txtDongia" value="40000" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnThem" value="Thêm" />
                </td>
            </tr>
        </table>
    </form>

<?php
if (isset($_POST["btnThem"])) {
    $ma = $_POST["txtMa"];
    $ten = $_POST["txtTen"];
    $nam = $_POST["txtNamXB"];
    $trang = $_POST["txtSoTrang"];
    $gia = $_POST["txtDongia"];

    $con = mysqli_connect('localhost', 'root', '');
    if (!$con) {
        echo "Kết nối thất bại!";
    } else {
        mysqli_select_db($con, "DE2");
        mysqli_query($con, "SET NAMES 'utf8'");

        // Kiểm tra trùng tên sách
        $check = mysqli_query($con, "SELECT * FROM SACH WHERE TenSach = '$ten'");
        if (mysqli_num_rows($check) > 0) {
            echo "<script>alert('Trùng Tên sách! Không được thêm.');</script>";
        } else {
            $sql = "INSERT INTO SACH (MaSach, TenSach, NamXuatBan, SoTrang, Dongia) 
                    VALUES ('$ma', '$ten', '$nam', '$trang', '$gia')";
            mysqli_query($con, $sql);
            echo "<p>Thêm thành công!</p>";
        }
    }
}
?>

    <p>
        <a href="Danhsach.php">Danh sách</a> &nbsp;&nbsp;&nbsp;
        <a href="Tim.php">Tìm</a>
    </p>
</center>
</body>
</html>