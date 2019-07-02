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
        height: 6.15em;
    }
    


    </style>


<?php
    session_start();
    include("db.inc.php");
    include("header.html");
    verbindung_mysql("Modul120");

    if (isset($_SESSION["userData"]))
    {
        //***********************************************************************************
        // Datenbank Auslesen
        
        $userData = $_SESSION["userData"];
        
        $sql =
        "SELECT * ".
        "FROM inserate ".
        "WHERE inserate.USER_ID = " . $_GET["id"] . " LIMIT 1";

        $result = mysql_query($sql);

        $inserat = mysql_fetch_array($result);
        
        //**********************************************************************************
    }
    else 
    {
        echo "<h3>Melden Sie sich bitte zuerst an</h3>
        <input type=button onClick=\"location.href='login.php'\" value='ZUR ANMELDUNG'>
        <br><br>";
    }
?>

<div class="container-1">

    <div class="box-1">
        <img src='Bilder/Coming-Soon.png'>
        <input class="pic" type=button onClick="location.href='#'" value='BILD AUSWÄHLEN'>
    </div>

    <div class="box-2">


        <table border="0">
            <tr>
                <td colspan="2">

                    <p><input type='text' name='titel' placeholder='Titel*' pattern='[a-zA-Z]{1,}' required></p>

                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr class="smallBorder">
                </td>
            </tr>
            <tr>
                <td>Dauer von:<input type='date' name='vonDatum' placeholder='von*' required style="width: 95%;">
                </td>
                <td> bis:<input type='date' name='bisDatum' placeholder='bis*' required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr class="smallBorder">
                </td>
            </tr>
            <tr>
                <td>Startpreis:<input type='number' name='startPreis' placeholder='Startpreis*' required style="width: 95%;">
                </td>
                <td>Endpreis:<input type='number' name='endPreis' placeholder='Endpreis*' required>
                </td>
            </tr>
            <td colspan="2">
                <hr class="smallBorder">
            </td>
            <tr>
                <td colspan="2">
                    <p><textarea name="message" rows="10" placeholder='Beschreibung*'></textarea></p>
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="container-2">
    <div class="box-2">
        <hr class="smallBorder">
        <input class="save" type=button onClick="location.href='#'" value='Speichern'>
    </div>
</div>

<?php include("footer.html"); ?>
