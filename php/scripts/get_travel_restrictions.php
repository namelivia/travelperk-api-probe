<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
use Carbon\Carbon;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$restriction = $travelperk->travelSafe()->travelSafe()->travelRestrictions(
	"ES",
	"FR",
	"country_code",
	"country_code",
	Carbon::today()
);
write_output("travel_restrictions", [
	$restriction->origin->name,
	$restriction->origin->type,
	$restriction->origin->countryCode,
	$restriction->destination->name,
	$restriction->destination->type,
	$restriction->destination->countryCode,
	$restriction->authorizationStatus,
	$restriction->summary,
	$restriction->details,
	$restriction->startDate,
	$restriction->endDate,
	$restriction->updatedAt,
	$restriction->requirements,
	$restriction->requirements[0]->category->id,
	$restriction->requirements[0]->category->name,
	$restriction->requirements[0]->subCategory->id,
	$restriction->requirements[0]->subCategory->name,
	$restriction->requirements[0]->summary,
	$restriction->requirements[0]->details,
	$restriction->requirements[0]->startDate,
	$restriction->requirements[0]->endDate,
	$restriction->requirements[0]->documents,
]);
