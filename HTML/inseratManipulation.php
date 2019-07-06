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
        border-radius: 10px;
        display: flex;
        padding-bottom: 2em;
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
        width: 100%;
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

    .smallBorder{
        height: 0.1em;
        background-color: rgb(59, 172, 183);
        border: none;
        border-radius: 1em;
    }
    
    #login {
        display: none;
    }
    
    
    
    
    
    
    
    
    input[type=password],
    input[type=text],
    input[type=date],
    input[type=number],
    textarea,
    select
    {
      width: 100%;
        height: 2em;
        padding: 10px;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
        box-sizing: border-box;
        font-size: 30px;
    }

    .pic
    {
        width: 36.3em;      
        height: 5em;
        background-color: rgb(59, 172, 183);
      color: black;
        padding: 14px 20px;
      border-color: black;
      border-radius: 10px;
      cursor: pointer;
        display: block;
        margin: 0 auto;

    }
    
    .save
    {
        width: 98.5%;      
        background-color: blue;
      color: white;
        padding: 14px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
        display: block;
        margin: 0 auto;
    }

  input[type=submit]:hover,
  input[type=button]:hover
  {
    background-color: #45a049;
  }
    
  .footer{
    height: 100%;
  }
    
    table {
    font-size: 30px;
    margin-top: 0.5em;
        width: 100%;
    }
    
    textarea {
        resize: none;
        height: 8.7em;
    }
    
    .dropDown
    {
        width: 16em;
        margin:auto;
        display:block;
        margin-top: 0.6em;
        margin-left: 0.5em;
    }


    .log {
        font-size:120%;
        background-color: blue;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin: 4px;
        width: 200px;
            }
    
    #login {
        display:none;
    }
    
    #datausw{
        position: relative;
        width: 25em;      
        height: 5em;
        background-color: rgb(59, 172, 183);
      color: black;
        padding: 14px 20px;
      border-color: black;
      border-radius: 10px;
      cursor: pointer;
        margin: 0 auto;
        vertical-align: top;
        margin-left: 1em;
        bottom: 16.5em;
    }
    
    #hochladen{
        position: relative;
        width: 10em;      
        height: 5em;
        background-color: rgb(59, 172, 183);
      color: black;
        padding: 14px 20px;
      border-color: black;
      border-radius: 10px;
      cursor: pointer;
        bottom: 16.5em;
        margin: 0 auto;
    }
    
    </style>


<?php
    session_start();
    include("db.inc.php");
    include("header.html");
    verbindung_mysql("Modul120");

    if (isset($_SESSION["userData"]))
    {
        // Kategorie vorbereiten
        
        $drop1 = "";
        $drop2 = "";
        $drop3 = "";
        $drop4 = "";
        $drop5 = "";
        $drop6 = "";
        $drop7 = "";
        $drop8 = "";
        $drop9 = "";
        $drop10 = "";
        $drop11 = "";
        $drop12 = "";
        $drop13 = "";
        $drop14 = "";
        $drop15 = "";
        $drop16 = "";
        $drop17 = "";
        $drop18 = "";
        $drop19 = "";
        
        if ($_GET["id"] != "neu")
        {
            //***********************************************************************************
            // Datenbank Auslesen

            $userData = $_SESSION["userData"];

            $sql =
            "SELECT * ".
            "FROM inserate ".
            "WHERE inserate.INSERATE_ID = " . $_GET["id"] . " LIMIT 1";

            $result = mysql_query($sql);

            $inserat = mysql_fetch_array($result);
            
            if (!empty($_GET["picPath"]))
            {
                $inserat["BILD"] = $_GET["picPath"];
            }

            //**********************************************************************************


            // vorbereitung um Kategorie default zu selektieren
            switch ($inserat["KATEGORIE_ID"])
            {
                case "1":
                    $drop1 = "selected";
                    break;
                case "2":
                    $drop2 = "selected";
                    break;
                case "3":
                    $drop3 = "selected";
                    break;
                case "4":
                    $drop4 = "selected";
                    break;
                case "5":
                    $drop5 = "selected";
                    break;
                case "6":
                    $drop6 = "selected";
                    break;
                case "7":
                    $drop7 = "selected";
                    break;
                case "8":
                    $drop8 = "selected";
                    break;
                case "9":
                    $drop9 = "selected";
                    break;
                case "10":
                    $drop10 = "selected";
                    break;
                case "11":
                    $drop11 = "selected";
                    break;
                case "12":
                    $drop12 = "selected";
                    break;
                case "13":
                    $drop13 = "selected";
                    break;
                case "14":
                    $drop14 = "selected";
                    break;
                case "15":
                    $drop15 = "selected";
                    break;
                case "16":
                    $drop16 = "selected";
                    break;
                case "17":
                    $drop17 = "selected";
                    break;
                case "18":
                    $drop18 = "selected";
                    break;
                case "19":
                    $drop19 = "selected";
                    break;
            }
        }
        else
        {
            $inserat["TITEL"] = '';
            $inserat["INHALT"] = '';
            $inserat["ANGEZEIGT_VON"] = '';
            $inserat["ANGEZEIGT_BIS"] = '';
            $inserat["PREIS_START"] = '';
            $inserat["PREIS_ENDE"] = '';
            $inserat["INSERATE_ID"] = 'neu';
            
            if (!empty($_GET["picPath"]))
            {
                $inserat["BILD"] = $_GET["picPath"];
            }
            else
            {
                $inserat["BILD"] = "Bilder/Coming-Soon.png";
            }
        }
    }
    else 
    {
        echo "<h3>Melden Sie sich bitte zuerst an</h3>
        <input type=button onClick=\"location.href='login.php'\" value='ZUR ANMELDUNG'>
        <br><br>";
    }
