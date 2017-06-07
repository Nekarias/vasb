<?php
session_start();
?>
<?php
// Variable ID erstllen
$i = $_SESSION['id'];
//Array wird nur erstellt, wenn es noch nicht existiert
while($i<2){
	$array = array('test2'); 
	$_SESSION['array'] = $array;
	++$i;
	$_SESSION['id'] = $i;
}

?>