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

$kranksql = "INSERT INTO arbeitsplan (PersNr, Datum, Stunden, anmerkung)
VALUES('$Personalnummer', '$datumfromform', '8', 'K')";
$result = $mysqli->query($kranksql);

header("Location: planansicht.php");
}
else {
	
	If(empty($anmerkung)){
		$sql = "Update arbeitsplan Set anmerkung = 'K' Where PersNr Like '".$Personalnummer."' AND Datum LIKE '".$datumfromform."' ";
		$result = $mysqli->query($sql);
		header("Location: planansicht.php");
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
