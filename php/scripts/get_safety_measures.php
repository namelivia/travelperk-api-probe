<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$safetyMeasure = $travelperk->travelSafe()->travelSafe()->airlineSafetyMeasures(
	"LH",
);
write_output("safety_measures", [
	$safetyMeasure->airline->name,
	$safetyMeasure->airline->iataCode,
	count($safetyMeasure->safetyMeasures),
	$safetyMeasure->safetyMeasures[0]->category->id,
	$safetyMeasure->safetyMeasures[0]->category->name,
	$safetyMeasure->safetyMeasures[0]->subCategory->id,
	$safetyMeasure->safetyMeasures[0]->subCategory->name,
	$safetyMeasure->safetyMeasures[0]->details,
	$safetyMeasure->safetyMeasures[0]->summary,
	$safetyMeasure->infoSource->name,
	$safetyMeasure->infoSource->url,
	$safetyMeasure->updatedAt,
]);
