<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$enterpriseSchema = $travelperk->scim()->discovery()->enterpriseUserSchema();
write_output("enterprise_schema", [
	$enterpriseSchema->id,
	$enterpriseSchema->name,
	$enterpriseSchema->description,
	count($enterpriseSchema->attributes),
	$enterpriseSchema->meta->resourceType,
	$enterpriseSchema->meta->location,
]);
