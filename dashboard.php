<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SkillShot Academy / Logowanie / Rejestracja </title>
    <link rel="stylesheet" type="text/css" href="profilelist.css">
    <link rel="stylesheet" type="text/css" href="gamelikecss.css">
    <link rel="shortcut icon" href="radiant-rank.png">
    <script src="profilelist.js"></script>
</head>
<body>

<div class="dashboardheaderdiv">
    <div class="dashboardleftheaderdiv">
        <img src="radiant-rank.png" style="width: 75px;height: 75px;"><br><br>
        <h5 class="glow2">SkillShot Academy</h5><br>
    </div>
    <div class="dashboardrightheaderdiv">
        <!-- Sekcja profilowa z rozwijalnym menu ustawień -->
        <div class="profile-container">
            <!-- Nagłówek profilu -->
            <div class="profile-header" onclick="toggleSettings()">
                <img src="https://via.placeholder.com/50" alt="Profil" class="profile-img">
                <span class="username"><?php echo $_SESSION['username']; ?></span>
            </div>

            <!-- Lista ustawień -->
            <div class="settings-list" id="settingsList">
                <ul>
                    <li><a href="#">Ustawienia konta</a></li>
                    <li><a href="#">Zmiana hasła</a></li>
                    <li><a href="#">Statystyki!</a></li>
                    <li><a href="logout.php">Wyloguj się</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }
?>
<div class="dashboardmaindiv">
    <div class="floating-island">
        <div class="link-grid">
            <a href="#" class="link-box"><img src="ICONS\agents-icon.png" alt="agents-logo" width="230px" heigth="230px"></a><br><br><br><br>
            <a href="#" class="link-box"><img src="ICONS\valorant-tech.png" alt="valorant-tech" width="200px" heigth="200px"></a><br><br><br><br>
            <a href="#" class="link-box"><img src="ICONS\gun-icon.png" alt="gun-logo" width="350px" heigth="100px"></a><br><br><br><br>
        </div>
        <div class="link-grid">
            <a href="#" class="link-box"><img src="ICONS\crosshair-icon.png" alt="crosshair-logo" width="250px" heigth="250px"></a><br><br><br><br>
            <a href="#" class="link-box"><img src="ICONS\phrase-book-icon.png" alt="phrase-book-logo"></a><br><br><br><br>
            <a href="#" class="link-box"><img src="ICONS\question-mark-icon.png" width="230px" heigth="230px" alt="agents-logo"></a><br><br><br><br>
        </div>
    </div>
</div>
<div class="dashboardfooterdiv">
    <div class="dashboardfooterdivleft">
        <h2> 
        <b><i> I N F O: </b></i><br>
        </h2>
    </div>
    <div class="dashboardfooterdivright">
        <a class="linkbut" href="faqindex.html"><img alt="faq-link" src="faq-logo.png" style="width: 60px; height: 50px;"></a><br><br>
        <a class="linkbut" href="https://discord.gg/JjmAzzcxsh"><img alt="discord-server-link" src="discord-logo.png" style="width: 50px; height: 30px;"></a><br><br>
        <a class="linkbut" href="https://www.riotgames.com/pl"><img alt="riot-games-link" src="riot-logo.png" style="width: 50px; height: 50px;"></a><br><br>
        <a class="linkbut" href="https://playvalorant.com/pl-pl/?utm_medium=card2%2Bwww.riotgames.com&utm_source=riotbar"><img alt="valorant-link" src="valorant-logo.png" style="width: 70px; height: 40px;"></a><br><br>
    </div>
</div>


</body>
</html>