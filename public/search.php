<?php
include '../config/db.php';

$q = "%" . $_GET['q'] . "%";
$stmt = $pdo->prepare("SELECT * FROM rooms WHERE room_name LIKE ? OR room_type LIKE ?");
$stmt->execute([$q, $q]);
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rooms as $room) {
    echo "<p>" . htmlspecialchars($room['room_name']) . " - $" . htmlspecialchars($room['price_per_night']) . "</p>";
}
