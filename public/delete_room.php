<?php
require '../config/db.php';
$id = $_GET['id'];
$pdo->prepare("DELETE FROM rooms WHERE id=?")->execute([$id]);
header("Location: rooms.php");
