<?php



    session_start();
    include("db.inc.php");
    include("header.html");
    verbindung_mysql("Modul120");

    if (isset($_GET["id"]))
    {
        //***********************************************************************************
        // Datenbank Auslesen

        $sql =
        "SELECT TITEL, BILD, INHALT, PREIS_START, PREIS_ENDE, ANGEZEIGT_BIS, VORNAME, NACHNAME, BENUTZERNAME, EMAIL, MOBILE, STRASSE, PLZ, ORT ".
        "FROM inserate ".
        "INNER JOIN adressen on adressen.USER_ID = inserate.USER_ID ".
        "INNER JOIN users on users.USER_ID = inserate.USER_ID ".
        "WHERE INSERATE_ID = " . $_GET["id"] . " LIMIT 1";

        $result = mysql_query($sql);

        $inserat = mysql_fetch_array($result);

        //***********************************************************************************

    }
    else
    {
        echo "<br><br><br><p>Kein Inserat ausgewählt</p>";
        echo "<li><a href='inserat.php?id=" . 1 . "'>Test Inserat-Link</a></li>";
        echo "<br><br><br><br><br><br><br><br><br><br><br><hr>";
    }
?>

<style>
    .container-1 {
        margin-right: 10px;
        display: flex;
        padding-top: 2em;
    }

    .container-1 div {
        /*border: 1px solid;*/
    }

    .container-2 {
        margin: 10px;
        border-radius: 10px;
        display: flex;
        /*padding-bottom: 2em;*/
        font-size: 30px;
    }

    .container-2 div {
        /*border: 1px solid;*/
    }

    .box-1 img {
        height: 30em;
        width: 30em;
    }

    .box-2 {
        width: 40em;
        font-size: 30px;
    }
    .box-3 {
        min-width: 15em;
        padding-left: 1em;
        padding-right: 1em;
        width: 15em;
    }

    .box-4 {
        width: 40em;
    }

    h3 {
        margin-top: 0.5em;
        margin-bottom: 0.5em;
        position: relative;
        left: 0px;
        top: 0px;
        font-size: 40px;
    }

    input[name=jahr]{
        width: 120px;
        padding: 10px 20px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        text-align: right;
        font-size: 30px;
    }

    input[type=submit],
    input[type=button]
    {
      width: 100%;
      background-color: blue;
      color: white;
      padding: 14px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

      input[type=submit]:hover,
      input[type=button]:hover
      {
        background-color: #45a049;
      }


    .smallBorder{
        height: 0.1em;
        background-color: rgb(59, 172, 183);
        border: none;
        border-radius: 1em;
    }
    #eingeloggt {
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
       margin: auto;

            }
    .log {
        background-color: blue;
         font-size:120%;
         width: 200px;
    }


</style>

<?php

    if (isset($_SESSION["userData"]))
    {
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
?>

<!--Inserat-Kopf---------------------------------------------------------------------------------------------->
<div class="container-1">

    <div class="box-1">
        <img src='Bilder/Coming-Soon.png'>
    </div>

    <div class="box-2">


        <table border="0" width="100%">
            <tr>
                <td colspan="2">
                    <h3>
                        <?php echo $inserat["TITEL"]; ?>
                    </h3>
                </td>
            </tr>
            <tr>
                <td colspan="2">Inserat-Dauer bis:
                    <?php echo $inserat["ANGEZEIGT_BIS"]; ?>
            </tr>
            <tr>
                <td colspan="2">
                    <hr class="smallBorder">
                </td>
            </tr>
            <tr>
                <td>Aktuelles Gebot</td>
                <td align="right">
                    CHF
                    <?php echo $inserat["PREIS_START"]; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">Dein Nächstes Gebot</td>
            </tr>
            <tr>
                <td colspan="2"><input type='number' name='jahr' min='<?php echo $inserat["PREIS_START"] + 1; ?>' max='<?php echo $inserat["PREIS_ENDE"]; ?>' placeholder='next price*' style='width:100%' value='<?php echo $inserat["PREIS_START"] + 1; ?>'></td>
            </tr>
            <tr>
                <td colspan="2"><input type=button onClick="location.href='gebotAbgegeben.php'" value='GEBOT ABGEBEN'></td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr class="smallBorder">
                </td>
            </tr>
            <tr>
                <td>Kaufpreis</td>
                <td align="right">
                    CHF
                    <?php echo $inserat["PREIS_ENDE"]; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type=button onClick="location.href='gebotAbgegeben.php'" value='SOFORT KAUFEN'></td>
            </tr>
        </table>
    </div>
</div>



<!--Beschreibung---------------------------------------------------------------------------------------------->

<div class="container-2" style="background-color: rgb(59, 172, 183); padding-top:0.6em; padding-bottom:0.6em; margin-top: 1em; margin-bottom: 1em">
    <div class="box-3">
        Beschreibung:
    </div>
    <div class="box-4">
        <?php echo $inserat["INHALT"]; ?>
    </div>
</div>



<!--Verkäufer---------------------------------------------------------------------------------------------->

<div class="container-2" style="padding-bottom: 2em;">
    <div class="box-3">

        <table border="0" width="100%" height="100%">
            <tr>
                <td>Verkäufer:</td>
                <td align="right">
                    <?php echo $inserat["BENUTZERNAME"]; ?>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="height: 1px">
                    <hr class="smallBorder">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    Adresse:<br>
                    <?php echo
                        $inserat["VORNAME"] . " " . $inserat["NACHNAME"] . "<br>" .
                        $inserat["STRASSE"] . "<br>" .
                        $inserat["PLZ"] . " " . $inserat["ORT"];
                    ?>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="height: 1px">
                    <hr class="smallBorder">
                </td>
            </tr>

            <tr valign="bottom">
                <td>
                    Tel:
                </td>
                <td>
                    <?php echo
                        $inserat["MOBILE"];
                    ?>
                </td>
            </tr>
            <tr valign="top">
                <td>
                    Mail:
                </td>
                <td>
                    <?php echo
                        $inserat["EMAIL"];
                    ?>
                </td>
            </tr>

        </table>




    </div>
    <div class="box-4">
        <iframe style="padding-top: 0.4em" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2702.377695745593!2d8.52265041562215!3d47.36554637916941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479009f6552b0ad5%3A0x6ce64332aeeb16ba!2sGoogle!5e0!3m2!1sde!2sch!4v1561969664905!5m2!1sde!2sch" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>



<?php include("footer.html"); ?>
