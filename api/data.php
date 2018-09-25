<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$test = "test";

class dagPlanning
{
	private $xml;
	private $date;
	private $planning = null;

	public function __construct($datum)
	{
		$this->date = $datum;
		$this->xml = simplexml_load_file("data/data.xml");
		foreach($this->xml->dag as $dag) {
			if($dag["datum"] == $datum) {
				$this->planning = $dag;
			}
		}

	}

	public function getPlanning() {
		return $this->planning;
	}

	public function getPlans() {
		if($this->planning == null) {
			return null;
		}else {
			return $this->planning->plan;
		}
	}

	private function getPlanningFromDatum($datum, $xml) {

		foreach($xml->dag as $dag) {
			if($dag["datum"] == $datum) {
				return $dag;
			}
		}

		return "zero";

	}

	public function addPlan($name, $adres, $toplace, $img) {
		if($this->planning == null) {
			$child = $this->xml->addChild("dag");
			$child->addAttribute("datum", $this->date);
			$this->planning = $child;
		}

		$plan = $this->planning->addChild("plan");
		$plan->addChild("naam", $name);
		$plan->addChild("adres", $adres);
		$place = $plan->addChild("te_plaatsen");
		foreach($toplace as $itemNode) {
			$item = $place->addChild("item");
			foreach($itemNode as $key => $value) {
				$item->addChild($key, $value);
			}
		}
		$plan->addChild("img_naam", "images/" . $img["name"]);
		$this->saveFile();
	}

	public function saveFile() {
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["plan"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["plan"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["plan"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["plan"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["plan"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}

	public function save()
	{
		$dom = new DOMDocument("1.0");
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($this->xml->asXML());
		$xml = new SimpleXMLElement($dom->saveXML());
		$xml->saveXML('data/data.xml');
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