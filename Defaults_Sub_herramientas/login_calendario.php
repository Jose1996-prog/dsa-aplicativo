<?php
session_start();

$validUsername = "admin";
$validPassword = "1023";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $validUsername && $password === $validPassword) {
        $_SESSION['loggedin'] = true;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
