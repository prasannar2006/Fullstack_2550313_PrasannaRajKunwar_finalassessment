<?php
require '../config/db.php';
require '../includes/functions.php';
checkAuth();
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();

    $stmt = $pdo->prepare(
        "INSERT INTO occupants (full_name, email, phone) VALUES (?,?,?)"
    );
    $stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['phone']
    ]);
}

$occupants = $pdo->query("SELECT * FROM occupants ORDER BY full_name")->fetchAll();
?>

<div class="container">
    <h2>Occupants</h2>

    <form method="post">
        <input type="hidden" name="csrf" value="<?= csrf_token() ?>">

        <label>Full Name</label>
        <input name="name" required>

        <label>Email</label>
        <input name="email" required>

        <label>Phone</label>
        <input name="phone" required>

        <button>Add Occupant</button>
    </form>

    <br>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($occupants as $o): ?>
            <tr>
                <td><?= htmlspecialchars($o['full_name']) ?></td>
                <td><?= htmlspecialchars($o['email']) ?></td>
                <td><?= htmlspecialchars($o['phone']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
