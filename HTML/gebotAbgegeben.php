<?php
    session_start();
    include("db.inc.php");
    include("header.html");
    verbindung_mysql("Modul120");


?>

<style>
    h6 {
        position: relative;
        left: 0px;
        top: 0px;
        font-size: 30px;
        text-align: center;
    }

    input[type=button] {
        width: 20em;
        background-color: blue;
        color: white;
        padding: 14px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: block;
        margin: 0 auto;
    }

    input[type=button]:hover {
        background-color: #45a049;
    }

    #eingeloggt {
        display:none;
    }
    .log {
        display: none;
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


        $id = $_SESSION["inseratid"];

        $inseratData = $_SESSION["inserat"];
        $titel = $inseratData["TITEL"];
        $preis = $_POST["jahr"];
        $endpreis = $inseratData["PREIS_ENDE"];
        $vorname = $inseratData["VORNAME"];
        $nachname = $inseratData["NACHNAME"];
        $ort = $inseratData["ORT"];
        $strasse = $inseratData["STRASSE"];
        $plz = $inseratData["PLZ"];
        $email = $inseratData["EMAIL"];
        $phone = $inseratData["MOBILE"];

        if(isset($_POST["gebot"]))
        {
          $sql = "UPDATE inserate SET PREIS_START ='$preis' WHERE INSERATE_ID='$id'";
          $result = mysql_query ($sql);

          if($preis == $endpreis)
          {
            echo "<h6>! Herzlichen Glückwunsch ! Sie haben erfolgreich den
                  <br>Artikel: <font style='color:blue'>$titel</font>
                  <br>für <font style='color:red'>CHF $endpreis</font> ersteigert </h6>
                  <input type=button onClick=\"location.href='index.php'\" value='WEITER EINKAUFEN'>
                  <h6>Bitte Kontaktieren Sie den Verkäufer oder Verkäuferinn:
                  <br>
                  <br>Name: $vorname
                  <br>Vornmae: $nachname
                  <br>Strasse: $strasse
                  <br>PLZ: $plz
                  <br>Ort: $ort
                  <br>Telefon: $phone
                  <br>
                  <br>E-Mail: <a href='mailto:$email' target='_top'>$email</a>
                  </h6>";
            $sql = "DELETE from inserate where INSERATE_ID='$id'";
            $result = mysql_query($sql);

          }
          else
          {
            echo "<h6>Glückwunsch Sie haben ein Gebot von <font style='color:red'>CHF $preis</font> abgegeben<br> für den Artikel:
                <br><a href='inserat.php?id=$id'>$titel</a></h6>
                <input type=button onClick=\"location.href='index.php'\" value='WEITER EINKAUFEN'>
                <br><br>";
          }
        }
        if(isset($_POST["sofort"]))
        {

          echo "<h6>! Herzlichen Glückwunsch ! Sie haben erfolgreich den
                <br>Artikel: <font style='color:blue'>$titel</font>
                <br>für <font style='color:red'>CHF $endpreis</font> ersteigert </h6>
                <input type=button onClick=\"location.href='index.php'\" value='WEITER EINKAUFEN'>
                <h6>Bitte Kontaktieren Sie den Verkäufer oder Verkäuferinn:
                <br>
                <br>Name: $vorname
                <br>Vornmae: $nachname
                <br>Strasse: $strasse
                <br>PLZ: $plz
                <br>Ort: $ort
                <br>Telefon: $phone
                <br>
                <br>E-Mail: <a href='mailto:$email' target='_top'>$email</a>
                </h6>";
                $sql = "DELETE from inserate where INSERATE_ID='$id'";
                $result = mysql_query($sql);

      }


  }
  else
  {
      echo "<style>
              .log
              {
                display:none;
              }

        </style>";

        echo "<h3>Melden Sie sich bitte zuerst an</h3>
        <input type=button onClick=\"location.href='login.php'\" value='ZUR ANMELDUNG'>
        <br><br>";
    }

?>


<?php include("footer.html"); ?>
