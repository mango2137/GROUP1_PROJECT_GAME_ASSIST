<?php
session_start();
require_once 'config.php';
echo '<link rel="stylesheet" type="text/css" href="gamelikecss.css">';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sprawdzenie, czy pola zostały wypełnione
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Pobranie danych z formularza
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Sprawdzanie danych użytkownika
        $stmt = $pdo->prepare("SELECT * FROM users WHERE USERNAME = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['PASSWORD'])) {
            $_SESSION['username'] = $user['USERNAME'];
            header("Location: dashboard.php");
            exit();
        } else {
            die('Błędna nazwa użytkownika lub hasło.');
        }
    } else {
        // Jeśli dane nie zostały wysłane lub są puste
        echo 'Proszę wypełnić wszystkie pola.';
    }
}
?>