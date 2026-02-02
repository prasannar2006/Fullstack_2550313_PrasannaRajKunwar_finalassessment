<?php
require '../config/db.php';
require '../includes/functions.php';

checkAuth();
verify_csrf();

$id = $_POST['id'];

$stmt = $pdo->prepare("DELETE FROM rooms WHERE id = ?");
$stmt->execute([$id]);

header("Location: rooms.php");
exit;
