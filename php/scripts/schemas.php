<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$schemas = $travelperk->scim()->discovery()->schemas();
write_output("schemas", [
	$schemas->schemas[0],
	$schemas->totalResults,
	$schemas->itemsPerPage,
	$schemas->startIndex,
	count($schemas->Resources),
	$schemas->Resources[0]->id,
	$schemas->Resources[0]->name,
	$schemas->Resources[0]->description,
	count($schemas->Resources[0]->attributes),
]);
