<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$costCenter = $travelperk->costCenters()->costCenters()->get("1");
write_output("cost_center", [
	$costCenter->id,
	$costCenter->name,
	$costCenter->archived,
	$costCenter->countUsers,
	count($costCenter->users),
    $costCenter->users[0]->firstName,
    $costCenter->users[0]->lastName,
    $costCenter->users[0]->email,
    $costCenter->users[0]->id,
    $costCenter->users[0]->phone,
    $costCenter->users[0]->profilePicture,
]);
