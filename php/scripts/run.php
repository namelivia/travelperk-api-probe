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

$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$sandboxTravelperk = (new ServiceProvider())->build(getenv("SANDBOX_API_KEY"), true);

$sandboxTests = [new ExpensesTests(), new SCIMTests(), new CostCentersTests()];
foreach ($sandboxTests as $test) {
	$test->run($sandboxTravelperk);
}


$tests = [new WebhooksTests(), new TripsTests(), new TravelsafeTests(), new UsersTests()];
foreach ($tests as $test) {
	$test->run($travelperk);
}
