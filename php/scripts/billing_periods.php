<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$billingPeriods = $travelperk->expenses()->invoices()->billingPeriods();
write_output("billing_periods", [
	$billingPeriods
]);
