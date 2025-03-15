<?php
session_start();
include 'includes/db_connect.php';

$user_id = $_SESSION['user_id'];
$quiz_id = $_GET['quiz_id'];

$result = $conn->query("SELECT score FROM results WHERE user_id = $user_id AND quiz_id = $quiz_id ORDER BY date_taken DESC LIMIT 1");
$score = $result->fetch_assoc()['score'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz Results</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Your Score: <?= $score ?></h2>
    <a href="dashboard.php" class="btn">Back to Dashboard</a>
</body>
</html>
