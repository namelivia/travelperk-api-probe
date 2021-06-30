<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$travelperk = (new ServiceProvider())->build(getenv("SANDBOX_API_KEY"), true);
$users = $travelperk->scim()->users()->query()->setStartIndex(1)->setCount(10)->get();
write_output("scim_users", [
	$users->schemas[0],
	$users->totalResults,
	$users->itemsPerPage,
	$users->startIndex,
	count($users->resources),
	$users->resources[0]->schemas[0],
	$users->resources[0]->schemas[1],
	$users->resources[0]->schemas[2],
	$users->resources[0]->name->givenName,
	$users->resources[0]->name->familyName,
	$users->resources[0]->name->middleName,
	$users->resources[0]->name->honorificPrefix,
	$users->resources[0]->locale,
	$users->resources[0]->preferredLanguage,
	$users->resources[0]->title,
	$users->resources[0]->externalId,
	$users->resources[0]->id,
	$users->resources[0]->groups,
	$users->resources[0]->active,
	$users->resources[0]->userName,
	count($users->resources[0]->phoneNumbers),
	$users->resources[0]->enterpriseExtension->costCenter,
	$users->resources[0]->travelperkExtension->gender,
	$users->resources[0]->travelperkExtension->dateOfBirth,
	$users->resources[0]->travelperkExtension->travelPolicy,
	$users->resources[0]->travelperkExtension->invoiceProfiles[0]->value,
	$users->resources[0]->travelperkExtension->emergencyContact->name,
	$users->resources[0]->travelperkExtension->emergencyContact->phone,
	count($users->resources[0]->travelperkExtension->approvers),
]);
