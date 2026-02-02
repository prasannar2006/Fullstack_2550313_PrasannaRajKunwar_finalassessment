<?php
require '../includes/functions.php';
checkAuth();
include '../includes/header.php';
?>

<div class="container">

    <p style="margin-bottom:50px;">
        <a href="index.php" class="btn">← Back to Home</a>
    </p>


    <h2>Room Availability</h2>

    <form onsubmit="return false;">
        <label>Check-in Date</label>
        <input type="date" id="check_in">

        <label>Check-out Date</label>
        <input type="date" id="check_out">
    </form>

    <h3>Available Rooms</h3>
    <div id="available"></div>

</div>

<?php include '../includes/footer.php'; ?>
