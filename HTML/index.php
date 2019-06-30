

<?php
    session_start();
    include("db.inc.php");
    verbindung_mysql("Modul120")
?>

<style>
  .footer{
      position:absolute;
    height: 100%;
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
$sql = "SELECT TITEL, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_VON, ANGEZEIGT_BIS from inserate";

$abfrage = mysql_query($sql);

if( ! $abfrage)
		{
			echo "<p>Die SQL-Anweisung ist fehlgeschlagen...</p>";
		}

echo "<table width='100%' border='1'>
<tr>
                <th>Titel</th>

                <th>Inhalt</th>

                <th>Startpreis</th>

                <th>Angezeit von</th>
                <th>Angezeit bis</th>
              </tr>";

    while ($zeile = mysql_fetch_array($abfrage))
		{
      echo "
			<tr>

                    <td>" .$zeile["TITEL"] ."</td>

                    <td>" .$zeile["INHALT"] ."</td>

                    <td>" .$zeile["PREIS_START"] ."</td>

                    <td>" .$zeile["ANGEZEIGT_VON"] ."</td>
                    <td>" .$zeile["ANGEZEIGT_BIS"] ."</td>
                </tr>";

		}
		echo "</table>";
     include("footer.html");
?>

    

   