?>



<form action="inseratVerarbeitung.php" method="post">
    <div class="container-1">
        <div class="box-1">
            <select class="dropDown" name="kategorie">
                <option value="1" <?php echo $drop1; ?> >Antiquitäten</option>
                <option value="2" <?php echo $drop2; ?> >TV,Video</option>
                <option value="3" <?php echo $drop3; ?> >Briefmarken</option>
                <option value="4" <?php echo $drop4; ?> >Bücher</option>
                <option value="5" <?php echo $drop5; ?> >Computer</option>
                <option value="6" <?php echo $drop6; ?> >Filme,DVD</option>
                <option value="7" <?php echo $drop7; ?> >Spielkonsolen</option>
                <option value="8" <?php echo $drop8; ?> >Smartphones</option>
                <option value="9" <?php echo $drop9; ?> >Haushalt,Wohnen</option>
                <option value="10" <?php echo $drop10; ?> >Kleidung</option>
                <option value="11" <?php echo $drop11; ?> >Freizeit,Hobby</option>
                <option value="12" <?php echo $drop12; ?> >Musikinstrumente</option>
                <option value="13" <?php echo $drop13; ?> >Münzen</option>
                <option value="14" <?php echo $drop14; ?> >Sammeln,Seltenes</option>
                <option value="15" <?php echo $drop15; ?> >Spielzeug</option>
                <option value="16" <?php echo $drop16; ?> >Sport</option>
                <option value="17" <?php echo $drop17; ?> >Tierzubehör</option>
                <option value="18" <?php echo $drop18; ?> >Schmuck</option>
                <option value="19" <?php echo $drop19; ?> >Wein,Genus</option>
            </select>

            <img src='<?php echo $inserat["BILD"]; ?>'>
        </div>

        <div class="box-2">


            <table border="0">
                <tr>
                    <td colspan="2">

                        <p><input type='text' name='titel' placeholder='Titel*' required value='<?php echo $inserat["TITEL"]; ?>'></p>

                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr class="smallBorder">
                    </td>
                </tr>
                <tr>
                    <td>Dauer von:<input type='date' name='vonDatum' placeholder='von*' required style="width: 95%;" value='<?php echo $inserat["ANGEZEIGT_VON"]; ?>'>
                    </td>
                    <td> bis:<input type='date' name='bisDatum' placeholder='bis*' required value='<?php echo $inserat["ANGEZEIGT_BIS"]; ?>'>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr class="smallBorder">
                    </td>
                </tr>
                <tr>
                    <td>Startpreis:<input type='number' name='startPreis' placeholder='Startpreis*' required style="width: 95%;" value='<?php echo $inserat["PREIS_START"]; ?>'>
                    </td>
                    <td>Sofort kaufen Preis:<input type='number' name='endPreis' placeholder='Sofort kaufen Preis*' required value='<?php echo $inserat["PREIS_ENDE"]; ?>'>
                    </td>
                </tr>
                <td colspan="2">
                    <hr class="smallBorder">
                </td>
                <tr>
                    <td colspan="2">
                        <p><textarea name="message" rows="10" placeholder='Beschreibung*'><?php echo $inserat["INHALT"]; ?></textarea></p>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="container-2">
        <div class="box-2">
            <hr class="smallBorder">
            <input class="save" type="submit" value="SPEICHERN">
            <input type='hidden' name='inseratID' value='<?php echo $inserat["INSERATE_ID"]; ?>'>
            <input type='hidden' name='picID' value='<?php echo $inserat["BILD"]; ?>'>
        </div>
    </div>
</form>
<form id="upload" name="uploadformular" enctype="multipart/form-data" action="dateiupload.php" method="post">
    <input id="datausw" type="file" name="uploaddatei" size="60" maxlength="255">
    <input id="hochladen" type="Submit" name="submit" value="Datei hochladen">
    <input type='hidden' name='inseratID' value='<?php echo $inserat["INSERATE_ID"]; ?>'>
</form>

<?php include("footer.html"); ?>
