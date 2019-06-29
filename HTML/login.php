<?php
    include("db.inc.php");
    include("header.html");
?>

<?php session_start (); ?>


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

    </style>




    <?php
      if (isset ($_REQUEST["fehler"]))
      {
          echo "<h2>Die Zugangsdaten waren ungültig.</h2>";
      }
    ?>
    
<div>
    <form action="loginVerarbeitung.php" method="post">
        <p><input type="text" name="name" placeholder="Benutzername..." required></p>
        <p><input type="password" name="pwd" placeholder="Kennwort..." required></p>
        <p><input type="submit" value="Anmelden">
    </form>
      <p><input type=button onClick="location.href='registrieren.php'" value='Registrieren'></p>
</div>

<?php
    include("footer.html");
?>