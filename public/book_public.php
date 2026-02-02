<?php
require '../config/db.php';
require '../includes/functions.php';

$message = "";

/* Handle booking submission */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    verify_csrf();

    $room_id = $_POST['room_id'];
    $occupant_name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    /* Insert occupant */
    $stmt = $pdo->prepare(
        "INSERT INTO occupants (full_name, email, phone)
         VALUES (?, ?, ?)"
    );
    $stmt->execute([$occupant_name, $email, $phone]);
    $occupant_id = $pdo->lastInsertId();

    /* Insert booking */
    $stmt = $pdo->prepare(
        "INSERT INTO bookings (room_id, occupant_id, check_in, check_out)
         VALUES (?, ?, ?, ?)"
    );
    $stmt->execute([$room_id, $occupant_id, $check_in, $check_out]);

    $message = "Booking successful!";
}

/* Fetch rooms */
$rooms = $pdo->query(
    "SELECT * FROM rooms ORDER BY room_number"
)->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book a Room</title>
    <link rel="stylesheet" href="/meridian_suite_hotel/assets/css/style.css">
</head>
<body>

<header>
    <h1>Meridian Suite Hotel</h1>
</header>

<div class="container">

    <h2>Book a Room</h2>

    <?php if ($message): ?>
        <p style="color:green;">
            <?= htmlspecialchars($message) ?>
        </p>
    <?php endif; ?>

    <p style="margin-bottom:20px;">
        <a href="home.php" class="btn">← Back to Home</a>
    </p>

    <form method="post">
        <input type="hidden" name="csrf" value="<?= csrf_token() ?>">

        <label>Full Name</label>
        <input name="name" required>

        <label>Email</label>
        <input name="email" required>

        <label>Phone</label>
        <input name="phone" required>

        <label>Room</label>
        <select name="room_id" required>
            <?php foreach ($rooms as $r): ?>
                <option value="<?= $r['id'] ?>">
                    Room <?= htmlspecialchars($r['room_number']) ?> –
                    <?= htmlspecialchars($r['room_type']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Check-in Date</label>
        <input type="date" name="check_in" required>

        <label>Check-out Date</label>
        <input type="date" name="check_out" required>

        <button>Confirm Booking</button>
    </form>

</div>

<footer>
    <p>&copy; <?= date('Y') ?> Meridian Suite Hotel</p>
</footer>

</body>
</html>
