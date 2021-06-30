<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$locationTypes = $travelperk->travelSafe()->travelSafe()->locationTypes();
write_output("location_types", [
	$locationTypes
]);
