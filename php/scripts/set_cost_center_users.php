<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$isSandbox = false;
$travelperk = (new ServiceProvider())->build(getenv("API_KEY"), false);
$costCenter = $travelperk->costCenters()->costCenters()->get("1");
$originalUsers = array_map(function ($user) {
	return $user->id;
}, $costCenter->users);
$costCenter = $travelperk->costCenters()->costCenters()->setUsers("1")->setIds([2])->save();
write_output("set_users_for_cost_center", [
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
$travelperk->costCenters()->costCenters()->setUsers("1")->setIds($originalUsers)->save();
