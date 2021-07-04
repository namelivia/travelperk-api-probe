<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$webhooks = $travelperk->webhooks()->webhooks()->all();
write_output("webhooks", [
	$webhooks->webhooks,
	$webhooks->webhooks[0]->id,
	$webhooks->webhooks[0]->enabled,
	$webhooks->webhooks[0]->name,
	$webhooks->webhooks[0]->url,
	$webhooks->webhooks[0]->secret,
	$webhooks->webhooks[0]->events,
	$webhooks->webhooks[0]->events[0],
	$webhooks->webhooks[0]->successfullySent,
	$webhooks->webhooks[0]->failedSent,
	$webhooks->webhooks[0]->errorRate,
]);
