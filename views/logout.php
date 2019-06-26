<!-- Es wird die Sessin abgebrochen, daher wird man ausgelogt-->
<?php
    session_destroy();	
    header("Location: Login");
?>