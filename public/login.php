<?php
require '../config/db.php';
require '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit;
    }
}
?>

<form method="post">
<h2>Meridian Suite Hotel – Login</h2>
<input name="username" required>
<input type="password" name="password" required>
<button>Login</button>
</form>
