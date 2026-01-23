<?php
session_start();

function checkAuth() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
}

function csrf_token() {
    if (!isset($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function verify_csrf() {
    if ($_POST['csrf'] !== $_SESSION['csrf']) {
        die("CSRF validation failed");
    }
}
