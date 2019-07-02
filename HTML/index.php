<?php
    session_start();
    include("db.inc.php");
    verbindung_mysql("Modul120")
?>

<style>
    .anzeigefeld {
        position: relative;
        left: 20px;
        display: grid;
        grid-template-columns: 300px 300px 300px 300px 300px 300px;
        grid-gap: 10px;
        padding: 10px;
    }

    .anzeigefeld>div {
        width: 300px;
        height: auto;
        background-color: rgba(255, 255, 255, 0.8);
        text-align: center;
        font-size: 20px;
    }

    .bildinserat {
        max-width: 200px;
    }

    h4 {
        font-size: 50px;
    }
    
    h5 {
        font-size: 30px;
    }
    


</style>

<?php

   include("header.html"); //********************************************************************************************************
    // Login / Anmeldung

    if (isset($_SESSION["userData"]))
    {
        $userData = $_SESSION["userData"];

        echo
        "<li><a href='#'>" . $userData["BENUTZERNAME"] . "</a>
            <ul>
                <li><a href='meineInserate.php'>Meine Inserate</a></li>
                <li><a href='#'>Wunschliste</a></li>
                <li><a href='#'>Blabla</a></li>
                <li><a href='logout.php'>Abmelden</a></li>
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


    $katSql =
    "SELECT * ".
    "FROM kategorien";

    $katResult = mysql_query ($katSql);


    $kategorienRows = array();

    while(($kategorienRows = mysql_fetch_array($katResult)))
    {
        $katRows[] = $kategorienRows;
    }

echo "<div class='anzeigefeld'>";
echo "<form action='index.php'>";
echo "<h5>Kategorien</h5>";

//echo "<select name='Kategorie'>";
    foreach($katRows as $key=> $item)
    {
        echo "<input type='submit' name='" . $katRows[$key]["KATEGORIE_TEXT"] . "' value='" . $katRows[$key]["KATEGORIE_TEXT"] . "'><br>";
        //echo "<option value='" . $katRows[$key]["KATEGORIE_TEXT"] . "'>" . //$katRows[$key]["KATEGORIE_TEXT"] . "</option>";

    }
echo "</form>";


    ?>

<?php
$sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate";

$abfrage = mysql_query($sql);

if( ! $abfrage)
		{
			echo "<p>Die SQL-Anweisung ist fehlgeschlagen...</p>";
		}



//echo "<div class='anzeigefeld'>";

    while ($zeile = mysql_fetch_array($abfrage))
		{
        if (!$zeile["BILD"]){
            $bild = "Kein Bild vordhanden.";
        }
        else
        {
           $bild = "<img class='bildinserat' src='" .$zeile["BILD"] ."'>"; 
        }
        
        
      echo "<div><article>

                    <h5>" .$zeile["TITEL"] ."</h5>
                    <p>$bild</p>
                    
                    <p>" .$zeile["INHALT"] ."</p>
                    <p>" .$zeile["PREIS_START"] ." CHF</p>

                    <p>Endet am: " .$zeile["ANGEZEIGT_BIS"] ."</p>
                    <p><input type=button onClick=\"location.href='inserat.php?id=" . $zeile["INSERATE_ID"] . "'\" value='Zum Inserat'></input></p>
                </article></div>";

		}
		echo "</div>";
     include("footer.html");
?>