<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$travelperk = (new ServiceProvider())->build(getenv("SANDBOX_API_KEY"), true);
$profiles = $travelperk->expenses()->invoiceProfiles()->query()->setOffset(1)->setLimit(10)->get();
write_output("profiles", [
    $profiles->offset,
    $profiles->limit,
    $profiles->total,
    $profiles->profiles,
    $profiles->profiles[0]->id,
    $profiles->profiles[0]->name,
    $profiles->profiles[0]->paymentMethodType,
    $profiles->profiles[0]->billingPeriod,
    $profiles->profiles[0]->currency,
    $profiles->profiles[0]->billingInformation->legalName,
    $profiles->profiles[0]->billingInformation->vatNumber,
    $profiles->profiles[0]->billingInformation->addressLine1,
    $profiles->profiles[0]->billingInformation->addressLine2,
    $profiles->profiles[0]->billingInformation->city,
    $profiles->profiles[0]->billingInformation->postalCode,
    $profiles->profiles[0]->billingInformation->countryName,
]);
