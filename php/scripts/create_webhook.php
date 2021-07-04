<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$webhook = $travelperk->webhooks()->webhooks()->create(
	"test",
	"https://test.namelivia.com",
	"SomeTestingSecret",
	["invoice.issued"],
);
write_output("create_webhook", [
	$webhook->id,
	$webhook->enabled,
	$webhook->name,
	$webhook->url,
	$webhook->secret,
	$webhook->events,
	$webhook->successfullySent,
	$webhook->failedSent,
	$webhook->errorRate,
]);
