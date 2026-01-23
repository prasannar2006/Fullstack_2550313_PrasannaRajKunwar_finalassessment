<?php
include '../config/db.php';
include '../includes/header.php';

$stmt = $pdo->query("SELECT * FROM rooms");
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Our Rooms</h2>

<input type="text" id="search" placeholder="Search rooms...">

<div id="results">
<div class="container">
    <h2>Our Rooms</h2>

    <input type="text" id="search" placeholder="Search rooms...">

    <div id="results" class="room-grid">
        <?php foreach ($rooms as $room): ?>
            <div class="room-card">
                <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85" alt="Room Image">
                <div class="content">
                    <h3><?= htmlspecialchars($room['room_name']) ?></h3>
                    <p><?= htmlspecialchars($room['description']) ?></p>
                    <div class="price">$<?= htmlspecialchars($room['price_per_night']) ?> / night</div>

                    <a class="btn" href="edit_room.php?id=<?= $room['id'] ?>">Edit</a>
                    <a class="btn" href="delete_room.php?id=<?= $room['id'] ?>" 
                       onclick="return confirm('Delete this room?')">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</div>

<?php include '../includes/footer.php'; ?>
