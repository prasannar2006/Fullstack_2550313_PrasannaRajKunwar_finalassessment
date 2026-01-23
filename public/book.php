<?php
require '../includes/functions.php';
checkAuth();
include '../includes/header.php';
?>

<h2>Book a Room</h2>
<input type="date" id="check_in">
<input type="date" id="check_out">
<div id="available"></div>

<?php include '../includes/footer.php'; ?>
