<!DOCTYPE html>

<?php
    session_start();
?>

<html lang="en" dir="ltr">

<head>

    <meta charset="utf-8">
    <title>Projekt Modul120</title>

</head>

<body>

    <h1>Test Seite Projekt Modul120</h1>

    <?php
    if (isset($_SESSION["userData"]))
    {
        $userData = $_SESSION["userData"];
        echo "Hallo " . $userData["VORNAME"] . " du hast " . $userData["TOTAL_INSERATE"] . " Inserate am laufen";
    }
    else
    {
        echo "<input type=button onClick=\"location.href='login.php'\" value='Login'>";
    }
    
    ?>


</body>

</html>
