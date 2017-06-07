<?php
session_start();
?>
<?php 

//@Quelle: http://nazcalabs.com/blog/how-to-get-gps-coordinates-from-an-address-with-php-and-google-maps/

function gettown($lonlat){
    $address = urlencode($lonlat);
    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $lonlat;
    $response = file_get_contents($url);
    $json = json_decode($response,true);
	
    $town = $json['results'][0]['address_components'][3]['long_name'];

    return array($town);
}

		if (isset($_GET['lonlat'])) {
			$lonlat = $_GET['lonlat'];
			$adresse = gettown($lonlat);
			$address = implode ($adresse,$stadt);
			$address = str_replace ("ß", "ss", $address );
			$address = str_replace ("ä", "ae", $address );
			$address = str_replace ("ä", "ae", $address );
			$address = str_replace ("ö", "oe", $address );
			$address = str_replace ("ö", "oe", $address );
			$address = str_replace ("ü", "ue", $address );
			$address = str_replace ("ü", "ue", $address );
			$address = str_replace ("Ä", "ae", $address );
			$address = str_replace ("Ö", "oe", $address );
			$address = str_replace ("Ü", "ue", $address );
			$_SESSION['address'] = "$address";
		}
		
		// Ortnamen von Sonderzeichen bereinigen
		if (isset($_GET['address'])) {
			$address = $_GET['address'];
			$address = str_replace ("ß", "ss", $address );
			$address = str_replace ("ä", "ae", $address );
			$address = str_replace ("ä", "ae", $address );
			$address = str_replace ("ö", "oe", $address );
			$address = str_replace ("ö", "oe", $address );
			$address = str_replace ("ü", "ue", $address );
			$address = str_replace ("ü", "ue", $address );
			$address = str_replace ("Ä", "ae", $address );
			$address = str_replace ("Ö", "oe", $address );
			$address = str_replace ("Ü", "ue", $address );
			//$coords = getCoordinates($address);
			//Adresse in Session-Variable speichern
			$_SESSION['address'] = "$address";
		}


//Rückführung auf die index.php
header("Location: index.php");
?>
<?php
	//Logdatei
	$log = fopen('logs/log.csv', 'a');
	$ip = getenv ("REMOTE_ADDR"); // get the ip number of the user
	$logziel = array(date('d M Y H:i:s'),"$ip",'Ort gesetzt:',$address);
	array_push($logziel,$ziel);
	fputcsv($log, $logziel,';','"');

	fclose($log);
?>