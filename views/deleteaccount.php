<!-- Hier wird der Account gelöscht-->
<?php
    //Verbindung zur Datenbank
    $db = connect();

    //holen der Daten
    $data = $_POST;
    //Definieren des Queries
    $sql = "delete  FROM Profil WHERE ID_Profil = ?;";
    $statement = $db->prepare($sql);
    var_dump( $_SESSION["userdata"]["ID_profil"]);
    $statement->bind_param('i', $_SESSION["userdata"]["ID_Profil"]);
    $statement->execute();
    header("Location: logout");
    $db->close();
?>  