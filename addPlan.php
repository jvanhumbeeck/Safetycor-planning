<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "api/data.php";

$planning = new dagPlanning(date("d/m/Y", strtotime($_POST["datum"])));

$planning->addPlan($_POST["titel"], $_POST["adres"], $_POST["teplaatsen"], $_FILES['plan']);

$planning->save();

?>