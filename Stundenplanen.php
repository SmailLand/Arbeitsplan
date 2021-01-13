<?php
SESSION_START();
include "db_connection.php";
$datumfromform = $_GET["Datum"];
$Personalnummer = $_SESSION["PersNr"]; 

$datumsql = "SELECT Datum, anmerkung from arbeitsplan Where PersNr LIKE '".$Personalnummer."' AND Datum LIKE '".$datumfromform."' ";
		$result = $mysqli->query($datumsql);
		while($row = $result->fetch_assoc()) {
		$datum = $row["Datum"];
		$anmerkung = $row["anmerkung"];
		}
		
If (empty($datum)){

$planensql = "INSERT INTO arbeitsplan (PersNr, Datum, Stunden, anmerkung)
VALUES('$Personalnummer', '$datumfromform', '8', NULL)";
$result = $mysqli->query($planensql);

header("Location: planansicht.php");
}
else {
	
	If(empty($anmerkung)){
	echo "bereits Arbeitstag eingetragen";
	}
	If($anmerkung=='U'){
		echo "bereits Urlaub eingetragen";
	}
	If($anmerkung=='K'){
		echo "bereits Krankheitstag eingetragen"."<br>"."<br>";
		
		
	}

}
?>
<a href = "planansicht.php"> Zurück zum Plan</a>
