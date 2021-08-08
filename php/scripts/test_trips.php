<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;

class TripsTests {

	public function run($travelperk) {
		echo ("List trips\n");
		$this->listTrips($travelperk);
		echo ("List bookings\n");
		$this->listBookings($travelperk);
	}

	private function listTrips($travelperk) {
		$trips = $travelperk->trips()->trips()->query()->setOffset(1)->setLimit(10)->get();
		write_output("trips", [
			$trips->offset,
			$trips->limit,
			$trips->total,
			$trips->trips,
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
	}

	private function listBookings($travelperk) {
		$bookings = $travelperk->trips()->bookings()->query()->setOffset(1)->setLimit(10)->get();
		write_output("bookings", [
			$bookings->offset,
			$bookings->limit,
			$bookings->total,
			$bookings->bookings,
			$bookings->bookings[0]->id,
			$bookings->bookings[0]->start,
			$bookings->bookings[0]->end,
			$bookings->bookings[0]->type,
			$bookings->bookings[0]->status,
			$bookings->bookings[0]->modified,
			$bookings->bookings[0]->tripId,
			$bookings->bookings[0]->references,
			$bookings->bookings[0]->references[0]->type,
			$bookings->bookings[0]->references[0]->value,
			# This fails sometimes if location is null
			# $bookings->bookings[0]->location->latitude,
			# $bookings->bookings[0]->location->longitude,
			# $bookings->bookings[0]->location->iataCode,
			$bookings->bookings[0]->legs,
		]);
	}
}
