<?php



    session_start();
    include("db.inc.php");
    include("header.html");
    verbindung_mysql("Modul120");

    if (isset($_GET["id"]))
    {
        $sql =
        "SELECT * ".
        "FROM inserate ".
        "WHERE INSERATE_ID = " . $_GET["id"];

        $result = mysql_query($sql);

        $inserat = mysql_fetch_array($result);
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
        display: flex;
        padding-top: 2em;
    }

    .container-1 div {
        /*border: 1px solid;*/
    }
    
    .container-2 {
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
        min-width: 16em;
        padding-left: 1em;
        width: 16em;       
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
        text-shadow: 3px 2px red;
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

</style>

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
                <td colspan="2">Inserat-Dauer bis: <?php echo $inserat["ANGEZEIGT_BIS"]; ?>
            </tr>
            <tr>
                <td colspan="2"><hr></td>
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
                <td colspan="2"><hr></td>
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

<hr>

<div class="container-2">
    <div class="box-3">
        Beschreibung:
    </div>
    <div class="box-4">
        <?php echo $inserat["INHALT"]; ?>
    </div>
</div>

<hr>




<?php include("footer.html"); ?>
