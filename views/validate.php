<main>	
	<h1 class = "ueberschrift"> Falsche Daten</h1>
	<?php
		//Überprüfen ob das Formular auch wirklich ausgefüllt wurde
		if(!empty($_POST['submit']) && $_POST['submit'] === 'Registrieren') {

			//herausholen der Daten aus dem Post
			$data = $_POST;
			
			//Prüfvariable
			$invalid = false;
			

			//Überprüfen ob name grösser als 40 oder kleiner als 5 ist
			if(strlen($data['name']) > 40 || strlen($data['name']) < 5) {?>
				<p><?php echo 'Benutzername muss zwischen 5 und 40 Zeichen lang sein!<br/>';
				$invalid = true;
			}

			//Email regex für eine Valide Emailadresse
			if(!preg_match('/^(\w{2,}|\w{2,}[\.\-]\w{2,})@(\w{2,}\.\w{2,}|\w{2,}[\.\-]\w{2,}\.\w{2,})$/', $data['email'])) {
				echo 'Email ist ung&uuml;ltig!<br/>';
				$invalid = true;
			}

			//Prüfen ob beide Passwörter gleich sind.
			if($data['pw1'] === $data['pw2']) {
				if(!preg_match('/^[\w@#%&$£]{8,}$/', $data['pw1'])) {?>
				<p><?php echo 'Passwort muss folgendes erf&uuml;llen:' ?> </p>
				<p> Mindestens 8 Zeichen lang!<br> </p>
				<p>Mindestens eine Zahl!<br> </p>
				<p>Mindestens ein Sonderzeichen!<br></p> 
				<?php
					$invalid = true;
				}
			
			} 
			
			else 
			{
				?><p><?php echo 'Passw&ouml;rter stimmen nicht &uuml;berein!<br/>';?> </p> <?php
				$invalid = true;
			}
			

			//überprüfen ob alles richtig
			if($invalid == false) 
			{
				//Speichern der Daten in Session
				$db = connect();
				$stmt = $db->prepare(
				"INSERT INTO Profil (name, email, benutzername, passwort) VALUES (?, ?, ?, ?)");
				// Das Passwort wird gehasht
				$password = hash('sha256', $data['pw1']);
				$stmt->bind_param("ssss", $_POST["name"], $_POST["email"], $_POST["username"], $password);
				$stmt->execute();
				if (isset($_SESSION['username'])){}
				$_SESSION['data'] = $data;
				$db->close();
				//Weiterleitung zum insert-File
				header("Location: login");
			}
		} 
		else 
		{
			//Hinweis, dass das Formular nicht ausgefüllt ist
			echo 'F&uuml;llen Sie bitte zuerst das <a href="signup">Formular</a> aus!<br/>';
			
		}
	?>
</main>