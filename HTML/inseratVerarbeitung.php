<?php

session_start ();
include("db.inc.php");
verbindung_mysql("Modul120");


if (isset($_SESSION["userData"]))
{
    //***********************************************************************************
    // Datenbank Auslesen
    
    $userData = $_SESSION["userData"];
    
    $titel = $_POST['titel'];
    $kategorie = $_POST['kategorie'];
    $inhalt = $_POST['message'];
    $preisStart = $_POST['startPreis'];
    $preisEnde = $_POST['endPreis'];
    $angezeigtVon = $_POST['vonDatum'];
    $angezeigtBis = $_POST['bisDatum'];
    $inseratID = $_POST['inseratID'];
    $userID = $userData['USER_ID'];
    
    
    if ($inseratID == "neu")
    {
        $timestamp = time();
        $datum = date("y.m.d", $timestamp);
        
        $eintrag = 
        "INSERT INTO inserate ".
        "(TITEL, KATEGORIE_ID, INHALT, PREIS_START, PREIS_ENDE, ANGEZEIGT_VON, ANGEZEIGT_BIS, USER_ID, ERFASST_AM) ".
        "VALUES ('$titel', '$kategorie', '$inhalt', '$preisStart','$preisEnde', '$angezeigtVon', '$angezeigtBis', '$userID', '$datum')";
    }
    else
    {
        $eintrag =
        "UPDATE inserate ".
        "SET TITEL = '$titel', ".
        "KATEGORIE_ID = '$kategorie', ".
        "INHALT = '$inhalt', ". 
        "PREIS_START = '$preisStart', ".
        "PREIS_ENDE = '$preisEnde', ".
        "ANGEZEIGT_VON = '$angezeigtVon', ".
        "ANGEZEIGT_BIS = '$angezeigtBis' ".
        "WHERE INSERATE_ID = '$inseratID' ";
    }

    $result = mysql_query($eintrag);
     
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
