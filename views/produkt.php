<!--
Hier wird die Webseite für das Produkt gemacht, auf welches man klickt.
Das Produkt wird gross mit allen Angeben dargestellt.
-->
<?php
    //Verbindung zur Datenbank
    $db = connect();;
?>
<!-- <main class = "nachsuche"> -->
<?php
// Select Anfrage wird vorbereitet.
    $id = $_GET['p'];
    $sql = "SELECT Preis, Bild, Bild2, Name, Beschreibung, Kategorie_ID from Artikel join Kategorie on ID_Kategorie = Kategorie_ID WHERE ID_Artikel = $id ";
    $result = $db->query($sql);
    if($result->num_rows >= 1) {
        while($row = $result->fetch_assoc()) { ?>
<main class = "mainprodukt">
    <div>
        <h1 class = "ueberschrift"><?PHP echo  $row['Name']?></h1> 
        <p></p>
        <div class = "anzeigeProdukt">
            <div class="ui grid">
                <div class="ten wide column">
                    <div class="slideshow-container">
                        <div class="mySlides">           
                            <!-- Hier werden die Img's für den Slide eingefügt.-->  
                            <img class = "imgprodukt"src="pictures/<?php echo $row['Bild']?>" alt="Das Bild kann nicht angekeit werden.">
                        </div>
                        <div class="mySlides"> 
                            <img class = "imgprodukt" src="pictures/<?php echo $row['Bild2']?>" alt="Das Bild kann nicht angekeit werden.">
                        </div>
                    </div>
                </div>
                <!-- Hier wird das Grid vorbereitet -->
                <div class="six wide column"><h2 class = "beschreibung">Grösse:</h2> 
                <form action="home">
                    <select class = "groesse" name="groesse">
                    <?php
                    // Je nach Kategorie werden verschiedene Grössen angezeit. Hier sind es die Schuhe.
                        if ($row['Kategorie_ID'] == 1){
                    ?>
                    <option value="42" seleced> Grösse wählen</option>
                    <option value="42">42</option>
                    <option value="42.5">42.5</option>
                    <option value="43" >43</option>
                    <option value="43.5">43.5</option>
                    <?php
                    // Hier sind es die Kleider
                        }
                        Else if ($row['Kategorie_ID'] == 2){
                    ?>
                    <option value="S" seleced> Grösse wählen</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L" >L</option>
                    <?php 
                        // Hier sind es die anderen Sachen wie Caps oder Rucksäcke.
                        } 
                        else
                        {
                    ?>
                    <option value="42" seleced> Grösse wählen</option>
                    <option value="1">One Size</option>
                    <?php 
                        }
                    ?>
                    </select>
                </form>
                <!-- Hier werden die Daten für den Preis und Info eingfügt -->
                <h2 class = "beschreibung">Preis: <span class = "anzeige"> <?php echo $row['Preis'] ?> . -</span></h2>
                <h2 class = "beschreibung">infos: <span class = "anzeige"> <?php echo $row['Beschreibung']?></span></h2>
                <a href="https://www.stadiumgoods.com" target="_blank"><button class="ui inverted green button">Kaufen</button></a>
                </div>
            </div>
        </div>        
    </div>
    <?php
    }
}

    ?>
    <script>
    // Hier wird dei Slideschow erstellt, wo die Produkte gezeigt werden.
        var slideIndex = 0;
        showSlides();
        function showSlides()
        {
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) 
            {
                slides[i].style.display =  "none"; 
            }
            slides[slideIndex].style.display =  "block";
            slideIndex = slideIndex + 1;
            if (slideIndex >= slides.length)
            {
                slideIndex = 0;
            }
            setTimeout(showSlides, 2500);
        }
    </script>
</main>
<?php
$db->close();
?>