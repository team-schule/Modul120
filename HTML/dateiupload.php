<?php
    session_start();
    include("db.inc.php");
    verbindung_mysql("Modul120");
        
if ( $_FILES['uploaddatei']['name']  <> "" )
{
    // Datei wurde durch HTML-Formular hochgeladen
    // und kann nun weiterverarbeitet werden
 
    // Kontrolle, ob Dateityp zulässig ist
    $zugelassenedateitypen = array("image/png", "image/jpeg", "image/gif");
 
    if ( ! in_array( $_FILES['uploaddatei']['type'] , $zugelassenedateitypen ))
    {
        echo "<p>Dateitype ist NICHT zugelassen";
    }
    else
    {   $ablagepfad = "'Bilder/". $_FILES['uploaddatei']['name'] . "'";
        move_uploaded_file (
             $_FILES['uploaddatei']['tmp_name'] ,
             'Bilder/'. $_FILES['uploaddatei']['name'] );
        
 if (isset($_POST["inseratID"])){
     
     $inseratid = $_POST["inseratID"];
     $sql = "UPDATE inserate SET BILD=$ablagepfad where INSERATE_ID = $inseratid ";
     $result = mysql_query($sql);
     
    } 
  }
}
header("Location: inseratManipulation.php?id=$inseratid");

?>