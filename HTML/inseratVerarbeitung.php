<?php

session_start ();
include("db.inc.php");
verbindung_mysql("Modul120");


if (isset($_SESSION["userData"]))
{
    //***********************************************************************************
    // Datenbank Auslesen
    
    $userData = $_SESSION["userData"];
    
    $eintrag =
    "UPDATE inserate ".
    "SET TITEL = '" . $_POST['titel'] . "', ".
    "INHALT = '" . $_POST['message'] . "', ". 
    "PREIS_START = '" . $_POST['startPreis'] . "', ".
    "PREIS_ENDE = '" . $_POST['endPreis'] . "', ".
    "ANGEZEIGT_VON = '" . $_POST['vonDatum'] . "', ".
    "ANGEZEIGT_BIS = '" . $_POST['bisDatum'] . "' ".
    "WHERE INSERATE_ID = '" . $_POST['inseratID'] . "'";
        

    $result = mysql_query($sql);
     
    //**********************************************************************************    
}
else 
{
    echo "<h3>Melden Sie sich bitte zuerst an</h3>
    <input type=button onClick=\"location.href='login.php'\" value='ZUR ANMELDUNG'>
    <br><br>";
}

header ("Location: index.php");

mysql_close($verbindung);
?>
