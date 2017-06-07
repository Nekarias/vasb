<?php
session_start();
?>
<?php
	/* Aktuelles Datum einlesen und Format umwandeln */
	$id = uniqid();
	//Ort des Nutzers aufrufen
	$address = $_SESSION['address'];
	
$filename = "dateien/zaehler0-$id-$address.jpg";

	
$status = (boolean) move_uploaded_file($_FILES['photo']['tmp_name'], $filename);

	//greyscale
	$img = imagecreatefromstring(file_get_contents($filename));
	imagefilter($img, IMG_FILTER_GRAYSCALE);
	imagejpeg($img,$filename);
	imagedestroy($img);

$response = (object) [
	'status' => $status
];

if ($status) {
	$response->url = $filename;
}
	
echo json_encode($response);
?>
<?php
	//Logdatei
	$log = fopen('logs/log.csv', 'a');
	$ip = getenv ("REMOTE_ADDR"); // get the ip number of the user
	$logziel = array(date('d M Y H:i:s'),"$ip",'Bild hochgeladen:',$filename);
	array_push($logziel,$ziel);
	fputcsv($log, $logziel,';','"');

	fclose($log);
?>
