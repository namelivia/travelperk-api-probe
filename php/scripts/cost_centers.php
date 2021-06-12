<?php
require_once(__DIR__."/../vendor/autoload.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$costCenters = $travelperk->costCenters()->costCenters()->all();
var_dump($costCenters);
var_dump($costCenters->costCenters[0]);
