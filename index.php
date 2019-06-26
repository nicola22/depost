<?php
session_start();
//Builder laden
	include_once "resources/builder.php";
	include_once "resources/Database.php";
/*
Die Wichtchtigsten Befehle:

*Explode()	-->		Teilt einen String anhand eriner Zeichenkette
*trim()		-->		eintfernt Whitespaces (ider andere Zeichen) am Anfang und End eines Strings
*$-serve['Request_uri]	--> 	Der URI, der angegeben wurde, um auf die akuelle Seite zuzugreiffen
*strstr		--> 	Findet das erste Vorkommen eines Strings
*/
//Die URL Teilen
$temp = trim($_SERVER['REQUEST_URI'], '/');
$url = explode('/', $temp);

if (isset($url[2])){
	$url = explode('?', trim($url[2]));
}
else
{
	$url[0] = $url[2];
}

if(!empty($url[0]))
{
	// alles zu Kleinbuchstaben umformtieren
	$url[0] = strtolower($url[0]);
	switch($url[0])
	{
		case 'home':
			build('home.php');
			break;
		case 'login':
			build('login.php');
			break;
		case 'search':
			build('search.php');
			break;
		case 'produkt':
			build('produkt.php');
			break;
		case 'impressum';
			build('impressum.php');
			break;
		case 'search':
			build('search.php');
			break;
		case 'nachsuche':
			build('nachSuche.php');
			break;
		case 'signup':
			build('signup.php');
			break;
		case 'validate':
			build('validate.php');
			break;
		case 'checklogin':
			build('checklogin.php');
			break;
		case 'myaccountreg':
			build('myAccountreg.php');
			break;
		case 'insert':
			build('insert.php');
			break;
		case 'logout':
			build('logout.php');
			break;
		case 'passwort':
			build('passwort.php');
			break;
		case 'passwortaendern':
			build('passwortaendern.php');
			break;
		case 'delete':
			build('delete.php');
			break;
		case 'deleteaccount':
			build('deleteaccount.php');
			break;
	}
}//Ist der Wert nicht gesetzt wird die Standartseite (home) aufgerufen.
else
{
	build('home.php');
}
    
?>