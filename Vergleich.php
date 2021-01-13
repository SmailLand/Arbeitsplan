<head>
  <title>Ausgabe der ergebnisse</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	 
	 <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	$(function() {
		$( "#accordion" ).accordion();
	});
	</script>
</head>


<?php

SESSION_START();
include "db_connection.php";
$_SESSION["PersNr"] = $_GET["PersNr"];
//echo "Personalnummer index: ".$_SESSION["PersNr"]."<br>";
$_SESSION["kennwort"] = $_GET["kennwort"];
//echo "Kennwort index: ".$_SESSION["kennwort"]."<br>";

	
	$einPersNr = "SELECT PersNr FROM anmelddaten WHERE kennwort LIKE '".$_SESSION["kennwort"]."' AND PersNr LIKE '".$_SESSION["PersNr"]."'";
	$ergebnisPersNr = $mysqli->query($einPersNr);
	
	
	if(empty($ergebnisPersNr)){

	exit("kein Ergebnis zur Personalnummer");
}else{
	while($reihePersNr = $ergebnisPersNr->fetch_assoc()){
	$vergleichPersNr = $reihePersNr["PersNr"];
	//echo "vergleichPersNr: ".$vergleichPersNr."<br>";
	}
}
//die datenbank abfrage kennwort
$einkennwort = "SELECT kennwort FROM anmelddaten WHERE kennwort LIKE '".$_SESSION["kennwort"]."' AND PersNr LIKE '".$_SESSION["PersNr"]."'";
$ergebniskennwort = $mysqli->query($einkennwort);

//erneute wiedergabe der Abfrage
if(empty($ergebniskennwort)){
?>
<a href = "index.php"> Zurück zur Anmeldung</a>
<?php	
	exit("kein Ergebnis zur kennwort");

}else{
while($reihekennwort = $ergebniskennwort->fetch_assoc()){
	$vergleichkennwort = $reihekennwort["kennwort"];
	//echo "vergleichkennwort: ".$vergleichkennwort."<br>";
}
}

//check ob die Daten Übereinstimmen
//hier wird geschaut ob einer dieser werte null ist 
 if (empty($vergleichPersNr)OR empty($_SESSION["PersNr"]) OR empty($vergleichkennwort) OR empty($_SESSION["kennwort"]))
	 
 { 
//echo "Personalnummer: ".$vergleichPersNr."<br>"."Kennwort: ".$vergleichPersNr."<br>";
//echo "PersNrfromform: ".$_SESSION["PersNr"]."<br>"."kennwortfromform: ".$_SESSION["kennwort"]."<br>";
?>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="collapse navbar-collapse" id="navbarMenu">
			<ul class="navbar-nav">
				<li class= "nav-item">
					<a  href="index.php" class="nav-link"> zur Anmeldung</a>
				</li>
			</ul>
		</div>
	</nav>
</body>
<?php
exit("<h1>Personalnummer oder Kennwort falsch</h1>");

}
else {if ($vergleichPersNr == $_SESSION["PersNr"] && $vergleichkennwort == $_SESSION["kennwort"])
{ 
$PersNrfromform = $_SESSION["PersNr"];
$kennwortfromform = $_SESSION["kennwort"];
//echo "Personalnummer: ".$PersNrfromform."<br>"."Kennwort: ".$kennwortfromform."<br>";
	$logindatensql = "INSERT INTO logindaten (PersNr, Kennwort)
	VALUES('$PersNrfromform', '$kennwortfromform')";
	$login = $mysqli->query($logindatensql);
	header("Location: planansicht.php");
}}
?>