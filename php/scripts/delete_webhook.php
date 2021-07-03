<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
# TODO: It would be convenient to be able to get the id from the create script
$travelperk->webhooks()->webhooks()->delete(
    "1b92ce9c-2d80-45a1-bf8e-bbae60892ae7"
);
