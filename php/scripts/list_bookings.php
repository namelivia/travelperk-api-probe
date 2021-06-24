<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$bookings = $travelperk->trips()->bookings()->query()->setOffset(1)->setLimit(10)->get();
write_output("bookings", [
	$bookings->offset,
	$bookings->limit,
	$bookings->total,
	count($bookings->bookings),
	$bookings->bookings[0]->id,
	$bookings->bookings[0]->start,
	$bookings->bookings[0]->end,
	$bookings->bookings[0]->type,
	$bookings->bookings[0]->status,
	$bookings->bookings[0]->modified,
	$bookings->bookings[0]->tripId,
	count($bookings->bookings[0]->references),
	$bookings->bookings[0]->references[0]->type,
	$bookings->bookings[0]->references[0]->value,
	$bookings->bookings[0]->location->latitude,
	$bookings->bookings[0]->location->longitude,
	$bookings->bookings[0]->location->iataCode,
	$bookings->bookings[0]->legs,
]);
