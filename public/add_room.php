<?php
require '../config/db.php';
require '../includes/functions.php';
checkAuth();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $pdo->prepare("INSERT INTO rooms VALUES (NULL,?,?,?,?)")
        ->execute([
            $_POST['room_number'],
            $_POST['room_type'],
            $_POST['capacity'],
            $_POST['price']
        ]);
    header("Location: rooms.php");
}
?>

<form method="post">
<input name="room_number" placeholder="Room No">
<input name="room_type">
<input name="capacity">
<input name="price">
<input type="hidden" name="csrf" value="<?= csrf_token() ?>">
<button>Add</button>
</form>
