<?php
require '../config/db.php';
require '../includes/functions.php';
checkAuth();
include '../includes/header.php';

$rooms = $pdo->query("SELECT * FROM rooms ORDER BY room_number")->fetchAll();
?>

<div class="container">

    <h2>Rooms</h2>

    <p>
        <a href="add_room.php" class="btn">+ Add Room</a>
    </p>

    <div class="search-box">
        <input type="text" id="roomSearch" placeholder="Search rooms...">
    </div>

    <table>
        <thead>
            <tr>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Capacity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($rooms as $room): ?>
                <tr>
                    <td><?= htmlspecialchars($room['room_number']) ?></td>
                    <td><?= htmlspecialchars($room['room_type']) ?></td>
                    <td><?= htmlspecialchars($room['capacity']) ?></td>
                    <td><?= htmlspecialchars($room['price']) ?></td>

                    <td class="actions">
                        <a
                            href="edit_room.php?id=<?= $room['id'] ?>"
                            class="btn btn-edit"
                        >
                            Edit
                        </a>

                        <form
                            method="post"
                            action="delete_room.php"
                            class="inline-form"
                            onsubmit="return confirm('Delete this room?')"
                        >
                            <input type="hidden" name="csrf" value="<?= csrf_token() ?>">
                            <input type="hidden" name="id" value="<?= $room['id'] ?>">

                            <button type="submit" class="btn btn-delete">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php include '../includes/footer.php'; ?>
