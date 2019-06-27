<!DOCTYPE html>

<?php
    session_start();
    include("db.inc.php");
    verbindung_mysql("Modul120")
?>

<html lang="en" dir="ltr">

<head>

    <meta charset="utf-8">
    <title>Projekt Modul120</title>

</head>

<body>

    <h1>Test Seite Projekt Modul120</h1>

    <?php

    //********************************************************************************************************
    // Login / Anmeldung

    if (isset($_SESSION["userData"]))
    {
        $userData = $_SESSION["userData"];

        echo
        "<li><a href='#'>" . $userData["BENUTZERNAME"] . "</a>
            <ul>
                <li><a href='#'>Meine Artikel</a></li>
                <li><a href='#'>Wunschliste</a></li>
                <li><a href='#'>Blabla</a></li>
                <li><a href='#'>Abmelden</a></li>
            </ul>
        </li>";
    }
    else
    {
        echo "<input type=button onClick=\"location.href='login.php'\" value='Login'>";
    }

    //********************************************************************************************************
    // Suche


    //********************************************************************************************************
    // Kategorien

    echo "<h1>Kategorien</h1>";

    $katSql =
    "SELECT * ".
    "FROM kategorien";

    $katResult = mysql_query ($katSql);


    $kategorienRows = array();

    while(($kategorienRows = mysql_fetch_array($katResult)))
    {
        $katRows[] = $kategorienRows;
    }

    foreach($katRows as $key=> $item)
    {
        echo "<li><a href='#'>" . $katRows[$key]["KATEGORIE_TEXT"] . "</a></li>";
    }
    //********************************************************************************************************
    // Inserate

    echo "<h1>Inserate</h1>";

    $insSql =
    "SELECT * ".
    "FROM inserate";

    $insResult = mysql_query ($insSql);

    while(($inserateRows = mysql_fetch_array($insResult)))
    {
        $insRows[] = $inserateRows;
    }

    foreach($insRows as $key=> $item)
    {
        echo "<li><a href='#'>" . $insRows[$key]["TITEL"] . "</a></li>";
    }


    //********************************************************************************************************

    ?>


</body>

</html>
