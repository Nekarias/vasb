<?php
//@Quelle: http://sevenx.de/blog/tutorial-einfach-mit-php-ordner-auslesen-und-dateien-und-bilder-anzeigen/
// Ordnername 
$ordner = "dateien"; //auch komplette Pfade möglich ($ordner = "download/files";)


// Ordner auslesen und Array in Variable speichern
//$allebilder = scandir($ordner); // Sortierung A-Z
// Sortierung Z-A mit scandir($ordner, 1)       
//chdir($ordner);
array_multisort(array_map('filemtime', ($allebilder = glob("dateien/*.jpg"))), SORT_DESC, $allebilder);

echo json_encode($allebilder);

?>