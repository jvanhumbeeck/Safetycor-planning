<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "api/data.php";

?>

<!DOCTYPE html>
<html>

	<head>
		<title>Planning</title>
		<link rel="stylesheet" type="text/css" href="css/planning.css">
		<link rel="stylesheet" href="css/glyphicons.css">
	</head>

	<body>
		
		<h1 class="title">Planning van <?php echo date("d/m/Y"); ?></h1>

		<br>

		<?php

			$planning = new dagPlanning(date("d/m/Y"));

<<<<<<< HEAD
			if($planning->getPlans() == null) {
				echo "<h3 class='title'>Er staat niks op de planning.</h3>";
=======
			if(isset($planning->plan)) {
				echo "<h2 class='title'>Niks op de agenda.</h2>";
>>>>>>> c040c76335065440fca3f2d1cc81279b7435af90
				exit();
			}

			foreach($planning->getPlans() as $plan) {
			?>
				
				<!-- plan -->
				<div class="plan">
					<div class="plan-menu">
						<div class="locatie">
							<h3>Locatie: </h3>
							<h4><?php echo getName($plan); ?></h4>
						</div>

						<div class="adres">
							<h4>Adress: </h4>
							<h4><?php echo getAdress($plan); ?></h4>
						</div>

						<i class="glyphicon glyphicon-backward"></i>

					</div>

					<div class="plan-panel hidden">
						<div class="plan-panel-left">
							<img src="<?php echo getImageLoc($plan); ?>" alt="Afbeelding van plan">
						</div>

						<div class="plan-panel-right">
							<div class="plan-panel-right-top">
								<h4>Te plaatsen: </h4>
								<ul>
									<?php

									foreach(getItemsToPlace($plan) as $item) {
										echo "<li>" . getItemAmount($item) . " " . getItemSuffix($item) . "</li>";
									}

									?>
								</ul>
							</div>

							<div class="plan-panel-right-bottom">
								<h4>Geplaatst: </h4>
								<ul class="special-list">
									<?php

									foreach(getItemsToPlace($plan) as $item) {

										echo '<li><input type="number" value="' . getItemAmount($item) . '" min="0" max="' . getItemAmount($item) . '"> ' . getItemSuffix($item) . '</li>';

									}

									?>
									<li>Reden: <input type="text" name="reason" value=""></li>
								</ul>
								<span class="btn-holder"><input type="file" name="image"multiple></span>
								<span class="btn-holder"><input type="submit" value="Verzenden"></span>
							</div>
						</div>
					</div>
				</div>

			<?php
			}

		?>

		<!-- image holder -->
		<div id="img-holder">
			<img id="img" href="">
			<button id="close"><i class="glyphicon glyphicon-remove"></i></button>
		</div>

		<script src="javascript/planning.js"></script>

	</body>

</html>