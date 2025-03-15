<?php
session_start();
include 'includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$quizzes = $conn->query("SELECT * FROM quizzes");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Welcome</h2>
    <a href="logout.php" class="btn">Logout</a>
    <h3>Available Quizzes</h3>
    <ul>
        <?php while ($quiz = $quizzes->fetch_assoc()): ?>
            <li>
                <?= $quiz['title'] ?>
                <a href="quiz.php?quiz_id=<?= $quiz['id'] ?>" class="btn">Start Quiz</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
