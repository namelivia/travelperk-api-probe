<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$restriction = $travelperk->travelSafe()->travelSafe()->localSummary(
	"ES",
	"country_code",
);
write_output("local_summary", [
	$restriction->summary,
	$restriction->details,
	$restriction->riskLevel->id,
	$restriction->riskLevel->name,
	$restriction->riskLevel->details,
	$restriction->location->name,
	$restriction->location->type,
	$restriction->location->countryCode,
	$restriction->updatedAt,
	$restriction->guidelines,
	$restriction->guidelines[0]->category->id,
	$restriction->guidelines[0]->category->name,
	$restriction->guidelines[0]->subCategory->id,
	$restriction->guidelines[0]->subCategory->name,
	$restriction->guidelines[0]->summary,
	$restriction->guidelines[0]->details,
	$restriction->guidelines[0]->severity,
]);
