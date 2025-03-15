<?php
session_start();
include 'includes/db_connect.php';

$user_id = $_SESSION['user_id'];
$quiz_id = $_POST['quiz_id'];
$score = 0;

$questions = $conn->query("SELECT * FROM questions WHERE quiz_id = $quiz_id");

while ($q = $questions->fetch_assoc()) {
    $question_id = $q['id'];
    $correct_option = $q['correct_option'];
    $user_answer = $_POST["q$question_id"] ?? '';

    if ($user_answer == $correct_option) {
        $score++;
    }
}

$conn->query("INSERT INTO results (user_id, quiz_id, score) VALUES ($user_id, $quiz_id, $score)");

header("Location: results.php?quiz_id=$quiz_id");
?>
