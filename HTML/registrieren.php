<style>
  input[type=password],
  input[type=email],
  input[type=number],
  input[type=text], select {
  width: 400px;
  padding: 10px 20px;
  margin-left: 80px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
select[name=monat]{
  width: 120px;
  padding: 10px 20px;
  margin-left: 5px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[name=jahr]{
  width: 120px;
  padding: 10px 20px;
  margin-left: 5px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


input[type=submit] {
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

input[type=submit]:hover {
  background-color: #45a049;
}


</style>

<?php
require_once("db.inc.php");
verbindung_mysql("Modul120");
include("header.html");

echo "<br>";

echo "
<div>
<form action='registrieren.php' method='post'>

    <p><input type='radio' name='geschlecht' checked style='margin-left: 80px'> Herr
        <input type='radio' name='geschlecht'> Frau </p>
    <p><input type='text' name='vorname' placeholder='Vorname*' required> </p>
    <p><input type='text' name='nachname' placeholder='Nachname*' required> </p>
    <p> <input type='text' name='strasse' placeholder='Strasse*' required > </p>
    <p> <input type='number' name='plz' placeholder='PLZ*' required> </p>
    <p> <input type='text' name='ort' placeholder='Ort*'required> </p>
    <p> <select name='tag' required style='width:10em'>
          <option disabled selected hidden>Tag*</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
          <option>9</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
          <option>13</option>
          <option>14</option>
          <option>15</option>
          <option>16</option>
          <option>17</option>
          <option>18</option>
          <option>19</option>
          <option>20</option>
          <option>21</option>
          <option>22</option>
          <option>23</option>
          <option>24</option>
          <option>25</option>
          <option>26</option>
          <option>27</option>
          <option>28</option>
          <option>29</option>
          <option>30</option>
          <option>31</option>
        </select>
        <select name='monat' required>
          <option disabled selected hidden>Monat*</option>
          <option>Januar</option>
          <option>Februar</option>
          <option>März</option>
          <option>April</option>
          <option>Mai</option>
          <option>Juni</option>
          <option>Juli</option>
          <option>August</option>
          <option>September</option>
          <option>Oktober</option>
          <option>November</option>
          <option>Dezember</option>
        <input type='number' name='jahr' min='1900' max='2019' placeholder='Jahr*' style='width:10em'>


    <p> <input type='text' name='benutzername' placeholder='Benutzername*' required size='30'> </p>
    <p> <input type='email' name='email' placeholder='E-Mail-Adresse*' required size='30'> </p>
    <p> <input type='password' name='password' placeholder='Passwort*' required size='30'> </p>
    <p> <input type='submit' name='add' value='Abschicken'></p>

</form>";
echo "<p><b>Hinweis:</b> Bitte die mit * gekennzeichneten Felder ausfüllen.</p> </div>";


if(isset($_POST['add']))
{
$timestamp = time();
$datum = date("y.m.d", $timestamp);
  $eintrag = "INSERT INTO users (VORNAME, NACHNAME, EMAIL, MOBILE, ERFASST_AM, LETZTE_AKTIVITAT, TOTAL_INSERATE,TOTAL_AUSGABEN, TOTAL_ERTRAG, BENUTZERNAME, PASSWORT)
  			         VALUES ('$_POST[vorname]', '$_POST[nachname]', '$_POST[email]', '000 000 00 00','$datum', '$datum', '0', '0.00', '0.00', '$_POST[benutzername]', '$_POST[password]')";




  		$result = mysql_query($eintrag);
  			if ($result > 0)
  			{
          //  header ("Location: index.php");
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

                $eintrag2 =          "INSERT INTO adressen (USER_ID, ADRESSTYP_ID, STRASSE, PLZ, ORT)
                                        VALUES ('$userid', '1', '$strasse', '$plz', '$ort')";

          $result2 = mysql_query($eintrag2);
          if ($result2 > 0)
          {
            header ("Location: login.php");
          }
          else
          {
          echo "Error <br>";
          }
}







mysql_close($verbindung);
include("footer.html");
 ?>
