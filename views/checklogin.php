<!-- Hier wird geschaut ob alles mit dem Login inordnug ist.-->
<?php
//Verbindung zur Datenbank
	$db = connect();

//holen der Daten
	$data = $_POST;
	$name= $data["username"];
	$password = hash('sha256', $data['pw']);

//Definieren des Queries
	$sql = "SELECT ID_Profil, Benutzername, Email, Name FROM Profil WHERE Benutzername = ? AND Passwort = ?;";
	$statement = $db->prepare($sql);
	$statement->bind_param('ss', $name, $password);
	$statement->execute();
	$statement->bind_result($id_user, $username, $email, $name);
// die Daten in das User array schreiben
	while($statement->fetch()){
		$user = array('ID_Profil' => $id_user, 'Benutzername' => $username,  'Email' => $email, 'Name' => $name);
	}
// Die daten in das Userdata schreiben, aber nur wenn user schon gefüllt ist.
	if(!empty($user)){
		$_SESSION['userdata'] = array("ID_Profil" => $user['ID_Profil'], "Benutzername" => $user['Benutzername'], "Email" => $user['Email'], "login" => true);
		$_SESSION['name']= $name;
		
		header("Location: myaccountreg");
// es wird eine error gespeichet, welcher wird dann im Home brauchen
	}else{
		$_SESSION['error']='login';
		header("Location: login");
	}
	$db->close();
?>