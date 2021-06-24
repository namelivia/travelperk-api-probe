<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$webhook = $travelperk->webhooks()->webhooks()->get("b4ab65a2-31b6-4cf8-9cfb-f0788c47f7c7");
write_output("webhook", [
	$webhook->id,
	$webhook->enabled,
	$webhook->name,
	$webhook->url,
	$webhook->secret,
	count($webhook->events),
	$webhook->events[0],
	$webhook->successfullySent,
	$webhook->failedSent,
	$webhook->errorRate,
]);
