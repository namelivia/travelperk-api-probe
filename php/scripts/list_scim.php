<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$travelperk = (new ServiceProvider())->build(getenv("SANDBOX_API_KEY"), true);
$users = $travelperk->scim()->users()->query()->setStartIndex(1)->setCount(10)->get();
write_output("scim_users", [
]);
