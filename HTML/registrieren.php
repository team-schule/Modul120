<?php
session_start();
ob_start();
require_once("db.inc.php");
verbindung_mysql("Modul120");
include("header.html");
?>
<style>
  input[type=password],
  input[type=email],
  input[type=number],
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
  select[name=monat]
  {
    width: 120px;
    padding: 10px 20px;
    margin-left: 5px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  input[name=jahr]
  {
    width: 120px;
    padding: 10px 20px;
    margin-left: 5px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  input[type=submit]
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
  input[type=submit]:hover
  {
    background-color: #45a049;
  }
  h5
  {
    font-size: 150%;
  }
  #login
  {
    display: none;
  }
  .log
  {
    display: none;
  }

</style>


<?php
  if (isset ($_REQUEST["fehlerbenutzer"]))
  {
    $benutzername = $_SESSION["benutzername"];
    echo "<h5 style='margin-left:20px'>Der Benutzername <b style='color:red'>$benutzername</b> ist schon vergeben !</h5>";
    $vorname = $_SESSION['vorname'];
    $nachname = $_SESSION['nachname'];
    $strasse = $_SESSION['strasse'];
    $plz = $_SESSION['plz'];
    $ort = $_SESSION['ort'];
    $tag = $_SESSION['tag'];
    $monat = $_SESSION['monat'];
    $jahr = $_SESSION['jahr'];
    $benutzername = "";
    $password = $_SESSION['password'];
    $passwordCheck = $_SESSION['passwordCheck'];
    $email = $_SESSION['email'];
  }
  elseif (isset($_REQUEST["fehlerpasswort"]))
  {
    echo "<h5>Passwort nicht identisch</h5>";
    $vorname = $_SESSION['vorname'];
    $nachname = $_SESSION['nachname'];
    $strasse = $_SESSION['strasse'];
    $plz = $_SESSION['plz'];
    $ort = $_SESSION['ort'];
    $tag = $_SESSION['tag'];
    $monat = $_SESSION['monat'];
    $jahr = $_SESSION['jahr'];
    $benutzername = $_SESSION["benutzername"];
    $email = $_SESSION['email'];
    $password = "";
    $passwordCheck = "";
  }
  else
  {
    $vorname = "";
    $nachname = "";
    $strasse = "";
    $plz = "";
    $ort = "";
    $tag = "Tag*";
    $monat = "Monat*";
    $jahr = "";
    $benutzername = "";
    $password = "";
    $passwordCheck = "";
    $email = "";
  }
  echo "<br>";
  echo "
    <div>
      <h3>Registrieren</h3>
        <form action='registrieren.php' method='post'>
          <p><input type='radio' name='geschlecht' checked style='margin-left: 80px'> Herr
          <input type='radio' name='geschlecht'> Frau </p>
          <p><input type='text' name='vorname' placeholder='Vorname*'pattern='[a-zA-Z]{3,}'
              title='Es sind nur Buchstaben erlaubt,keine Leerzeichen' required value='$vorname'>
          </p>
          <p><input type='text' name='nachname' placeholder='Nachname*' pattern='[a-zA-Z]{3,}'
              title='Es sind nur Buchstaben erlaubt,keine Leerzeichen' required value='$nachname'>
          </p>
          <p> <input type='text' name='strasse' placeholder='Strasse*' required value='$strasse'>
          </p>
          <p> <input type='number' name='plz'  min='1000' max='9658' placeholder='PLZ*' required value='$plz'>
          </p>
          <p> <input type='text' name='ort' placeholder='Ort*'required value='$ort'>
          </p>
          <p> <select name='tag' required style='width:10em'>";
          if (isset($_REQUEST["fehlerbenutzer"]) || ($_REQUEST["fehlerpasswort"]))
          {
            echo "<option>$tag</option>";
          }
          else
          {
            echo "<option disabled selected hidden>$tag</option>";
          }
          echo "
            <option>1</option> <option>2</option> <option>3</option>
            <option>4</option> <option>5</option> <option>6</option>
            <option>7</option> <option>8</option> <option>9</option>
            <option>10</option> <option>11</option> <option>12</option>
            <option>13</option> <option>14</option> <option>15</option>
            <option>16</option> <option>17</option> <option>18</option>
            <option>19</option> <option>20</option> <option>21</option>
            <option>22</option> <option>23</option> <option>24</option>
            <option>25</option> <option>26</option> <option>27</option>
            <option>28</option> <option>29</option> <option>30</option>
            <option>31</option>
            </select>
          <select name='monat' required>";
          if (isset($_REQUEST["fehlerbenutzer"]) || ($_REQUEST["fehlerpasswort"]))
          {
            echo "<option>$monat</option>";
          }
          else
          {
            echo "<option disabled selected hidden>$monat</option>";
          }
          echo "
            <option>Januar</option> <option>Februar</option> <option>März</option>
            <option>April</option> <option>Mai</option> <option>Juni</option>
            <option>Juli</option> <option>August</option> <option>September</option>
            <option>Oktober</option> <option>November</option> <option>Dezember</option>
          </select>
          <input type='number' name='jahr' min='1900' max='2019' placeholder='Jahr*' style='width:10em' value='$jahr'>
          <p><input type='text' name='benutzername' value='$benutzername' placeholder='Benutzername*' pattern='[a-zA-Z0-9]{3,}'
                title='Es sind nur Buchstaben und Zahlen' required size='30'>
          </p>
          <p><input type='email' name='email' value='$email' placeholder='E-Mail-Adresse*'
                pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$' required size='30'>
          </p>
          <p><input type='password' name='password' value='$password' placeholder='Passwort*' pattern='[a-zA-Z0-9+*%&?!@#]{3,}'
                title='Es sind nur Buchstaben,Zahlen und Sonderzeigen erlaubt' required size='30'>
          </p>
          <p><input type='password' name='passwordCheck' value='$passwordCheck' placeholder='Passwort wiederholen*' pattern='[a-zA-Z0-9+*%&?!@#]{3,}'
                title='Es sind nur Buchstaben,Zahlen und Sonderzeigen erlaubt' required size='30'>
          </p>
          <p> <input type='submit' name='add' value='Abschicken'></p>
        </form>";
        echo "<p><b>Hinweis:</b> Bitte die mit * gekennzeichneten Felder ausfüllen.</p> </div>";


        if(isset($_POST['add']))
        {
          $benutzername = $_REQUEST["benutzername"];
          $_SESSION['vorname'] = $_POST["vorname"];
          $_SESSION['nachname'] = $_POST["nachname"];
          $_SESSION['strasse'] = $_POST["strasse"];
          $_SESSION['plz'] = $_POST["plz"];
          $_SESSION['ort'] = $_POST["ort"];
          $_SESSION['tag'] = $_POST["tag"];
          $_SESSION['monat'] = $_POST["monat"];
          $_SESSION['jahr'] = $_POST["jahr"];
          $_SESSION['benutzername'] = $_POST["benutzername"];
          $_SESSION['password'] = $_POST["password"];
          $_SESSION['passwordCheck'] = $_POST["passwordCheck"];
          $_SESSION['email'] = $_POST["email"];

          $sql3 = "SELECT * from users where BENUTZERNAME = '$benutzername'";
          $result3 = mysql_query ($sql3);

          if (mysql_num_rows ($result3) > 0)
          {
            header ("Location: registrieren.php?fehlerbenutzer");
          }
          elseif ($_SESSION["password"] != $_SESSION[passwordCheck])
          {
            header ("Location: registrieren.php?fehlerpasswort");
          }
          else
          {
            $timestamp = time();
            $datum = date("y.m.d", $timestamp);
            $eintrag = "INSERT INTO users (VORNAME, NACHNAME, EMAIL, MOBILE, ERFASST_AM, LETZTE_AKTIVITAT,
                          TOTAL_INSERATE,TOTAL_AUSGABEN, TOTAL_ERTRAG, BENUTZERNAME, PASSWORT)
          			         VALUES ('$_POST[vorname]', '$_POST[nachname]', '$_POST[email]', '000 000 00 00','$datum', '$datum',
                           '0', '0.00', '0.00', '$_POST[benutzername]', '$_POST[password]')";
            $result = mysql_query($eintrag);
          	if ($result > 0)
          	{
            }
          	else
          	{
          		echo "Error <br>";
          	}
            $sql = "SELECT ".
            "USER_ID ".
                "FROM ".
                  "users ".
                    "WHERE ".
                        "(BENUTZERNAME like '".$_POST["benutzername"]."') AND ".
                            "(PASSWORT = '". ($_POST["password"])."')";

              $result = mysql_query ($sql);
              $data = mysql_fetch_array ($result);

              $userid = $data["USER_ID"];
              $strasse = $_POST["strasse"];
              $plz = $_POST["plz"];
              $ort = $_POST["ort"];

              $eintrag2 = "INSERT INTO adressen (USER_ID, ADRESSTYP_ID, STRASSE, PLZ, ORT)
                            VALUES ('$userid', '1', '$strasse', '$plz', '$ort')";

              $result2 = mysql_query($eintrag2);
              if ($result2 > 0)
              {
                header ("Location: loginnachregistr.php");
              }
              else
              {
                echo "Error <br>";
              }
              ob_start ();
              session_start ();
              session_unset ();
              session_destroy ();
              ob_end_flush ();
            }
          }
  mysql_close($verbindung);
  include("footer.html");
?>
