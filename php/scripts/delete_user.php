<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$travelperk = (new ServiceProvider())->build(getenv("SANDBOX_API_KEY"), true);
#TODO: It would be convenient to be able to get the id from the create script
#This operation returns nothing
$travelperk->scim()->users()->delete(5745);
