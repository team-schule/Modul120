<?php
include("db.inc.php");
?>

<?php session_start (); ?>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
</head>

<body>
  <h1>Benutzerlogin</h1>
    <?php
if (isset ($_REQUEST["fehler"]))
{
  echo "<h2>Die Zugangsdaten waren ungültig.</h2>";
}
?>

    <form action="loginVerarbeitung.php" method="post">
        Username: <input type="text" name="name" size="20"><br>
        Kennwort: <input type="password" name="pwd" size="20"><br>
        <input type="submit" value="Login">
    </form>
<input type=button onClick="location.href='registrieren.html'" value='Registrieren'>
</body>

</html>
