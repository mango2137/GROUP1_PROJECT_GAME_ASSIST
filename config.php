<?php
// config.php
$host = 'localhost';
$dbname = 'gameassistandb';
$username = 'root';  // Ustaw zgodnie z danymi do bazy
$password = '';      // Ustaw hasło do bazy (jeśli masz)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}
?>