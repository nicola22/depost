<!-- Hier wird die myAccount Seite gemacht, wenn man eingelogt ist-->
<main>
    <h1 class = "ueberschrift"><?php echo $_SESSION['userdata']['Benutzername']?></h1>
    <p>Name: <?php echo $_SESSION['name']?></p>
    <p>Email: <?php echo $_SESSION['userdata']['Email']?></p>
    <p>Passwort ändern kannst du <a href="passwort">Hier</a> </p>
    <p>Deinen Account löschen kannst du <a href="delete">Hier</a></p>
    <img class = "normal" src="pictures/Suche.png" alt=""><img class = "normal" src="pictures/Suche.png" alt="Das Bild kann nicht angezeigt werden.">
</main>