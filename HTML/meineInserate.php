<style>
    h3 {
        margin-top: 0.5em;
        margin-bottom: 0.5em;
        position: relative;
        left: 0px;
        top: 0px;
        font-size: 40px;
    }

    table img {
        height: 6em;
        width: 6em;
    }

    table {
        border: none;
        border-radius: 10px;
        background-color: rgb(59, 172, 183);
        width: 80%;
        height: 8em;
        margin-left: 4em;

    }


    input[type=button] {
        width: 80%;
        background-color: blue;
        color: white;
        padding: 14px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=button]:hover {
        background-color: #45a049;
    }

    #login {
        display: none;
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
    #eingeloggt {
        width: 500px;
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
        // Datenbank Auslesen (VARIABELN SIND NOCH FALSCH BENAMST)

        $userData = $_SESSION["userData"];

        $sql =
        "SELECT * ".
        "FROM inserate ".
        "WHERE inserate.USER_ID = " . $userData["USER_ID"];

        $result = mysql_query ($sql);


        $kategorienRows = array();
        $katRows = array();

        while(($kategorienRows = mysql_fetch_array($result)))
        {
            $katRows[] = $kategorienRows;
        }

        //**********************************************************************************
        // Meine Inserate anzeigen

        if (count($katRows))
        {
          $user = $userData["BENUTZERNAME"];
          echo "<p style='text-align:right;margin-right:20px; font-size:120%'>Angemeldet als <b> $user</b></p>";
            echo "<h3>Meine Inserate</h3>";

            foreach($katRows as $key=> $item)
            {
                echo
                "<table border='0'>
                    <tr>
                        <td style='width: 8em'><img src='" . $katRows[$key]["BILD"] . "'></td>
                        <td style='font-size: 1.8em'>" . $katRows[$key]["TITEL"] . "</td>
                        <td style='width: 10em'><input type=button onClick=\"location.href='inseratManipulation.php?id=" . $katRows[$key]["INSERATE_ID"] . "'\" value='BEARBEITEN'></td>
                    </tr>
                </table><br>";
            }

        }
        else
        {
            echo "<h3>Sie haben noch keine eigenen Inserate</h3>";
        }

        echo
        "<table border='0'>
            <tr>
                <td></td>
                <td style='width: 10em'><input type=button onClick=\"location.href='inseratManipulation.php?id=neu'\" value='NEU'></td>
            </tr>
        </table><br><br><br><br>";

        //***********************************************************************************

    }
    else
    {
        echo "<h3>Melden Sie sich bitte zuerst an</h3>
        <input type=button onClick=\"location.href='login.php'\" value='ZUR ANMELDUNG'>
        <br><br>";
    }
?>

<?php include("footer.html"); ?>
