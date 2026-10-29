<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tìm kiếm sách</title>
</head>
<body>
<center>
    <form action="Tim.php" method="post">
        <table border="1">
            <tr>
                <td>Nhập vào năm xuất bản cần tìm:</td>
                <td><input type="text" name="txtNam" value="2020" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnTim" value="Tìm" />
                </td>
            </tr>
        </table>
    </form>

    <p><a href="Danhsach.php">Danh sách</a></p>

<?php
if (isset($_POST["btnTim"])) {
    $nam = $_POST["txtNam"];

    $con = mysqli_connect('localhost', 'root', '');
    if (!$con) {
        echo "Kết nối thất bại!";
    } else {
        mysqli_select_db($con, "DE2");
        mysqli_query($con, "SET NAMES 'utf8'");

        $sql = "SELECT * FROM SACH WHERE NamXuatBan = '$nam'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
?>
    <table border="1" width="550">
        <tr bgcolor="#f2f2f2">
            <th>Mã sách</th>
            <th>Tên sách</th>
            <th>Năm XB</th>
            <th>Số trang</th>
            <th>Đơn giá</th>
        </tr>
<?php
            while ($row = mysqli_fetch_array($result)) {
?>
        <tr align="center">
            <td><?php echo $row["MaSach"]; ?></td>
            <td align="left"><?php echo $row["TenSach"]; ?></td>
            <td><?php echo $row["NamXuatBan"]; ?></td>
            <td><?php echo $row["SoTrang"]; ?></td>
            <td><?php echo $row["Dongia"]; ?></td>
        </tr>
<?php
            }
?>
    </table>
    <p><a href="Danhsach.php">Danh sách</a></p>
<?php
        } else {
            echo "<p>Không tìm thấy sách nào xuất bản năm $nam!</p>";
        }
    }
}
?>
</center>
</body>
</html>