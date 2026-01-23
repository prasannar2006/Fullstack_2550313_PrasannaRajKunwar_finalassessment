<?php
require '../config/db.php';

$in = $_GET['in'];
$out = $_GET['out'];

$stmt = $pdo->prepare("
SELECT * FROM rooms WHERE id NOT IN (
    SELECT room_id FROM bookings
    WHERE check_in < ? AND check_out > ?
)
");
$stmt->execute([$out, $in]);

foreach ($stmt as $r) {
    echo "<p>{$r['room_number']} ({$r['room_type']})</p>";
}
