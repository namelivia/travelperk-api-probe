<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$costCenters = $travelperk->costCenters()->costCenters()->all();
write_output("cost_centers", [
	$costCenters->offset,
	$costCenters->limit,
	count($costCenters->costCenters),
	$costCenters->costCenters[0]->id,
	$costCenters->costCenters[0]->name,
	$costCenters->costCenters[0]->countUsers,
]);
