<?php
include "db_connection.php";
// wenn eine Ergebnis da ist ausgeben
//holt sich die eigegebenen werte
//settype($_SESSION["kennwortfromform"], "Integer");

$loginsql = "SELECT PersNr, Kennwort from logindaten";
	$loginresult = $mysqli->query($loginsql);
	while($row = $loginresult->fetch_assoc()) {
	$_SESSION["PersNr"] = $row["PersNr"];
	$_SESSION["kennwort"] = $row["Kennwort"];
	}
	

$namenabfrage = "SELECT Vorname, Nachname from personal Where PersNr LIKE '".$_SESSION["PersNr"]."'";
	$namenausgabe = $mysqli->query($namenabfrage);
	  while($row = $namenausgabe->fetch_assoc()) {
		  $_SESSION["Vorname"] = $row["Vorname"];
		  $_SESSION["Nachname"]= $row["Nachname"];
	  }

	//abfrage auf der Tabele arbeitsplan nach den Personalnummer, Datum und Stunden
	$sql = "SELECT Datum, Stunden, anmerkung from arbeitsplan Where PersNr LIKE '".$_SESSION["PersNr"]."'";
	$result = $mysqli->query($sql);
//ausgabe der abfrage
	if ($result->num_rows > 0) {
	  // ausgabe jeder reihe
	  //echo $Vorname." ".$Nachname."<br>";
	  //echo " Personalnummer: "."$_SESSION["PersNrfromform"]"."<br>"."<br>";
	  $_SESSION["result"]= $result;
		
		 
	} else {
	  echo "0 results";
	
}
 

?>
