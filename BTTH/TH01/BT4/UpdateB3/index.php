<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>BT3</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Danh Sách Sinh Viên</h1>
    <table>
        <thead>
            <tr>
                <th>Tài Khoản</th>
                <th>Mật Khẩu</th>
                <th>Họ Tên Đệm</th>
                <th>Tên</th>
                <th>Quê Quán</th>
                <th>Email</th>
                <th>Khoá Học</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT username, password, lastname, firstname, city, email, course FROM students";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['city']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['course']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Không có dữ liệu.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
