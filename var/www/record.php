<!DOCTYPE html>
<html>
<head>
        <title>RadioBeere - Aufnahmen planen</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">

        <link rel="stylesheet" href="/css/radiobeere.css" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
</head>

<body>

<!--- Verbindung zur Datenbank aufbauen --->

	<?php
	include("include/db-connect.php");
	?>

<!--- Variablen abrufen --->

        <?php
        $reset = $_POST["reset"];
	?>

<!--- Letzten Timer löschen --->

	<?php
        if ($reset == "1")
        {
	$abfrage = "SELECT id FROM timer ORDER BY id DESC LIMIT 1";
	$ergebnis = mysql_query($abfrage);
	while($row = mysql_fetch_object($ergebnis))
   	{
	$id =("$row->id");
   	}
	$loeschen = "DELETE FROM timer WHERE id = '$id'";
	$loesch = mysql_query($loeschen);
	$reset = "0";
	}
	?>

<div data-role="page" class="ui-responsive-panel" id="panel" data-title="RadioBeere">

        <div data-role="header">
                <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Men&uuml;</a>
                <h1>RadioBeere</h1>
                <a href="/" data-icon="home" data-iconpos="notext">Startseite</a>
        </div>

<!--- Seiteninhalt --->

        <div role="main" class="ui-content">
	<h2>Aufnahme planen</h2>

	<p>Was m&ouml;chtest du aufnehmen?</p>

<!--- Formular --->

	<div class="ui-field-contain">
	<form action="record2.php" method="post">
        <select name="alias" onchange="if(this.value != 0) { this.form.submit(); }">
	<option value="">Sender ausw&auml;hlen</option>

	<?php
	$abfrage = "SELECT name,alias FROM sender";
	$ergebnis = mysql_query($abfrage);

	while($row = mysql_fetch_object($ergebnis))
   	{
	echo "<option value=\"$row->alias\">$row->name</option><br>";
   	}
	?>

	</select>
	</form>
        </div>


        <div class="illu-contentbereich">
        <center><img src="/img/timer_256.png" alt="Aufnahme planen"></center>
        </div>

</div>

<!--- Navigation --->

        <?php
        include("include/navigation.php");
        ?>

</div>

        <?php
        include("include/jquery.php");
        ?>

</body>

</html>
