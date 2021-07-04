<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$response = $travelperk->costCenters()->costCenters()->bulkUpdate()->setIds(["1", "2"])
	->setArchive(True)->save();
write_output("bulk_update_cost_center", [
	$response->updatedCount,
]);
$response = $travelperk->costCenters()->costCenters()->bulkUpdate()->setIds(["1", "2"])
	->setArchive(False)->save();
