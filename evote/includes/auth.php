<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isLoggedIn() {
    return isset($_SESSION['user']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: ../login.php");
        exit();
    }
}

function getUser() {
    return $_SESSION['user'] ?? null;
}

function login($user) {
    $_SESSION['user'] = $user;
}

function logout() {
    session_unset();
    session_destroy();
    header("Location: ./");
    exit();
}
?>
