<?php
require '../config/db.php';
require '../includes/functions.php';
checkAuth();

$id = $_GET['id'];
$r = $pdo->prepare("SELECT * FROM rooms WHERE id=?");
$r->execute([$id]);
$room = $r->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $pdo->prepare(
        "UPDATE rooms SET room_number=?, room_type=?, capacity=?, price=? WHERE id=?"
    )->execute([
        $_POST['room_number'],
        $_POST['room_type'],
        $_POST['capacity'],
        $_POST['price'],
        $id
    ]);
    header("Location: rooms.php");
}
?>

<form method="post">
<input name="room_number" value="<?= $room['room_number'] ?>">
<input name="room_type" value="<?= $room['room_type'] ?>">
<input name="capacity" value="<?= $room['capacity'] ?>">
<input name="price" value="<?= $room['price'] ?>">
<input type="hidden" name="csrf" value="<?= csrf_token() ?>">
<button>Update</button>
</form>
