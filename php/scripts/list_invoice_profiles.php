<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$profiles = $travelperk->expenses()->invoiceProfiles()->query()->setOffset(1)->setLimit(10)->get();
var_dump($profiles);
die();
write_output("profiles", [
    # TODO: For some reason this is failing
]);
