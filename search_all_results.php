<?php

// wenn eine Ergebnis da ist ausgeben
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br>";

$sql = "SELECT PersNr, Datum, Stunden FROM arbeitsplan";
$result = $mysqli->query($sql);//das ist die abrfage in sql

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "PersNr: " . $row["PersNr"]. " - Datum: " . $row["Datum"]. " " . $row["Stunden"]. "<br>";
  }
} else {
  echo "0 results";
}


?>