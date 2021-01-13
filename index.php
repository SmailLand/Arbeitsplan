<html>
<head>

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

<body>
<h1>
Anmeldedaten eingeben 
</h1>

<?php

include"db_connection.php";


?>

<form class="form-horizontal" action="/Vergleich.php">
<fieldset>

<!-- Form Name -->
<legend>Bitte Personalnummer und Kennwort eingeben</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="PersNr">Personalnummer</label>  
  <div class="col-md-5">
  <input name="PersNr" type="text" placeholder="z.B. 25" class="form-control input-md" required="">
  <span class="help-block">geben Sie Ihre Personalnummer ein</span>  
  </div>
</div>

<!-- Text input--> 
<div class="form-group">
  <label class="col-md-4 control-label" for="kennwort">Kennwort</label>  
  <div class="col-md-5">
  <input name="kennwort" type="text" placeholder="" class="form-control input-md" required="">
  <span class="help-block">geben Sie Ihr Kennwort ein</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-info">anmelden</button>
  </div>
</div>

</fieldset>
</form>










<?php
//include "search_for_keywort.php";
/*die beiden daten sind leer wenn wir nach krank zurük auf planansicht kommen werden diese zwei daten nicht übernommen,
 hier mögliche lösungen nachschauen oder vllt fragen.
 
 Daten werden hier unten nicht gespeichert müssen auf planansicht abgerufen werden. 
 Problem hier warscheinlich werden die daten dort dann überschrieben da sie immer leer sind. -> mehr tests sind notwendig hierfür
 
*/
$mysqli->close()

?>
</body>



</html>