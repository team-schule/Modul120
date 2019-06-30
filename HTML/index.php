

<?php
    session_start();
    include("db.inc.php");
    verbindung_mysql("Modul120")
?>

<style>
  .anzeigefeld {
      position:relative;
      left:200px;
      display: grid;
      grid-template-columns: 300px 300px 300px 300px;
      grid-gap: 10px;
      padding: 10px;
  }
    
    .anzeigefeld > div {
        width: 300px;
        height: auto;
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid black;
  text-align: center;
  font-size: 20px;
}
    
    .bildinserat {
        max-width: 200px;
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
                <li><a href='#'>Meine Artikel</a></li>
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

    echo "<h4>Kategorien</h4>";

    $katSql =
    "SELECT * ".
    "FROM kategorien";

    $katResult = mysql_query ($katSql);


    $kategorienRows = array();

    while(($kategorienRows = mysql_fetch_array($katResult)))
    {
        $katRows[] = $kategorienRows;
    }


echo "<form action='index.php'>";
echo "<select name='Kategorie' size='1'>";
    foreach($katRows as $key=> $item)
    {

        echo "<option value='" . $katRows[$key]["KATEGORIE_TEXT"] . "'>" . $katRows[$key]["KATEGORIE_TEXT"] . "</option>";

    }
echo "</select>";
echo "</form>";


    ?>

    <?php
$sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS from inserate";

$abfrage = mysql_query($sql);

if( ! $abfrage)
		{
			echo "<p>Die SQL-Anweisung ist fehlgeschlagen...</p>";
		}



echo "<div class='anzeigefeld'>";

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
                    <p>$bild </p>
                    
                    <p>" .$zeile["INHALT"] ."</p>
                    <p>" .$zeile["PREIS_START"] ." CHF</p>

                    <p>Endet am: " .$zeile["ANGEZEIGT_BIS"] ."</p>
                    <p><input type='submit' name='detail' value='Zum Inserat'></input></p>
                </article></div>";

		}
		echo "</div>";
     include("footer.html");
?>

    

   

