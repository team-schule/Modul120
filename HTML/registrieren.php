<html>

<head>
    <meta charset=utf-8>
    <title>Registrieren</title>
</head>
<h1>Sich Kostenlos Registrieren</h1>

<body>
<?php
require_once("db.inc.php");
verbindung_mysql("Modul120");

echo "<br>";

echo "
<form action='registrieren.php' method='post'>

  <table>
      <tr>
          <td>
            <input type='radio' name='geschlecht' value='gruen' checked='checked'> Herr
            <input type='radio' name='geschlecht' value='gelb'> Frau
          </td>
      </tr>
      <tr>
        <td>
          Vorname:
        </td>
        <td>
          <input type='text' name='vorname'>
        </td>
      </tr>
      <tr>
        <td>
          Nachname:
        </td>
        <td>
          <input type='text' name='nachname'>
        </td>
      </tr>
      <tr>
        <td>
          Strasse:
        </td>
        <td>
          <input type='text' name='strasse'>
        </td>
      </tr>
      <tr>
        <td>
          PLZ:
        </td>
        <td>
          <input type='number' name='plz'>
        </td>
      </tr>
      <tr>
        <td>
          Ort:
        </td>
        <td>
          <input type='text' name='ort'>
        </td>
      </tr>
      <tr>
        <td>
          Geburtsdatum:
        </td>
        <td>
          <input type='date' name='datum'>
        </td>
    </tr>
    <tr>
      <td>
        Benutzername:
      </td>
      <td>
        <input type='text' name='benutzername'>
      </td>
    </tr>
    <tr>
      <td>
        E-Mail:
      </td>
      <td>
        <input type='email' name='email'>
      </td>
    </tr>
    <tr>
      <td>
        Passwort:
      </td>
      <td>
        <input type='password' name='password'>
      </td>
    </tr>
    <tr>
      <td>
        <input type='submit' name='add' value='Abschicken'>
      </td>
      <td>
        <input type='reset' value='Zurücksetzen'>
      </td>
    </tr>
  </table>
</form>";

if(isset($_POST['add']))
{
$timestamp = time();
$datum = date("y.m.d", $timestamp);
  $eintrag = "INSERT INTO users (ERFASST_AM, LETZTE_AKTIVITAT, VORNAME, NACHNAME, TOTAL_INSERATE, TOTAL_AUSGABEN, TOTAL_ERTRAG, LOGIN_UID, LOGIN_PWD)
  			VALUES ('$datum', '$datum', '$_POST[vorname]', '$_POST[nachname]', '0', '0.00', '0.00', '$_POST[benutzername]', '$_POST[password]')";
        "INSERT INTO adressen (STRASSE, PLZ, ORT, EMAIL, MOBILE) VALUES ('$_POST[strasse]', '$_POST[plz]', '$_POST[ort]', '$_POST[email]', '000 000 00 00')";


  		$result = mysql_query($eintrag);
  			if ($result > 0)
  			{
        echo "Datensatz wurde erfasst <br>";
  			}
  			else
  			{
  			echo "Error <br>";
  			}



}



mysql_close($verbindung);

 ?>
