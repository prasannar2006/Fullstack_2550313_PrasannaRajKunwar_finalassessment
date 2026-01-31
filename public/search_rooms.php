<?php
require '../config/db.php';

$q = "%" . ($_GET['q'] ?? '') . "%";

$stmt = $pdo->prepare(
  "SELECT * FROM rooms 
   WHERE room_number LIKE ? OR room_type LIKE ?"
);
$stmt->execute([$q, $q]);

foreach ($stmt as $room) {
    echo "<tr>
        <td>".htmlspecialchars($room['room_number'])."</td>
        <td>".htmlspecialchars($room['room_type'])."</td>
        <td>".htmlspecialchars($room['capacity'])."</td>
        <td>".htmlspecialchars($room['price'])."</td>
        <td>
            <a href='edit_room.php?id={$room['id']}'>Edit</a> |
            <a href='delete_room.php?id={$room['id']}'
               onclick='return confirm(\"Delete?\")'>Delete</a>
        </td>
    </tr>";
}
