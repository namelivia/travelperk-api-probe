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
use kamermans\OAuth2\Persistence\FileTokenPersistence;

# Test the sandbox environment
$sandboxTravelperkApiKey = (new ServiceProvider())->build(getenv("SANDBOX_API_KEY"), true);
$sandboxTests = [
	new ExpensesTests($sandboxTravelperkApiKey),
	new SCIMTests($sandboxTravelperkApiKey),
	new CostCentersTests($sandboxTravelperkApiKey)
];
foreach ($sandboxTests as $test) {
	$test->run();
}

# Test the regular environment
$tests = [
	new WebhooksTests(),
	new TripsTests(),
	new TravelsafeTests(),
	new UsersTests()
];
$travelperkApiKey = (new ServiceProvider())->build(getenv("API_KEY"), false);
$travelperkOAuth = (new ServiceProvider())->buildOAuth2(
    new FileTokenPersistence(getenv("ACCESS_TOKEN_PATH")),
	getenv("CLIENT_ID"),
	getenv("CLIENT_SECRET"),
	getenv("REDIRECT_URL"),
	[], # scopes
	false
);
foreach ($tests as $test) {
	try {
		$test->run($travelperkApiKey);
	} catch (Exception $e) {
		echo($e->getMessage() . "\n");
	}
	try {
		$test->run($travelperkOAuth);
	} catch (Exception $e) {
		echo($e->getMessage() . "\n");
	}
	
}
