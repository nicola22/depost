<?php
    //Verbindung zur Datenbank
    $db = connect();
?>
<main class = "nachsuche">
    <?php
        $suche = $_POST['suche'];
    ?>
    <h1 class = "ueberschrift"><?php echo $suche?></h1>
    <?php
        $i = 1;
        // Es nach dem Produkt gesucht, welches man sucht
        $sql = "SELECT ID_Artikel,Preis, Bild, Name from Artikel WHERE name like '%$suche%'";
        $result = $db->query($sql);
        if($result->num_rows >= 1) { 
    ?>
    <!-- Es wird im dem Grid die einzelnen Produkte aufgelistet-->
    <div class="ui grid">
        <?php
        //Es erstellt solange neue grideinträge bis es keine Produkte hat, welche dem Suchbegriff entsprechen.
            while($row = $result->fetch_assoc()) {
        ?>     
        <div class="four wide column"><a href="produkt?p=<?php echo $row['ID_Artikel']?>"><img class="img" src="pictures/<?php echo $row['Bild'] ?>" alt="Das Bild kann nicht angekeit werden.">
            <br></a><p><?php echo $row['Name'] ?></p> <br>
            <p><?php echo $row['Preis'] ?> . -</p>
        </div>
        <?php
            } 
            }else
            {
        ?>
        <!-- Diese Seite wird geladen, wenn es keien Ergebnisse hat-->
        <div class = "keienErgebnisse"> 
            <img class = "umgekehrt" src="pictures/Ergebnisse.png" alt=""><img class = "umgekehrt" src="pictures/Ergebnisse.png" alt="Das Bild kann nicht angekeigt werden.">
            <h1 class = "ueberschrift">Keine Ergebnisse gefunden!</h1>
            <img class = "normal" src="pictures/Ergebnisse.png" alt=""><img class = "normal" src="pictures/Ergebnisse.png" alt="Das Bild kann nicht angezeigt werden.">
        </div>
    <?php
        }
        $db->close();
    ?>
</main>