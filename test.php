<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "api/data.php";

$planning = new dagPlanning("05/09/2018");

foreach($planning->getPlans() as $plan) {

	printPlan($plan);

}

?>