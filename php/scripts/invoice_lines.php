<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$travelperk = (new ServiceProvider())->build(getenv("SANDBOX_API_KEY"), true);
$lines = $travelperk->expenses()->invoices()->linesQuery()->setOffset(1)->setLimit(10)->get();
write_output("invoice_lines", [
	$lines->total,
	$lines->offset,
	$lines->limit,
	count($lines->invoiceLines),
	$lines->invoiceLines[0]->expenseDate,
	$lines->invoiceLines[0]->description,
	$lines->invoiceLines[0]->quantity,
	$lines->invoiceLines[0]->unitPrice,
	$lines->invoiceLines[0]->nonTaxableUnitPrice,
	$lines->invoiceLines[0]->taxPercentage,
	$lines->invoiceLines[0]->taxAmount,
	$lines->invoiceLines[0]->taxRegime,
	$lines->invoiceLines[0]->totalAmount,
	$lines->invoiceLines[0]->metadata->tripId,
	$lines->invoiceLines[0]->metadata->tripName,
	$lines->invoiceLines[0]->metadata->service,
	count($lines->invoiceLines[0]->metadata->travelers),
	$lines->invoiceLines[0]->metadata->travelers[0]->name,
	$lines->invoiceLines[0]->metadata->travelers[0]->email,
	$lines->invoiceLines[0]->metadata->travelers[0]->externalId,
	$lines->invoiceLines[0]->metadata->startDate,
	$lines->invoiceLines[0]->metadata->endDate,
	$lines->invoiceLines[0]->metadata->costCenter,
	count($lines->invoiceLines[0]->metadata->labels),
	$lines->invoiceLines[0]->metadata->labels[0],
	$lines->invoiceLines[0]->metadata->vendor->code,
	$lines->invoiceLines[0]->metadata->vendor->name,
	$lines->invoiceLines[0]->metadata->outOfPolicy,
	count($lines->invoiceLines[0]->metadata->approvers),
	$lines->invoiceLines[0]->metadata->booker->name,
	$lines->invoiceLines[0]->metadata->booker->email,
	$lines->invoiceLines[0]->metadata->booker->externalId,
	$lines->invoiceLines[0]->invoiceSerialNumber,
	$lines->invoiceLines[0]->profileId,
	$lines->invoiceLines[0]->profileName,
	$lines->invoiceLines[0]->invoiceMode,
	$lines->invoiceLines[0]->invoiceStatus,
	$lines->invoiceLines[0]->issuingDate,
	$lines->invoiceLines[0]->dueDate,
	$lines->invoiceLines[0]->currency,
]);