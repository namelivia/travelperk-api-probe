<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$userSchema = $travelperk->scim()->discovery()->userSchema();
write_output("user_schema", [
	$userSchema->id,
	$userSchema->name,
	$userSchema->description,
	$userSchema->attributes,
	$userSchema->meta->resourceType,
	$userSchema->meta->location,
]);
