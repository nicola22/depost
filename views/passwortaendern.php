<!-- Hier wird die das Passwort überprüft und geändert. -->
<?php
	//Überprüfen ob das Formular auch wirklich ausgefüllt wurde
	if(!empty($_POST['submit']) && $_POST['submit'] === 'ändern') {

		//herausholen der Daten aus dem Post
		$data = $_POST;
		//Prüfvariable
		$invalid = false;
		$pw1= $data['pw1'];   
		$pw2 = $data['pw2'];
		//Prüfen ob beide Passwörter gleich sind.
		//Prüfen ob es den Anforderungen entspricht
		if($pw1 === $pw2) {
			if(!preg_match('/^[\w@#%&$£]{8,}$/', $pw1)) {?>
				<h1 class = "ueberschrift">Falsche Daten.</h1>
				<p><?php echo 'Passwort muss folgendes erf&uuml;llen:' ?> </p>
				<p> Mindestens 8 Zeichen lang!<br> </p>
				<p> Mindestens eine Zahl!</li><br>
				<p> Mindestens ein Sonderzeichen!<br></p> 
				<img class = "normal" src="pictures/Suche.png" alt=""><img class = "normal" src="pictures/Suche.png" alt="Das Bild kann nicht angezeigt werden.">
				<?php
				$invalid = true;
			}

		} 
		else 
		{
			?><h1 class = "ueberschrift">Die Passwörter sind nicht gleich.</h1>
			<p><?php echo 'Passw&ouml;rter stimmen nicht &uuml;berein!<br/>';?> </p> 
			<img class = "normal" src="pictures/Suche.png" alt=""><img class = "normal" src="pictures/Suche.png" alt="Das Bild kann nicht angezeigt werden."><?php
			$invalid = true;
		}

		//überprüfen ob alles richtig
		if($invalid == false) {
			$pw1= hash('sha256', $data['pw1']);   
			$pw2 = hash('sha256', $data['pw2']);
			//Speichern der Daten in Session
			$db = connect();
			$stmt = $db->prepare("update Profil set Passwort  = ? where ID_Profil = ?;");
			$stmt->bind_param("ss", $pw1, $_SESSION["userdata"]['ID_Profil']);
			$stmt->execute();
			$_SESSION['data'] = $data;
			$db->close();
			//Weiterleitung zum home-File
			header("Location: home");               
		}
	}
?>