<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$travelperk = (new ServiceProvider())->build(getenv("SANDBOX_API_KEY"), True);
$user = $travelperk->scim()->users()->get(2);
write_output("user", [
	$user->schemas[0],
	$user->schemas[1],
	$user->schemas[2],
	$user->name->givenName,
	$user->name->familyName,
	$user->name->middleName,
	$user->name->honorificPrefix,
	$user->locale,
	$user->preferredLanguage,
	$user->title,
	$user->externalId,
	$user->id,
	$user->groups,
	$user->active,
	$user->userName,
	count($user->phoneNumbers),
	$user->enterpriseExtension->costCenter,
	$user->travelperkExtension->gender,
	$user->travelperkExtension->dateOfBirth,
	$user->travelperkExtension->travelPolicy,
	$user->travelperkExtension->invoiceProfiles[0]->value,
	$user->travelperkExtension->emergencyContact->name,
	$user->travelperkExtension->emergencyContact->phone,
	count($user->travelperkExtension->approvers),
]);
