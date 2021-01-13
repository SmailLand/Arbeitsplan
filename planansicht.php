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
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMenu">
			<ul class="navbar-nav">
				<li class= "nav-item">
					<a  href="planen.php" class="nav-link"> Stunden planen</a>
				</li>
				
				<li class= "nav-item">
					<a class="nav-link" href="krankschreibung.php"> Krankschreibung</a>
				</li>
				
				<li class= "nav-item">
					<a class="nav-link" href="Urlaub.php"> Urlaub</a>
				</li>
				
				<li class= "nav-item">
					<a class="nav-link" href="Abmelden.php"> Abmelden</a>
				</li>
			</ul>
		</div>
	</nav>
	 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>
<?php
SESSION_START();
include "db_connection.php";

$sql = "SELECT PersNr, Kennwort from logindaten";
	$result = $mysqli->query($sql);
	while($row = $result->fetch_assoc()) {
	$PersNr = $row["PersNr"];
	//echo "Persnrdatenbank: ". $PersNr."<br>";
	$Kennwort = $row["Kennwort"];
	//echo "kennwortdatenbank: ". $Kennwort."<br>";
	}
	
	if(empty($PersNr) Or empty($Kennwort)){
		include "search_for_keywort.php";
			$PersNrfromform = $_SESSION["PersNr"];
			$kennwortfromform = $_SESSION["kennwort"];

			//echo $_SESSION["Vorname"]." ".$_SESSION["Nachname"]."<br>";
			//echo "Personalnummer: ".$PersNrfromform."<br>"."<br>";
			//echo "<h1>Arbeitstage: </h1>"."<br>"."<br>";
			echo "<h1>Herzlich Wilkommen</h1>";
			echo "<h3>Folgende Arbeitszeiten liegen vor: </h3>";
?>
<div id="accordion">

<?php

			while($row = $_SESSION["result"]->fetch_assoc()) {
					$datum = $row["Datum"];
					$stunden = $row["Stunden"];
					$anmerkung = $row["anmerkung"];
					//echo " Datum: " . $datum."<br>"." Stunden: ". $stunden."<br>"." Anmerkung: ".$anmerkung."<br>"."<br>" ;
					echo"<h3>Datum: $datum</h3>";
					echo"<div><p>Stunden: $stunden <br> Anmerkung: $anmerkung</p></div>";
			}
			
?>

</div>

<?php
	}else {
		
		include "search_for_keywort_mit_logindaten.php";		
		//echo $_SESSION["Vorname"]." ".$_SESSION["Nachname"]."<br>";
		//echo "Personalnummer: ".$PersNr."<br>"."<br>";
		//echo "<h1>Arbeitstage: </h1>"."<br>"."<br>";
		echo "<h1>Herzlich Wilkommen</h1>"."<br>";
		echo "<h3>Folgende Arbeitszeiten liegen vor: </h3>";
		$datumsql = "SELECT Datum, Stunden, anmerkung from arbeitsplan Where PersNr LIKE '".$PersNr."'";
		$result = $mysqli->query($datumsql);
			//ausgabe der abfrage
		if ($result->num_rows > 0) {
			  // ausgabe jeder reihe
			  //echo $Vorname." ".$Nachname."<br>";
			  //echo " Personalnummer: "."$_SESSION["PersNrfromform"]"."<br>"."<br>";
		  $_SESSION["result"]= $result;
?>
<div id="accordion">
<?php		 
		 while($row = $_SESSION["result"]->fetch_assoc()) {
					$datum = $row["Datum"];
					$stunden = $row["Stunden"];
					$anmerkung = $row["anmerkung"];
					echo"<h3>Datum: $datum</h3>";
					echo"<div><p>Stunden: $stunden <br> Anmerkung: $anmerkung
					</p></div>";
			}
	?>
</div>
<?php		
			 
		} else {
		  echo "0 results";
		}
	}
			
	?>
<?php
//include "search_for_keywort.php";

$mysqli->close()

?>
	