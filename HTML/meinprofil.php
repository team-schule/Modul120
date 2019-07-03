<?php
ob_start();
session_start();
include("header.html");
require_once("db.inc.php");
verbindung_mysql("Modul120");

$userData = $_SESSION["userData"];

$userid = $userData["USER_ID"];
$sql = "SELECT * from adressen where USER_ID = '$userid' and ADRESSTYP_ID = 1";
$result = mysql_query ($sql);
$data = mysql_fetch_array ($result);
$_SESSION["adressen"] = $data;
$adressenPrivat = $_SESSION["adressen"];
$sql = "SELECT * from adressen where USER_ID = '$userid' and ADRESSTYP_ID = 2";
$result = mysql_query ($sql);
$data = mysql_fetch_array ($result);
$_SESSION["adressen"] = $data;
$adressenGeschaeft = $_SESSION["adressen"];
$sql = "SELECT * from adressen where USER_ID = '$userid' and ADRESSTYP_ID = 3";
$result = mysql_query ($sql);
$data = mysql_fetch_array ($result);
$_SESSION["adressen"] = $data;
$adressenPostfach = $_SESSION["adressen"];
$sql = "SELECT * from users where USER_ID = '$userid'";
$result = mysql_query ($sql);
$data = mysql_fetch_array ($result);
$_SESSION["user"] = $data;
$user = $_SESSION["user"];
?>

