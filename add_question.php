<?php
session_start();
include 'includes/db_connect.php';

if ($_SESSION['role'] !== 'admin') {
    die("Access denied!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quiz_id = $_POST['quiz_id'];
    $question_text = $_POST['question_text'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $correct_option = $_POST['correct_option'];

    $sql = "INSERT INTO questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option) 
            VALUES ('$quiz_id', '$question_text', '$option_a', '$option_b', '$option_c', '$option_d', '$correct_option')";

    if ($conn->query($sql)) {
        echo "Question added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="post">
    <input type="hidden" name="quiz_id" value="<?= $_GET['quiz_id'] ?>">
    <textarea name="question_text" placeholder="Enter Question" required></textarea>
    <input type="text" name="option_a" placeholder="Option A" required>
    <input type="text" name="option_b" placeholder="Option B" required>
    <input type="text" name="option_c" placeholder="Option C" required>
    <input type="text" name="option_d" placeholder="Option D" required>
    <select name="correct_option">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
    </select>
    <button type="submit">Add Question</button>
</form>
