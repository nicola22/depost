<!-- Hier wird die Home Seite erstellt.-->

<?php
//Verbindung zur Datenbank
$db = connect();
?>
<!-- Das Grid vorbereiten-->
<main class = "mainhome">
    <h1 class = "ueberschrift">Home</h1>
    <div class="ui grid">
    <?php
    $i = 1;
    // 20 Mal das Select Statement ausführen um 20 Produkte aus der DB zu lesen
    while($i <= 20){
    $sql = "SELECT ID_Artikel, Preis, Bild, Name from Artikel 
    where ID_Artikel= $i;";
    $result = $db->query($sql);
    if($result->num_rows >= 1) {
        // Für jedes Produkt das Grid zusammenbauen
        while($row = $result->fetch_assoc()) {
            ?>
            <div class="four wide column"><a href="produkt?p=<?php echo $row['ID_Artikel']?>"><img class="img" src="pictures/<?php echo $row['Bild'] ?>" alt="Das Bild kann nicht angekeit werden.">
            <br></a><p class = "p"><?php echo $row['Name'] ?> </p>
            <br><p class = "p"><?php echo $row['Preis'] ?> . -</p>
            </div>
            <?php
        }
    }$i = $i + 1;
}
$db->close();
?>
</div>
</main>
