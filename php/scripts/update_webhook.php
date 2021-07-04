<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$webhook = $travelperk->webhooks()->webhooks()->modify(
    "1b92ce9c-2d80-45a1-bf8e-bbae60892ae7"
)->setEnabled(false)->save();
# TODO: It would be convenient to be able to get the id from the create script
write_output("update_webhook", [
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
