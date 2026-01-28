<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meridian Suite Hotel</title>
    <link rel="stylesheet" href="/meridian_suite_hotel/assets/css/style.css">
</head>
<body>

<header>
    <div class="logo-area">
        <img src="/meridian_suite_hotel/assets/images/logo.png" alt="Logo">
        <h1>Meridian Suite Hotel</h1>
    </div>

    <nav>
        <a href="home.php">Home</a>
        <a href="login.php">Admin Login</a>
    </nav>
</header>

<div class="container">

    <h2>Welcome to Meridian Suite Hotel</h2>

    <p>
        Experience comfort, luxury, and exceptional hospitality at
        <strong>Meridian Suite Hotel</strong>.
    </p>

    <div class="gallery">
        <img src="/meridian_suite_hotel/assets/images/hotel1.jpg">
        <img src="/meridian_suite_hotel/assets/images/hotel2.jpg">
        <img src="/meridian_suite_hotel/assets/images/hotel3.jpg">
    </div>

    <p style="margin-top:30px;">
        <a href="book_public.php" class="btn">Book a Room</a>
    </p>

</div>

<footer>
    <p>&copy; <?= date('Y') ?> Meridian Suite Hotel</p>
</footer>

</body>
</html>
