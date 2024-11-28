<!DOCTYPE html>
<html>
<head>
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
            $filename = 'KTPM3_Danh_sach_diem_danh.csv';

            if (($handle = fopen($filename, 'r')) !== false) {
                $headers = fgetcsv($handle);

                while (($row = fgetcsv($handle)) !== false) {
                    echo "<tr>";
                    foreach ($row as $cell) {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                    echo "</tr>";
                }
                fclose($handle);
            } else {
                echo "<tr><td colspan='7'>Không thể mở tệp CSV.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>