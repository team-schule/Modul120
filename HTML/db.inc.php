<?php
	//Definition einer Funktion zur Verbindungsaufnahme mit einer MySQL-Datenbank
	function verbindung_mysql($datenbank, $server = "localhost", $user = "root", $pass = "")
	{
		global $verbindung;
		//Verbindungsaufnahme MySQL-Server
		$verbindung = @mysql_connect($server, $user, $pass)
			or die ("Keine Verbindung zum Server... <br>
					Abbruch des Skripts.");
					mysql_set_charset('utf8',$verbindung);

		//Wechsel in angegebene Datenbank
		@mysql_select_db($datenbank)
			or die ("Fehler beim Zugriff auf die Datenbank. <br>
					MySQL-Fehler: " .mysql_error() .".<br>
					Abbruch des Skripts.");
	}
	/*
	Aufruf aus anderem Skript lokal z. B. mit:
		require_once("db.inc.php");
		verbindung_mysql("bankleitzahlen");
	Aufruf aus anderem Skript mit Internet-Beispieldaten:
		require_once("db.inc.php");
		verbindung_mysql("MeineDB", "MeinServer", "MeinName", "MeinPass");
	*/
?>
