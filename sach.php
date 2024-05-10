<?php
// Kết nối đến cơ sở dữ liệu
$servername = "mysql-33bcb034-chungacc145-ab26.l.aivencloud.com";
$username = "avnadmin";
$password = "AVNS_uRl7aY2K7mQJ29CAcDy";
$database = "QUANLYSACdefaultdbH";
$port = 10050;

try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$database;charset=utf8mb4", $username, $password);
    // Thiết lập chế độ báo lỗi và chế độ tùy chỉnh
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Truy vấn để lấy 5 dòng dữ liệu từ bảng Sach
    $stmt = $conn->query("SELECT * FROM Sach LIMIT 5");
    $sachs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sách</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Danh sách sách</h2>
    <table>
        <thead>
            <tr>
                <th>Mã sách</th>
                <th>Tên sách</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sachs as $sach) { ?>
                <tr>
                    <td><?php echo $sach['MaSach']; ?></td>
                    <td><?php echo $sach['TenSach']; ?></td>
                    <td><?php echo $sach['SoLuong']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
