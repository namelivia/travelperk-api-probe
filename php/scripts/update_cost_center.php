<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$originalCostCenter = $travelperk->costCenters()->costCenters()->get("1");
$costCenter = $travelperk->costCenters()->costCenters()->modify("1")->setName("Updated name by api probe")->save();
write_output("updated_cost_center", [
	$costCenter->id,
	$costCenter->name,
	$costCenter->archived,
	$costCenter->countUsers,
	$costCenter->users,
    $costCenter->users[0]->firstName,
    $costCenter->users[0]->lastName,
    $costCenter->users[0]->email,
    $costCenter->users[0]->id,
    $costCenter->users[0]->phone,
    $costCenter->users[0]->profilePicture,
]);
$travelperk->costCenters()->costCenters()->modify("1")->setName($originalCostCenter->name)->save();
