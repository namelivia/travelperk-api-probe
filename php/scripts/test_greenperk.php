<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
require_once("test_base.php");
use Namelivia\TravelPerk\ServiceProvider;

class GreenPerkTests extends TestBase {

	public function __construct($travelperk) {
		parent::__construct($travelperk);
	}

	public function run() {
		echo ("Get flight emissions\n");
		$this->getFlightEmissions();
		echo ("Get train emissions\n");
		$this->getTrainEmissions();
		echo ("Get car emissions\n");
		$this->getCarEmissions();
		echo ("Get hotel emissions\n");
		$this->getHotelEmissions();
	}

	private function getFlightEmissions() {
		$emissions = $this->travelperk->greenperk()->greenperk()->flightEmissions(
			"BCN", "LHR", "economy", "BA"
		);
		write_output("flight_emissions", [
			$emissions->emissions->co2eKg,
			$emissions->distanceKm
		]);
	}

	private function getTrainEmissions() {
		$emissions = $this->travelperk->greenperk()->greenperk()->trainEmissions(
            "c44ba069-4109-4b40-815c-bf519c2c2844",
            "637d125e-9d00-478a-822c-e60c6e219227",
            "eurostar"
		);
		write_output("train_emissions", [
			$emissions->emissions->co2eKg,
			$emissions->distanceKm
		]);
	}

	private function getCarEmissions() {
		$emissions = $this->travelperk->greenperk()->greenperk()->carEmissions(
            "MCFD",
            2,
            100
		);
		write_output("car_emissions", [
			$emissions->emissions->co2eKg,
			$emissions->distanceKm
		]);
	}

	private function getHotelEmissions() {
		$emissions = $this->travelperk->greenperk()->greenperk()->hotelEmissions(
            "ES",
            2
		);
		write_output("hotel_emissions", [
			$emissions->emissions->co2eKg
		]);
	}
}
