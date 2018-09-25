<!DOCTYPE html>
<html>

	<head>
		<title>Edit</title>
		<link rel="stylesheet" type="text/css" href="css/planning.css"> 
	</head>

	<body>

		<h1>Edit planning</h1>

		<form method="POST" action="addPlan.php" enctype="multipart/form-data">
			<p>Datum: <input type="date" name="datum" value="<?php echo date('Y-m-d'); ?>" min="2018-01-02" required></p>
			<p>Titel: <input type="text" name="titel" autocomplete="off" required></p>
			<p>Adres: <input type="text" name="adres" autocomplete="off" required></p>
			<p>Te plaatsen:  
				<ul id="list">
					<li><input type="number" name="teplaatsen[0][hoeveelheid]" autocomplete="off" min="1" value="0" required> <input type="text" name="teplaatsen[0][naam]" value="example" required>.</li>
					<li><input type="number" name="teplaatsen[1][hoeveelheid]" autocomplete="off" min="1" value="0" required> <input type="text" name="teplaatsen[1][naam]" value="example" required>.</li>
					<li><button id="addLi" type="button">item toevoegen</button></li>
				</ul>
			</p>
			<p>Plan: <input type="file" name="plan" accept="image/*" required></p>
			<p><input type="submit" name="submit" value="toevoegen"></p>
		</form>

		<script src="javascript/edit.js"></script>

	</body>

</html>