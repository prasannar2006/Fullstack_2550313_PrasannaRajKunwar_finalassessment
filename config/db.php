<?php
$pdo = new PDO(
    "mysql:host=localhost;dbname=meridian_suite_hotel;charset=utf8mb4",
    "root",
    "",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
