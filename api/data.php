<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$test = "test";

class dagPlanning
{
	private $planning;

	public function __construct($datum)
	{
		$xml = simplexml_load_file("data/data.xml");
		foreach($xml->dag as $dag) {
			if($dag["datum"] == $datum) {
				$this->planning = $dag;
			}
		}

	}

	public function getPlanning() {
		return $this->planning;
	}

	public function getPlans() {
		return $this->planning->plan;
	}

	private function getPlanningFromDatum($datum, $xml) {

		foreach($xml->dag as $dag) {
			if($dag["datum"] == $datum) {
				return $dag;
			}
		}

		return "zero";

	}
}

function println($text) {
	echo $text . "<br>";
}

function printPlan($plan) {

	println("Naam: " . getName($plan));
	println("Adres: " . getAdress($plan));

	foreach(getItemsToPlace($plan) as $item) {
		println("	- " . getItemAmount($item) . " " . getItemSuffix($item));
	}

	println("Img name: " . getImageLoc($plan));

}

function getName($plan) {
		return $plan->naam;
}

function getAdress($plan) {
	return $plan->adres;
}

function getItemsToPlace($plan) {
	return $plan->te_plaatsen->item;
}

function getItemAmount($item) {
	return $item->hoeveelheid;
}

function getItemSuffix($item) {
	return $item->naam;
}

function getImageLoc($plan) {
	return $plan->img_naam;
}

?>