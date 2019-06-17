<?php

include("db.inc.php");
verbindung_mysql("Modul120");
session_start ();


$sql = "SELECT ".
    "* ".
  "FROM ".
    "users ".
  "WHERE ".
    "(LOGIN_UID like '".$_REQUEST["name"]."') AND ".
    "(LOGIN_PWD = '". ($_REQUEST["pwd"])."')";
$result = mysql_query ($sql);

if (mysql_num_rows ($result) > 0)
{
  // Benutzerdaten in ein Array auslesen.
  $data = mysql_fetch_array ($result);

  // Sessionvariablen erstellen und registrieren
  $_SESSION["user_name"] = $data["benutzername"];
  $_SESSION["user_type"] = $data["usertype"];

  header ("Location: index.html");
}
else
{
  header ("Location: login.php?fehler=1");
}
mysql_close($verbindung);
?>
