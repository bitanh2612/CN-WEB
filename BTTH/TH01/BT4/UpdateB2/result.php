<?php
include 'db.php';

$result = $conn->query("SELECT * FROM questions ORDER BY RAND() LIMIT 5");
$questions = $result->fetch_all(MYSQLI_ASSOC);

$score = 0;
foreach ($questions as $index => $question) {
    $userAnswer = $_POST["question" . ($index + 1)] ?? '';
    if ($userAnswer === $question['correct_answer']) {
        $score++;
    }
}

$totalQuestions = count($questions);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả</title>
</head>
<body>
    <h1>Kết Quả</h1>
    <p>Bạn trả lời đúng <?php echo $score; ?>/<?php echo $totalQuestions; ?> câu.</p>
    <a href="index.php">Làm lại</a>
</body>
</html>
