<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
$travelperk = (new ServiceProvider())->build(getenv("SANDBOX_API_KEY"), True);
$invoicePDF = $travelperk->expenses()->invoices()->pdf("CR-01-2");
write_output("invoice_pdf", [
	$invoicePDF
]);
