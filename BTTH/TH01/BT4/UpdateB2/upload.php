<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileContent = file_get_contents($fileTmpPath);

        // Tách từng câu hỏi
        $questions = explode("\n\n", $fileContent);

        $insertedCount = 0;
        foreach ($questions as $questionBlock) {
            $lines = explode("\n", trim($questionBlock));
            if (count($lines) < 6) continue;

            $questionText = trim(substr($lines[0], strpos($lines[0], ":") + 1));
            $optionA = trim(substr($lines[1], 3));
            $optionB = trim(substr($lines[2], 3));
            $optionC = trim(substr($lines[3], 3));
            $optionD = trim(substr($lines[4], 3));
            $correctAnswer = trim(substr($lines[5], strpos($lines[5], ":") + 1));

            // Lưu vào cơ sở dữ liệu
            $stmt = $conn->prepare("INSERT INTO questions (question, option_a, option_b, option_c, option_d, correct_answer) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $questionText, $optionA, $optionB, $optionC, $optionD, $correctAnswer);
            if ($stmt->execute()) {
                $insertedCount++;
            }
            $stmt->close();
        }

        echo "<p>Đã upload thành công $insertedCount câu hỏi.</p>";
    } else {
        echo "<p>File tải lên không hợp lệ.</p>";
    }
}
?>
