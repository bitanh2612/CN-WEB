<?php
include 'db.php';

if (!isset($_GET['name'])) {
    die("Tên hoa không hợp lệ.");
}

$name = urldecode($_GET['name']);
$sql = "SELECT * FROM flowers WHERE name='$name'";
$result = $conn->query($sql);

if ($result->num_rows !== 1) {
    die("Không tìm thấy hoa.");
}

$flower = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $sql = "UPDATE flowers SET name='$new_name', description='$description', image='$image' WHERE name='$name'";
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
    <title>Sửa hoa</title>
</head>
<body>
    <h1>Sửa hoa</h1>
    <form method="POST" action="">
        <label for="name">Tên hoa:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $flower['name']; ?>" required><br><br>

        <label for="description">Mô tả:</label><br>
        <textarea id="description" name="description" required><?php echo $flower['description']; ?></textarea><br><br>

        <label for="image">Đường dẫn ảnh:</label><br>
        <input type="text" id="image" name="image" value="<?php echo $flower['image']; ?>" required><br><br>

        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
