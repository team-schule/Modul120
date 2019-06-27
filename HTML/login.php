<?php
include("db.inc.php");
?>

<?php session_start (); ?>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">

    <style>
    input[type=password],
    input[type=text], select
    {
      width: 400px;
      padding: 10px 20px;
      margin-left: 80px;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit],
    input[type=button]
    {
      width: 30em;
      background-color: blue;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      margin-left: 80px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

  input[type=submit]:hover,
  input[type=button]:hover
  {
    background-color: #45a049;
  }

  div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
  }
    </style>
</head>

<body>

    <?php
      if (isset ($_REQUEST["fehler"]))
      {
          echo "<h2>Die Zugangsdaten waren ungültig.</h2>";
      }
    ?>
    <div>
    <h1>Benutzerlogin</h1>
    <form action="loginVerarbeitung.php" method="post">
        <p><input type="text" name="name" placeholder="Benutzername..." required></p>
        <p><input type="password" name="pwd" placeholder="Kennwort..." required></p>
        <p><input type="submit" value="Anmelden">
    </form>
      <p><input type=button onClick="location.href='registrieren.php'" value='Registrieren'></p>
</div>
</body>

</html>
