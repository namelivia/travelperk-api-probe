<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$trips = $travelperk->trips()->trips()->query()->setOffset(1)->setLimit(10)->get();
write_output("trips", [
	$trips->offset,
	$trips->limit,
	$trips->total,
	count($trips->trips),
	$trips->trips[0]->id,
	$trips->trips[0]->tripName,
	$trips->trips[0]->start,
	$trips->trips[0]->end,
	$trips->trips[0]->status,
	$trips->trips[0]->modified,
	$trips->trips[9]->id,
	$trips->trips[9]->tripName,
	$trips->trips[9]->start,
	$trips->trips[9]->end,
	$trips->trips[9]->status,
	$trips->trips[9]->modified,
]);
