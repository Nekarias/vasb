<?php
session_start();
?>
<?php
// @Quelle: http://www.php-resource.de/forum/showthread/t-15789.html
// @Quelle: https://www.php.de/forum/webentwicklung/php-einsteiger/php-tipps-2005-2/30245-text-in-bild-mit-zeilenumbruch
// @Quelle: http://www.buha.info/showthread.php?40305-PHP-Zeilenumbruch-bei-ImageString()-wie
			
			//Text nach 45 Zeichen mit Zeilenumbruch versehen
			$marker = ("<br />\n");
			$text = wordwrap($_POST['textfeld'], 45, $marker);
			$lines = explode($marker, $text);
			
			//Zählen der Array Elemente und erstellen der Variablen
			$result = count($lines);
			$i = 0;
			$b = 0;
			$y = 20;
			$h = 20;
			
			//while-Schleife wird ausgeführt, nach Anzahl der Zeilen
			while($result > $b) {
			// Höhe des Bildes ermitteln
			$h = $h+20;
			++$b;
			}
			
			//Bild erstellen
			$image = imagecreate(600,$h);
			
			// Hintergrundfarbe des Bildes Festlegen
			ImageColorAllocate ($image, 12, 58, 94);
			
			// Set the enviroment variable for GD
			putenv('GDFONTPATH=' . realpath('.'));

			// Name the font to be used (note the lack of the .ttf extension)
			$font = 'arial.ttf';		
			
			//Schriftfarbe
			$white = ImageColorAllocate($image,255,255,255);
			
			//while-Schleife wird ausgeführt, nach Anzahl der Zeilen
			while($result > $i) {
			// Text in Bild übergeben
			imagettftext($image, 20, 0, 10, $y, $white, $font, $lines[$i]);
			$y = $y+23;	
			++$i;
			}

			//Bild in Datei Speichern
			imagepng($image,"test.jpg"); 
		

?>
<?php
	//Aktuelles Datum einlesen und Format umwandeln
	$id = uniqid();

	$address = $_SESSION['address'];

	//Quell- und Zielpfad definieren
	//Relative Pfade eintragen
	$quelle = "test.jpg";
	$ziel = "dateien/zaehler0-$id-$address.jpg";

	// Datei in den Zielpfad zu verschieben (kopieren/löschen)
	// Löschen findet nur statt, wenn Kopieren erfolgreich war
	if (copy($quelle ,$ziel)) {
	unlink($quelle);}
	
	//Rückführung auf die index.php
	header("Location: index.php");
?>

<?php
	//Logdatei
	$log = fopen('logs/log.csv', 'a');
	$ip = getenv ("REMOTE_ADDR"); // get the ip number of the user
	$logziel = array(date('d M Y H:i:s'),"$ip",'Text erstellt:',$_POST['textfeld'],'Datei gespeichert unter:');
	array_push($logziel,$ziel);
	fputcsv($log, $logziel,';','"');

	fclose($log);
?>