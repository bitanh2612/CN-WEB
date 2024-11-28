<?php
include 'db.php';

if (!isset($_GET['name'])) {
    die("Tên hoa không hợp lệ.");
}

$name = urldecode($_GET['name']);
$sql = "DELETE FROM flowers WHERE name='$name'";

if ($conn->query($sql) === TRUE) {
    header("Location: admin.php");
    exit();
} else {
    echo "Lỗi: " . $conn->error;
}
?>
