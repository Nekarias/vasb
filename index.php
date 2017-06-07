<?php
session_start();
include ("logfile.php");
?>
<style type="text/css">
img { max-width: 100%;}
</style>
<center>
<!doctype html>
<head>
	<html lang="de"> 
	<meta charset="utf-8">
	<title>VASB - Virtuelles Anonymes Schwarzes Brett</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<center>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<body bgcolor=0c3a5e>
	<main>
	<span style="color:white">
		<h1><a><img src="logovasb.png" alt="VASB" /><br></a></h1>
	
		<h2>Bitte erst den Ort wählen:</h2>

		<form action='geolocation.php' method='get'>
		<textarea name='address' maxlength="40" rows='1' cols='40'></textarea>
		<input type='submit' value='abschicken'></form>
	
		<?php
		$address = $_SESSION['address'];
		$string = $_SESSION['array'];		
		echo "Ihr gewählter Ort ist: ".$address;
		?>
		<br>
		<input type="button" name="standort" value="Standort ermitteln" onclick="getLocation();">
		<br><br>
		
		<?php include ("loeschen.php"); ?>
		
		<h2>Bild oder Text hochladen:</h2>

		<form>
			<input type="file" accept="image/jpeg, image/png" multiple />
			<input type='submit' value='senden'>
		</form>
		<script src="./resize.js"></script>
		<script src="./app.js"></script>
		
		<h2>&nbsp;&nbsp;Oder&nbsp;&nbsp;</h2>

		<form action='texteingabe.php' method='post' value='Max 160 Zeichen'>
		<textarea name='textfeld' maxlength="160" rows='4' cols='40' ></textarea>
		<input type='submit' value='abschicken'></form>
	
		<h2>Inhalte:</h2>
	</main>
<script>
      var address = <?php echo json_encode($address); ?>;
	  var string = <?php echo json_encode($string); ?>;
</script>

	<div id="1"></div>
	<div id="2"></div>
	<div id="3"></div>
	<div id="4"></div>
	<div id="5"></div>
	<div id="6"></div>
	<div id="7"></div>
	<div id="8"></div>
	<div id="9"></div>
	<div id="10"></div>

	<script src="./inhalte.js"></script>


</body>
<footer>
<a href="impressum.html" ...>Impressum</a>
</footer>


<script>
	function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
};
function showPosition(position) {
		var url = "geolocation.php";
		var http = new XMLHttpRequest();	
		http.open("GET", url+"?lonlat="+position.coords.latitude+","+position.coords.longitude, true);
		http.send();
		window.document.location.reload();
}
</script>
