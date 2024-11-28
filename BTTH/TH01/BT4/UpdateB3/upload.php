<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        if ($fileExtension === 'csv') {
            if (($handle = fopen($fileTmpPath, 'r')) !== false) {
                $headers = fgetcsv($handle); // Đọc dòng tiêu đề
                while (($row = fgetcsv($handle)) !== false) {
                    // Chuẩn bị câu lệnh SQL để chèn dữ liệu
                    $stmt = $conn->prepare("INSERT INTO students (username, password, lastname, firstname, city, email, course) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssssss", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
                    $stmt->execute();
                }
                fclose($handle);

                echo "Upload và lưu dữ liệu thành công.";
            } else {
                echo "Không thể mở file CSV.";
            }
        } else {
            echo "Vui lòng upload file CSV.";
        }
    } else {
        echo "Không có file nào được tải lên hoặc xảy ra lỗi.";
    }
}
?>
