<?php
//@Quelle: http://php.net/manual/de/function.readdir.php
//Auslesen aus txt wann Dateien entfernt werden sollen
$dateihandle = fopen("alt.txt","r");
$zeile = fgets($dateihandle);

//Ordner dateien öffnen
$ordner = opendir("dateien/");

//Dateien auslesen und wenn Zeit überschritten löschen
while($datei = readdir($ordner)){
   if($datei != "." && $datei != ".." ){
		if(strtotime($zeile) > @filemtime("dateien/".$datei)) { 
			if(unlink("dateien/".$datei));
		}
   }
}
// Verzeichnis schließen
closedir($ordner);

?>