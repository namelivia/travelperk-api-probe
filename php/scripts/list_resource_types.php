<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$resourceTypes = $travelperk->scim()->discovery()->resourceTypes();
write_output("list_resource_types", [
	$resourceTypes->totalResults,
	$resourceTypes->itemsPerPage,
	$resourceTypes->startIndex,
	$resourceTypes->schemas[0],
	$resourceTypes->Resources[0]->schemas[0],
	$resourceTypes->Resources[0]->id,
	$resourceTypes->Resources[0]->name,
	$resourceTypes->Resources[0]->endpoint,
	$resourceTypes->Resources[0]->description,
	$resourceTypes->Resources[0]->schema,
	$resourceTypes->Resources[0]->schemaExtensions[0]->schema,
	$resourceTypes->Resources[0]->schemaExtensions[0]->required,
	$resourceTypes->Resources[0]->schemaExtensions[1]->schema,
	$resourceTypes->Resources[0]->schemaExtensions[1]->required,
	$resourceTypes->Resources[0]->meta->resourceType,
	$resourceTypes->Resources[0]->meta->location,
]);
