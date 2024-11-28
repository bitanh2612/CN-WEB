<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $sql = "INSERT INTO flowers (name, description, image) VALUES ('$name', '$description', '$image')";
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm mới hoa</title>
</head>
<body>
    <h1>Thêm mới hoa</h1>
    <form method="POST" action="">
        <label for="name">Tên hoa:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Mô tả:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="image">Đường dẫn ảnh:</label><br>
        <input type="text" id="image" name="image" required><br><br>

        <button type="submit">Thêm</button>
    </form>
</body>
</html>