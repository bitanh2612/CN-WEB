<?php
include 'db.php';

$result = $conn->query("SELECT * FROM questions ORDER BY RAND() LIMIT 5");
$questions = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>BT2 - Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Bài Kiểm Tra</h1>

    <form method="POST" action="result.php">
        <?php foreach ($questions as $index => $question): ?>
            <div class="card mb-4">
                <div class="card-header">
                    <strong><?php echo htmlspecialchars($question['question']); ?></strong>
                </div>
                <div class="card-body">
                    <?php foreach (['A', 'B', 'C', 'D'] as $option): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" 
                                   name="question<?php echo $index + 1; ?>" 
                                   value="<?php echo $option; ?>" 
                                   id="question<?php echo $index + 1 . $option; ?>">
                            <label class="form-check-label" 
                                   for="question<?php echo $index + 1 . $option; ?>">
                                <?php echo htmlspecialchars($question['option_' . strtolower($option)]); ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary btn-lg">Nộp bài</button>
    </form>
</div>
</body>
</html>
