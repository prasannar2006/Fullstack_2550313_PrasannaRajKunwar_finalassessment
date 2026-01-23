<?php
require '../config/db.php';
require '../includes/functions.php';
checkAuth();
include '../includes/header.php';

$occ = $pdo->query("SELECT * FROM occupants")->fetchAll();
?>

<h2>Occupants</h2>
<form method="post">
<input name="name" placeholder="Name">
<input name="email">
<input name="phone">
<button>Add</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo->prepare("INSERT INTO occupants VALUES (NULL,?,?,?)")
        ->execute([$_POST['name'], $_POST['email'], $_POST['phone']]);
}
?>

<table>
<?php foreach ($occ as $o): ?>
<tr>
<td><?= htmlspecialchars($o['full_name']) ?></td>
<td><?= htmlspecialchars($o['email']) ?></td>
<td><?= htmlspecialchars($o['phone']) ?></td>
</tr>
<?php endforeach; ?>
</table>

<?php include '../includes/footer.php'; ?>
