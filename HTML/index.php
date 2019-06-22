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
        "<li><a href='#'>" . $userData["LOGIN_UID"] . "</a>
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
    
    $sql =
    "SELECT * ".
    "FROM kategorien";

    $result = mysql_query ($sql);


    $kategorienRows = array();

    while(($kategorienRows = mysql_fetch_array($result)))
    {
        $rows[] = $kategorienRows;
    }
    
    foreach($rows as $key=> $item)
    {
        echo "<li><a href='#'>" . $rows[$key]["KATEGORIE_TEXT"] . "</a></li>";
    }
    //********************************************************************************************************
    
    ?>


</body>

</html>