<style>
  .meinprofil img{
        width: 15%;
        border-radius: 30px;
      }

  input[type=submit] {
          width: 10em;
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

.meinprofil{
      padding-left: 80px;
      margin-bottom: 100px;
      }

.meinprofil p{
      padding-left: 80px;
      font-size: 120%;
      }

.meinprofil h5{
      font-size: 180%;
      }

.meinprofil h4{
      font-size: 140%;
      color: rgb(76, 108, 195);
      }
</style>

    <div class="meinprofil">
                <h3>Benutzerkonto</h3>

                <?php
                      if (isset ($_REQUEST["aendern"]))
                {
                              echo "<h4>Die Daten wurden erfolgreich geändert</h4>";
                }
                else if (isset ($_REQUEST["hinzu"])){
                              echo "<h4>Die Daten wurden erfolgreich hinzugefügt</h4>";
                }
                ?>

                <img src='Bilder/profil.png'>
                <h5>Benutzerangaben</h5>

                <form action="meinprofil.php" method="post">
                  <p>Vorname*</p>
                  <input type="text" name="vorname" placeholder="Vorname*" required value="<?php echo $user['VORNAME'];?>">
                  <p>Nachname*</p>
                  <input type="text" name="nachname" placeholder="Nachname*" required value="<?php echo $user['NACHNAME'];?>">
                  <p>Benutzername*</p>
                  <input type="text" name="benutzername" placeholder="Benutzername*" required value="<?php echo $user['BENUTZERNAME'];?>">
                  <p>Passwort*</p>
                  <input type="password" name="passwort" placeholder="Passwort*" required value="<?php echo $user['PASSWORT'];?>">
                  <p>E-Mail*</p>
                  <input type="email" name="email" placeholder="E-Mail*" required value="<?php echo $user['EMAIL'];?>">
                  <p>Telefonnummer</p>
                  <input type="text" name="tel" placeholder="Telefonnummer" value="<?php echo $user['MOBILE'];?>">
                  <input type="submit" name="benutzer" value="Ändern">
                  <p><b>Hinweis:</b> Bitte die mit * gekennzeichneten Felder ausfüllen.</p>
                </form>

                <h5>Adressen</h5>
                <h4>Privatadresse</h4>
                <form action="meinprofil.php" method="post">
                  <p>Strasse*</p>
                  <input type="text" name="strasse" placeholder="Strasse*" required value="<?php echo $adressenPrivat['STRASSE'];?>">
                  <p>PLZ*</p>
                  <input type="number" name="plz" placeholder="PLZ*" min="1000" max="9658" required value="<?php echo $adressenPrivat['PLZ'];?>">
                  <p>Ort*</p>
                  <input type="text" name="ort" placeholder="Ort*" required value="<?php echo $adressenPrivat['ORT'];?>">
                  <input type='submit' name='privat' value='Ändern'>
                  <p><b>Hinweis:</b> Bitte die mit * gekennzeichneten Felder ausfüllen.</p>
                </form>

                <h4>Geschäftsadresse</h4>
                <form action="meinprofil.php" method="post">
                  <p>Strasse*</p>
                  <input type="text" name="strasse" placeholder="Strasse*" required value="<?php echo $adressenGeschaeft['STRASSE'];?>">
                  <p>PLZ*</p>
                  <input type="number" name="plz" placeholder="PLZ*" min="1000" max="9658" required value="<?php echo $adressenGeschaeft['PLZ'];?>">
                  <p>Ort*</p>
                  <input type="text" name="ort" placeholder="Ort*" required value="<?php echo $adressenGeschaeft['ORT'];?>">

                  <?php
                    if ($adressenGeschaeft['STRASSE'] == null)
                    {
                      echo"  <input type='submit' name='geschaefthinzu' value='Hinzufügen'>";
                    }
                    else
                    {
                      echo"  <input type='submit' name='geschaeft' value='Ändern'>";
                    }
                  ?>

                  <p><b>Hinweis:</b> Bitte die mit * gekennzeichneten Felder ausfüllen.</p>
                </form>

                <form action="meinprofil.php" method="post">
                  <h4>Postfach</h4>
                  <p>Strasse*</p>
                  <input type="text" name="strasse*" placeholder="Strasse" value="<?php echo $adressenPostfach['STRASSE'];?>">
                  <p>PLZ*</p>
                  <input type="number" name="plz*" placeholder="PLZ" min="1000" max="9658" value="<?php echo $adressenPostfach['PLZ'];?>">
                  <p>Ort*</p>
                  <input type="text" name="ort*" placeholder="Ort" value="<?php echo $adressenPostfach['ORT'];?>">

                  <?php
                    if ($adressenPostfach['STRASSE'] == null)
                    {
                      echo"  <input type='submit' name='Postfachhinzu' value='Hinzufügen'>";
                    }
                    else
                    {
                      echo"  <input type='submit' name='postfach' value='Ändern'>";
                    }
                    ?>

                    <p><b>Hinweis:</b> Bitte die mit * gekennzeichneten Felder ausfüllen.</p>
                  </form>

                  <?php
                    if (isset($_POST['benutzer']))
                    {
                      $vorname = $_POST['vorname'];
                      $nachname = $_POST['nachname'];
                      $email = $_POST['email'];
                      $mobile = $_POST['tel'];
                      $benutzername = $_POST['benutzername'];
                      $passwort = $_POST['passwort'];

                      $sql2 = "UPDATE users SET VORNAME ='$vorname', NACHNAME ='$nachname', EMAIL ='$email', MOBILE ='$mobile',
		                            BENUTZERNAME ='$benutzername', PASSWORT ='$passwort'
	                               WHERE USER_ID='$userid'";

                         $result2 = mysql_query ($sql2);

		                       if ($result2 > 0)
		                       {
                              header("Location: meinprofil.php?aendern");
		                       }
		                       else
		                       {
			                          echo "Edit fehlgeschlagen";
		                       }
                        }
                      ?>

                      <?php
                          if (isset($_POST['privat']))
                          {
                              $strasse = $_POST['strasse'];
                              $plz = $_POST['plz'];
                              $ort = $_POST['ort'];


                              $sql3 = "UPDATE adressen SET STRASSE ='$strasse', PLZ ='$plz', ORT ='$ort', ADRESSTYP_ID= 1
                                        WHERE USER_ID='$userid' and ADRESSTYP_ID=1";

                              $result3 = mysql_query ($sql3);

                              if ($result3 > 0)
                              {
                                    header ("Location: meinprofil.php?aendern");
                              }
                              else
                              {
                                    echo "		Edit fehlgeschlagen";
                              }
                            }
                          ?>

                          <?php
                              if (isset($_POST['geschaeft']))
                              {
                                  $strasse = $_POST['strasse'];
                                  $plz = $_POST['plz'];
                                  $ort = $_POST['ort'];

                                  $sql4 = "UPDATE adressen SET STRASSE ='$strasse', PLZ ='$plz', ORT ='$ort', ADRESSTYP_ID= 2
                                            WHERE USER_ID='$userid'and ADRESSTYP_ID=2";

                                  $result4 = mysql_query ($sql4);

                                  if ($result4 > 0)
                                  {
                                      header ("Location: meinprofil.php?aendern");
                                  }
                                  else
                                  {
                                      echo "		Edit fehlgeschlagen";
                                  }
                                }
                            ?>

                            <?php
                                if (isset($_POST['postfach']))
                                {
                                  $strasse = $_POST['strasse'];
                                  $plz = $_POST['plz'];
                                  $ort = $_POST['ort'];

                                  $sql5 = "UPDATE adressen SET STRASSE ='$strasse', PLZ ='$plz', ORT ='$ort', ADRESSTYP_ID= 3
                                            WHERE USER_ID='$userid' and ADRESSTYP_ID=3";

                                  $result5 = mysql_query ($sql5);

                                    if ($result5 > 0)
                                    {
                                        header ("Location: meinprofil.php?aendern");
                                    }
                                    else
                                    {
                                        echo "		Edit fehlgeschlagen";
                                    }
                                  }
                              ?>

                              <?php
                                  if (isset($_POST['geschaefthinzu']))
                                  {
                                    $strasse = $_POST['strasse'];
                                    $plz = $_POST['plz'];
                                    $ort = $_POST['ort'];

                                    $sql5 = "INSERT into adressen (USER_ID, ADRESSTYP_ID, STRASSE, PLZ, ORT)
                                                VALUES ('$userid', 2, '$strasse', '$plz', '$ort')";

                                    $result5 = mysql_query ($sql5);

                                      if ($result5 > 0)
                                      {
                                          header ("Location: meinprofil.php?hinzu");
                                      }
                                      else
                                      {
                                          echo "		Edit fehlgeschlagen";
                                      }
                                    }
                                  ?>

                                  <?php
                                      if (isset($_POST['Postfachhinzu']))
                                      {
                                          $strasse = $_POST['strasse'];
                                          $plz = $_POST['plz'];
                                          $ort = $_POST['ort'];

                                          $sql6 = "INSERT into adressen (USER_ID, ADRESSTYP_ID, STRASSE, PLZ, ORT)
                                                      VALUES ('$userid', 3, '$strasse', '$plz', '$ort')";
                                          $result6 = mysql_query ($sql6);

                                          if ($result6 > 0)
                                          {
                                              header ("Location: meinprofil.php?hinzu");
                                          }
                                          else
                                          {
                                              echo "		Edit fehlgeschlagen";
                                          }
                                        }
                                      ?>
      </div>

<?php
include("footer.html");
mysql_close($verbindung);
?>
