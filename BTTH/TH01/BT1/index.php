<?php include 'data.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>BT1</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .flower { display: flex; margin-bottom: 20px; }
        .flower img { width: 150px; height: 150px; margin-right: 20px; }
        .flower .info { max-width: 600px; }
    </style>
</head>
<body>
    <h1>Danh sách hoa</h1>
    <?php foreach ($flowers as $flower): ?>
        <div class="flower">
            <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>">
            <div class="info">
                <h2><?php echo $flower['name']; ?></h2>
                <p><?php echo $flower['description']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</body>
</html>