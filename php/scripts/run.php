<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("test_webhooks.php");
require_once("test_expenses.php");
require_once("test_trips.php");
require_once("test_travelsafe.php");
require_once("test_cost_centers.php");
require_once("test_scim.php");
require_once("test_users.php");
use Namelivia\TravelPerk\ServiceProvider;

$sandboxTravelperkApiKey = (new ServiceProvider())->build(getenv("SANDBOX_API_KEY"), true);
$travelperkApiKey = (new ServiceProvider())->build(getenv("API_KEY"), false);

$tests = [
	# Sandbox - Api key
	new ExpensesTests($sandboxTravelperkApiKey),
	new SCIMTests($sandboxTravelperkApiKey),
	new CostCentersTests($sandboxTravelperkApiKey),
	# Api key
	new WebhooksTests($travelperkApiKey),
	new TripsTests($travelperkApiKey),
	new TravelsafeTests($travelperkApiKey),
	new UsersTests($travelperkApiKey),
];

foreach ($tests as $test) {
	try {
		$test->run();
	} catch (Throwable $e) {
		echo($e->getMessage() . "\n");
	}
}
