<?php
session_start();
?>
<?php
//Variable für zu öffnenden Ordner
$ordner = "dateien";
		//Get erhalten
		if (isset($_GET['delete'])) {
			//Ordner öffnen
			chdir($ordner);
			//Variable belegen
			$datei = $_GET['delete'];
			$dateialt = $datei;
			
			//Zaehler aus Dateinamen auslesen und um 1 erhöhen
			$zaehler = substr($datei,7,1);
			floatval($zaehler);
			$zaehler;
			$zaehler = $zaehler+1;
			$strzaehler = (string) $zaehler;
			
			//umbenennen
			$datei = substr_replace($datei, $strzaehler, 7, 1);
			rename($dateialt, $datei);
			
			//ID aus Zähler lesen
			$datei = substr($datei,9,13);
			
			//Ordner zurück zum Hauptverzeichnis
			$ordner = "..";
			chdir($ordner);
			//Array in Session Variable speichern und aktuelle Datei an Array anhängen
			include ("array.php");
			$array = $_SESSION['array'];
			array_push($array,$datei);
			$_SESSION['array'] = $array;
			//Variablen leeren
			unset($datei);
			unset($dateialt);
			header("Location: index.php");
		}

?>
<?php
	//Logdatei
	$log = fopen('logs/log.csv', 'a');
	$ip = getenv ("REMOTE_ADDR"); // get the ip number of the user
	$logziel = array(date('d M Y H:i:s'),"$ip",'Bild zum löschen vorgeschlagen:',$_GET['delete'],"neue Zaehlernummer:",$strzaehler);
	array_push($logziel,$ziel);
	fputcsv($log, $logziel,';','"');

	fclose($log);
?>