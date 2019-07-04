<?php
    session_start();
    include("db.inc.php");
    verbindung_mysql("Modul120")
?>

<style>
    .anzeigefeld {
        position: relative;
        left: 200px;
        display: grid;
        grid-template-columns: 300px 300px 300px 300px;
        grid-gap: 10px;
        padding: 10px;
    }

    .anzeigefeld>div {
        width: 300px;
        height: 500px;
        background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid black;
        text-align: center;
        font-size: 20px;
        border-radius: 10px;
    }
    .anzeigefeld p{
        margin: 10px;
    }
    .anzeigefeld input[type=button]{
      margin: 0 auto;
      display: block;

    }

    .bildinserat {
        max-width: 200px;
    }
    .kat{
      width: 50px;
      float:left;
      position: relative;
      box-sizing: border-box;
      margin-top: 10px;
      margin-bottom: 10px;
    }
    input[type=button],
    input[type=submit]{
      margin: 5px;
      background-color: blue;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 10em;
    }
    input[type=submit]:hover,
    input[type=button]:hover
    {
      background-color: #45a049;
    }
    .kategorie{
      font-size: 120%;
    }
    #titelkat{
      font-size: 200%;
        top: 30px;
        left:5px;

    }
    input[type=text]{
      width: 45em;
      margin-left: 180px;
      margin-bottom: 20px;
      border: solid 3px blue;
      border-radius: 5px;
      font-size: 110%;
    }
    


</style>

<?php

   include("header.html"); //********************************************************************************************************
    // Login / Anmeldung

    if (isset($_SESSION["userData"]))
    {
        $userData = $_SESSION["userData"];

        echo
        "<style>
            #login {
                display:none;
            }

        </style>";
    }
    else
    {
        echo "<style>
        
                .log {
                    display:none;
                }
        </style>";
    }

    //********************************************************************************************************
    // Suche


    //********************************************************************************************************
    // Kategorien
    echo "<h4 id='titelkat'>Kategorien</h4>";
    echo "<form action='index.php' method='post'>";
    echo "<input type='text' name='usereingabe'style='margin-top:5px,padding-left:5px;' placeholder='Suchen.....'>";
    echo "<input type='submit' style='font-size:130%' name='suchen' value='Suchen'>";
    echo "</form>";
    echo "<div class='kat'";



    $katSql =
    "SELECT * ".
    "FROM kategorien";

    $katResult = mysql_query ($katSql);


    $kategorienRows = array();

    while(($kategorienRows = mysql_fetch_array($katResult)))
    {
        $katRows[] = $kategorienRows;
    }


echo "<form action='index.php' method='post'>";


echo "<input type='button' style='font-size:120%' onClick=location.href='index.php?alle' name='alle' value='Alle Inserate'>";

    foreach($katRows as $key=> $item)
    {
      $kategorie =$katRows[$key]['KATEGORIE_TEXT'];
      echo "<input type='button' onClick=location.href='index.php?$kategorie' name='". $katRows[$key]["KATEGORIE_TEXT"]."' class='kategorie' value='" . $katRows[$key]["KATEGORIE_TEXT"] . "'>";

    }

echo "</form>";
echo "</div>";

echo "<div class='anzeigefeld'>";
    ?>

<?php
$sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate ORDER BY RAND() LIMIT 12";
if(isset($_REQUEST_['Alle Kategorien'])){
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate ORDER BY RAND() LIMIT 12";
}
elseif(isset($_REQUEST['Antiquitäten'])){
  $meldung = "Antiquitäten";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=1 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['TV,Video'])) {
  $meldung = "TV,Video";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=2 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Briefmarken'])) {
  $meldung = "Briefmarken";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=3 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Bücher'])) {
  $meldung = "Bücher";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=4 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Computer'])) {
  $meldung = "Computer";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=5 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Filme,DVD'])) {
  $meldung = "Filme,DVD";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=6 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Spielkonsolen'])) {
  $meldung = "Spielkonsolen";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=7 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Smartphones'])) {
  $meldung = "Smartphones";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=8 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Haushalt,Wohnen'])) {
  $meldung = "Haushalt,Wohnen";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=9 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Kleidung'])) {
  $meldung = "Kleidung";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=10 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Freizeit,Hobby'])) {
  $meldung = "Freizeit,Hobby";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=11 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Musikinstrumente'])) {
  $meldung = "Musikinstrumente";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=12 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Münzen'])) {
  $meldung = "Münzen";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=13 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Sammeln,Seltenes'])) {
  $meldung = "Sammeln,Seltenes";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=14 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Spielzeug'])) {
  $meldung = "Spielzeug";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=15 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Sport'])) {
  $meldung = "Sport";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=16 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Tierzubehör'])) {
  $meldung = "Tierzubehör";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=17 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Schmuck'])) {
  $meldung = "Schmuck";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=18 ORDER BY RAND() LIMIT 12";
}
elseif (isset($_REQUEST['Wein,Genus'])) {
  $meldung = "Wein,Genus";
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where KATEGORIE_ID=19 ORDER BY RAND() LIMIT 12";
}
elseif(isset($_POST['suchen'])){
  $suche = $_POST['usereingabe'];
  $sql = "SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate where TITEL like '%$suche%' ORDER BY RAND() LIMIT 12";
  $meldung = $suche;
  }
  else {
    $sql="SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate ORDER BY RAND() LIMIT 12";
  }

$erg = mysql_query($sql);
if(mysql_num_rows($erg)==0){
  if(isset($_POST['suchen'])){
    echo "<script>alert('Keine Treffer für die suche $meldung ')</script>";
    $sql="SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate ORDER BY RAND() LIMIT 12";
  }
  else {
    echo "<script>alert('Keine Inserate in der Kategorie $meldung gefunden')</script>";
    $sql="SELECT TITEL, BILD, INHALT, ERFASST_AM, PREIS_START, ANGEZEIGT_BIS, INSERATE_ID from inserate ORDER BY RAND() LIMIT 12";
  }
}
$abfrage = mysql_query($sql);

if( ! $abfrage)
		{
      echo "error";

		}





    while ($zeile = mysql_fetch_array($abfrage))
		{
        if (!$zeile["BILD"]){
            $bild = "Kein Bild vordhanden.";
        }
        else
        {
           $bild = "<img class='bildinserat' src='" .$zeile["BILD"] ."'>";
        }

        $date=$zeile['ANGEZEIGT_BIS'];
        $dateformat=date('d.m.Y', strtotime($date));
      echo "<div><article>

                    <h5 style='font-size:1.2em'>" .$zeile["TITEL"] ."</h5>
                    <p style ='font-size:0.8em'>$bild </p>

                    <p style='font-size:0.7em'>" .$zeile["INHALT"] ."</p>
                    <p style='color:red'><b>" .$zeile["PREIS_START"] ." CHF</b></p>

                    <p style='font-size:0.9em'>Endet am: $dateformat   </p>
                    <p><input type=button onClick=\"location.href='inserat.php?id=" . $zeile["INSERATE_ID"] . "'\" value='Zum Inserat'></input></p>
                </article></div>";

		}
		echo "</div>";
     include("footer.html");
?>
