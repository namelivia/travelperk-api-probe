<?php
require_once(__DIR__."/../vendor/autoload.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$costCenters = $travelperk->costCenters()->costCenters()->all();
file_put_contents("/usr/src/app/output/cost_centers", $costCenters->offset, FILE_APPEND);
file_put_contents("/usr/src/app/output/cost_centers", $costCenters->limit, FILE_APPEND);
file_put_contents("/usr/src/app/output/cost_centers", count($costCenters->costCenters), FILE_APPEND);
file_put_contents("/usr/src/app/output/cost_centers", $costCenters->costCenters[0]->id, FILE_APPEND);
file_put_contents("/usr/src/app/output/cost_centers", $costCenters->costCenters[0]->name, FILE_APPEND);
file_put_contents("/usr/src/app/output/cost_centers", $costCenters->costCenters[0]->countUsers, FILE_APPEND);
