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
        $sql = "UPDATE inserate SET PREIS_START ='$preis' WHERE INSERATE_ID='$id'";
        $result = mysql_query ($sql);
        echo "<h6>Glückwunsch Sie haben ein Gebot von <font style='color:red'>CHF $preis</font> abgegeben<br> für den Artikel:
        <br><a href='inserat.php?id=$id'>$titel</h6>
        <input type=button onClick=\"location.href='index.php'\" value='WEITER EINKAUFEN'>
        <br><br>";

    }
    else
    {
         echo "<style>

                .log {
                    display:none;
                }

        </style>";

        echo "<h3>Melden Sie sich bitte zuerst an</h3>
        <input type=button onClick=\"location.href='login.php'\" value='ZUR ANMELDUNG'>
        <br><br>";
    }

?>


<?php include("footer.html"); ?>
