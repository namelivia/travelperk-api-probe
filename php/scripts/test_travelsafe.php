<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
use Carbon\Carbon;

class TravelsafeTests {

	public function run($travelperk) {
		echo ("Get travel restrictions\n");
		$this->getTravelRestrictions($travelperk);
		echo ("Get local summary\n");
		$this->getLocalSummary($travelperk);
		echo ("Get airline safety measures\n");
		$this->getAirlineSafetyMeasures($travelperk);
		echo ("Get location types\n");
		$this->getLocationTypes($travelperk);
	}

	private function getTravelRestrictions($travelperk) {
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
	}

	private function getLocalSummary($travelperk) {
		xdebug_break();
		$summary = $travelperk->travelSafe()->travelSafe()->localSummary(
			"ES",
			"country_code",
		);
		write_output("local_summary", [
			$summary->summary,
			$summary->details,
			$summary->riskLevel->id,
			$summary->riskLevel->name,
			$summary->riskLevel->details,
			$summary->location->name,
			$summary->location->type,
			$summary->location->countryCode,
			$summary->updatedAt,
			$summary->guidelines,
			$summary->guidelines[0]->category->id,
			$summary->guidelines[0]->category->name,
			$summary->guidelines[0]->subCategory->id,
			$summary->guidelines[0]->subCategory->name,
			$summary->guidelines[0]->summary,
			$summary->guidelines[0]->details,
			$summary->guidelines[0]->severity,
		]);
	}

	private function getAirlineSafetyMeasures($travelperk) {
		$safetyMeasure = $travelperk->travelSafe()->travelSafe()->airlineSafetyMeasures(
			"LH",
		);
		write_output("safety_measures", [
			$safetyMeasure->airline->name,
			$safetyMeasure->airline->iataCode,
			$safetyMeasure->safetyMeasures,
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
	}

	private function getLocationTypes($travelperk) {
		$locationTypes = $travelperk->travelSafe()->travelSafe()->locationTypes();
		write_output("location_types", [
			$locationTypes
		]);
	}
}
