<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload File CSV</title>
</head>
<body>
    <h1>Upload File CSV</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" accept=".csv" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
