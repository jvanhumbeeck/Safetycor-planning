<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "api/data.php";

?>

<!DOCTYPE html>
<html>

	<head>
		<title>Edit</title>
	</head>

	<body>

		<h1>Edit planning</h1>

		<p>Datum: <input type="date" name="datum" value="datum" min="2018-01-02"></p>
		<p>Titel: <input type="text" name="titel" value="titel"></p>
		<p>Adres: <input type="text" name="adres" value="adres"></p>
		<p>Te plaatsen:  <input type="text" name="teplaatsen" value="te plaatsen"></p>
		<p>Afbeelding: <input type="file" name="plan" value="file"></p>
		<input type="submit" value="toevoegen aan planning">

	</body>

</html>