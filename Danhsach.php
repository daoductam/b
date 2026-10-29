<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Danh sách mặt hàng</title>
    <!-- Câu 4: CSS định dạng dòng tiêu đề bảng và chữ cột Số trang màu đỏ -->
    <style>
        .tieude {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .do {
            color: red;
        }
    </style>
</head>
<body>
<center>
    <h3>Danh sách mặt hàng</h3>
    <table border="1" width="550" align="center">
        <tr class="tieude">
            <th>Mã sách</th>
            <th>Tên sách</th>
            <th>Năm XB</th>
            <th class="do">Số trang</th>
            <th>Đơn giá</th>
        </tr>
<?php
$con = mysqli_connect('localhost', 'root', '');
if (!$con) {
    echo "Kết nối thất bại!";
} else {
    mysqli_select_db($con, "DE2");
    mysqli_query($con, "SET NAMES 'utf8'");

    $sql = "SELECT * FROM SACH";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($result)) {
?>
        <tr align="center">
            <td><?php echo $row["MaSach"]; ?></td>
            <td align="left"><?php echo $row["TenSach"]; ?></td>
            <td><?php echo $row["NamXuatBan"]; ?></td>
            <td class="do"><?php echo $row["SoTrang"]; ?></td>
            <td><?php echo $row["Dongia"]; ?></td>
        </tr>
<?php
    }
}
?>
    </table>

    <p>
        <a href="Them.php">Thêm</a> &nbsp;&nbsp;&nbsp;
        <a href="Tim.php">Tìm</a>
    </p>
</center>
</body>
</html>