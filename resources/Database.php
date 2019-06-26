<?php /*Hier wird die verbindung auf die DB in eine Funktion gepakt.*/
    function connect(){
        $db = new Mysqli("srv108", "hoogj", "Password2019$", "hoogj");
        return $db;
    }
?>