<?php
session_start();

// Sprawdzamy, czy użytkownik jest zalogowany
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillShot Academy</title>
    <link rel="stylesheet" type="text/css" href="gamelikecss.css">
    <link rel="stylesheet" type="text/css" href="profilelist.css">
    <link rel="shortcut icon" href="radiant-rank.png">
    <script src="profilelist.js"></script>
</head>
<body>

<div class="settingsheaderdiv">
    <div class="settingstopheaderdiv">
        <img src="radiant-rank.png" style="width: 75px; height: 75px;">
        <br><br>
        <h5 class="glow2">SkillShot Academy</h5>
        <br>
    </div>

    <div class="dashboardrightheaderdiv">
        <!-- Sekcja profilowa z rozwijalnym menu ustawień -->
        <div>
            <h2>Wybierz zdjęcie profilowe</h2>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="profilepic" id="profilepic" required>
                <br><br>
                <input class="submit" type="submit" value="Zapisz zdjęcie">
            </form>
        </div>
        <div>
            <form action="update_email.php" method="POST">
            <label for="email">Wprowadź e-mail:</label>
            <input type="email" id="email" name="email" required><br><br>

            <button type="submit" name="submit">Zaktualizuj E-mail</button>
        </form>
        </div>
    </div>

    <div style="padding-left: 50px;" class="settingstopheaderdiv">
        <button onclick="window.location.href='dashboard.php';">Przejdź do Dashboard</button>
    </div>
</div>

</body>
</html>