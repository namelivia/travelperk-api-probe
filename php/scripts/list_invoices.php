<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$travelperk = (new ServiceProvider())->build(getenv("SANDBOX_API_KEY"), true);
$invoices = $travelperk->expenses()->invoices()->query()->setOffset(1)->setLimit(10)->get();
write_output("invoices", [
	$invoices->offset,
	$invoices->limit,
	$invoices->total,
	$invoices->invoices,
	$invoices->invoices[0]->serialNumber,
	$invoices->invoices[0]->profileId,
	$invoices->invoices[0]->profileName,
	$invoices->invoices[0]->billingInformation->legalName,
	$invoices->invoices[0]->billingInformation->vatNumber,
	$invoices->invoices[0]->billingInformation->addressLine1,
	$invoices->invoices[0]->billingInformation->addressLine2,
	$invoices->invoices[0]->billingInformation->city,
	$invoices->invoices[0]->billingInformation->postalCode,
	$invoices->invoices[0]->billingInformation->countryName,
	$invoices->invoices[0]->mode,
	$invoices->invoices[0]->status,
	$invoices->invoices[0]->issuingDate,
	$invoices->invoices[0]->billingPeriod,
	$invoices->invoices[0]->fromDate,
	$invoices->invoices[0]->toDate,
	$invoices->invoices[0]->dueDate,
	$invoices->invoices[0]->currency,
	$invoices->invoices[0]->total,
	$invoices->invoices[0]->lines,
	$invoices->invoices[0]->taxesSummary,
	$invoices->invoices[0]->reference,
	$invoices->invoices[0]->travelperkBankAccount->bankName,
	$invoices->invoices[0]->travelperkBankAccount->accountNumber,
	$invoices->invoices[0]->travelperkBankAccount->bic,
	$invoices->invoices[0]->travelperkBankAccount->reference,
	substr($invoices->invoices[0]->pdf, 0, 40) # This link will change every time
]);
