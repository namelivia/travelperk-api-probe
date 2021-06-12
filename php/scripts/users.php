<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$users = $travelperk->users()->users()->query()->setOffset(1)->setLimit(10)->get();
write_output("users", [
	$users->offset,
	$users->limit,
	$users->total,
	count($users->users),
	$users->users[0]->id,
	$users->users[0]->userName,
	$users->users[0]->name->firstName,
	$users->users[0]->name->lastName,
	$users->users[0]->name->middleName,
	$users->users[0]->name->title,
	$users->users[0]->preferredLanguage,
	$users->users[0]->locale,
	$users->users[0]->active,
	$users->users[0]->jobTitle,
	count($users->users[0]->phoneNumbers),
	$users->users[0]->emergencyContact,
]);
