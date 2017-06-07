src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"

	// phpscript.php aufrufen über POST aufrufen
	$.ajax({
		type: 'POST',
		data: {},
		async: false,
		dataType: 'json', 
		url: 'inhaltausliefernWS.php',
		success: function(responseData) {
			result = responseData;
		}
	});
	
	Array.from(result);	
	
	i = 0;
//@Quelle: http://sevenx.de/blog/tutorial-einfach-mit-php-ordner-auslesen-und-dateien-und-bilder-anzeigen/	
	//Array mit Bilder durchlaufen
	result.forEach(ausgabe);

	function ausgabe(array,i) {
		
		//Dateinamen des Bildes extrahieren ohne Ordnder
		url = array;
		this.url = url.substr(8);
		
		//ort extrahieren
		ort = url;
		ort = ort.substr(23);
		
		//Bild-ID
		bildid = url;
		bildid = bildid.substr(9,13);
		
		//Zaehlernr. aus String auslesen
		zaehler = url;
		zaehler = zaehler.substr(7,1);
		
		//Ortübereinstimmung
		ortstimmt = ort.includes(address);
		
		//Stringübereinstimmung für Bilder die man nicht mehr sehen möchte
		
		ausgeblendet = "test";
		
		if(string !=null){
		ausgeblendet = string.includes(bildid);
		}
	

		i++;


		if(zaehler < 11 && ortstimmt && ausgeblendet != true){
			
			if(i == 1){
			document.getElementById("1").innerHTML = '<img id="1" alt="Vorschau" src=' + array + '><a href="zaehlersetzen.php?delete=' + url + '"><img src="kreuz.png" width="15" alt="loeschen" /><br></a>';
			}if(i == 2){
			document.getElementById("2").innerHTML = '<img alt="Vorschau" src=' + array + '><a href="zaehlersetzen.php?delete=' + url + '"><img src="kreuz.png" width="15" alt="loeschen" /><br></a>';
			}if(i == 3){
			document.getElementById("3").innerHTML = '<img alt="Vorschau" src=' + array + '><a href="zaehlersetzen.php?delete=' + url + '"><img src="kreuz.png" width="15" alt="loeschen" /><br></a>';
			}if(i == 4){
			document.getElementById("4").innerHTML = '<img alt="Vorschau" src=' + array + '><a href="zaehlersetzen.php?delete=' + url + '"><img src="kreuz.png" width="15" alt="loeschen" /><br></a>';
			}if(i == 5){
			document.getElementById("5").innerHTML = '<img alt="Vorschau" src=' + array + '><a href="zaehlersetzen.php?delete=' + url + '"><img src="kreuz.png" width="15" alt="loeschen" /><br></a>';
			}if(i == 6){
			document.getElementById("6").innerHTML = '<img alt="Vorschau" src=' + array + '><a href="zaehlersetzen.php?delete=' + url + '"><img src="kreuz.png" width="15" alt="loeschen" /><br></a>';
			}if(i == 7){
			document.getElementById("7").innerHTML = '<img alt="Vorschau" src=' + array + '><a href="zaehlersetzen.php?delete=' + url + '"><img src="kreuz.png" width="15" alt="loeschen" /><br></a>';
			}if(i == 8){
			document.getElementById("8").innerHTML = '<img alt="Vorschau" src=' + array + '><a href="zaehlersetzen.php?delete=' + url + '"><img src="kreuz.png" width="15" alt="loeschen" /><br></a>';
			}if(i == 9){
			document.getElementById("9").innerHTML = '<img alt="Vorschau" src=' + array + '><a href="zaehlersetzen.php?delete=' + url + '"><img src="kreuz.png" width="15" alt="loeschen" /><br></a>';
			}if(i == 10){
			document.getElementById("10").innerHTML = '<img alt="Vorschau" src=' + array + '><a href="zaehlersetzen.php?delete=' + url + '"><img src="kreuz.png" width="15" alt="loeschen" /><br></a>';
			}
		}
	}
