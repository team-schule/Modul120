<?php
include("db.inc.php");
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
  .footer{
    height: 100%;
  }
  .reg{
    margin: 5px;
    padding-left: 80px;
    font-size: 120%;
  }


    </style>


    <?php
    include("header.html");
      if (isset ($_REQUEST["fehler"]))
      {
      echo "<script>alert('Anmeldung fehlgeschlage');</script>";
      }
    ?>
    <div class="footer">
    <h3>Benutzerlogin</h3>
    <p class="reg">Besten Dank für die Registrierung.</p>
    <p class="reg">Sie können Sich jetzt auf Tesoro.ch Einloggen</p>
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