<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
require_once("test_base.php");
use Namelivia\TravelPerk\ServiceProvider;

class ExpensesTests extends TestBase {

	public function __construct($travelperk) {
		parent::__construct($travelperk);
	}

	public function run() {
		echo ("List invoices\n");
		$this->listInvoices();
		echo ("Get invoice\n");
		$this->getInvoice();
		#TODO: This his crashing
		#echo ("Get invoice PDF\n");
		#$this->getInvoicePDF();
		echo ("List invoice lines\n");
		$this->getInvoiceLines();
		echo ("Get billing periods\n");
		$this->getBillingPeriods();
		echo ("Get statuses\n");
		$this->getStatuses();
		echo ("Get sorting valuese\n");
		$this->getSortingValues();
		echo ("Get invoice profiles\n");
		$this->getInvoiceProfiles();
	}

	private function listInvoices() {
		$invoices = $this->travelperk->expenses()->invoices()->query()->setOffset(1)->setLimit(10)->get();
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
	}

	private function getInvoice() {
		$invoice = $this->travelperk->expenses()->invoices()->get("CR-01-2");
		write_output("invoice", [
			$invoice->serialNumber,
			$invoice->profileId,
			$invoice->profileName,
			$invoice->billingInformation->legalName,
			$invoice->billingInformation->vatNumber,
			$invoice->billingInformation->addressLine1,
			$invoice->billingInformation->addressLine2,
			$invoice->billingInformation->city,
			$invoice->billingInformation->postalCode,
			$invoice->billingInformation->countryName,
			$invoice->mode,
			$invoice->status,
			$invoice->issuingDate,
			$invoice->billingPeriod,
			$invoice->fromDate,
			$invoice->toDate,
			$invoice->dueDate,
			$invoice->currency,
			$invoice->total,
			$invoice->taxesSummary,
			$invoice->reference,
			$invoice->travelperkBankAccount->bankName,
			$invoice->travelperkBankAccount->accountNumber,
			$invoice->travelperkBankAccount->bic,
			$invoice->travelperkBankAccount->reference,
			substr($invoice->pdf, 0, 40), # This link will change every time
			$invoice->lines->total,
			$invoice->lines->data,
			$invoice->lines->data[0]->expenseDate,
			$invoice->lines->data[0]->description,
			$invoice->lines->data[0]->quantity,
			$invoice->lines->data[0]->unitPrice,
			$invoice->lines->data[0]->nonTaxableUnitPrice,
			$invoice->lines->data[0]->taxPercentage,
			$invoice->lines->data[0]->taxAmount,
			$invoice->lines->data[0]->taxRegime,
			$invoice->lines->data[0]->totalAmount,
			$invoice->lines->data[0]->metadata->tripId,
			$invoice->lines->data[0]->metadata->tripName,
			$invoice->lines->data[0]->metadata->service,
			$invoice->lines->data[0]->metadata->travelers,
			$invoice->lines->data[0]->metadata->travelers[0]->name,
			$invoice->lines->data[0]->metadata->travelers[0]->email,
			$invoice->lines->data[0]->metadata->travelers[0]->externalId,
			$invoice->lines->data[0]->metadata->startDate,
			$invoice->lines->data[0]->metadata->endDate,
			$invoice->lines->data[0]->metadata->costCenter,
			$invoice->lines->data[0]->metadata->labels,
			$invoice->lines->data[0]->metadata->labels[0],
			$invoice->lines->data[0]->metadata->vendor->code,
			$invoice->lines->data[0]->metadata->vendor->name,
			$invoice->lines->data[0]->metadata->outOfPolicy,
			$invoice->lines->data[0]->metadata->approvers,
			$invoice->lines->data[0]->metadata->booker->name,
			$invoice->lines->data[0]->metadata->booker->email,
			$invoice->lines->data[0]->metadata->booker->externalId,
		]);
	}

	private function getInvoicePDF() {
		$invoicePDF = $this->travelperk->expenses()->invoices()->pdf("CR-01-2");
		write_output("invoice_pdf", [
			$invoicePDF
		]);
	}

	private function getInvoiceLines() {
		$lines = $this->travelperk->expenses()->invoices()->linesQuery()->setOffset(1)->setLimit(10)->get();
		write_output("invoice_lines", [
			$lines->total,
			$lines->offset,
			$lines->limit,
			$lines->invoiceLines,
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
			$lines->invoiceLines[0]->metadata->travelers,
			$lines->invoiceLines[0]->metadata->travelers[0]->name,
			$lines->invoiceLines[0]->metadata->travelers[0]->email,
			$lines->invoiceLines[0]->metadata->travelers[0]->externalId,
			$lines->invoiceLines[0]->metadata->startDate,
			$lines->invoiceLines[0]->metadata->endDate,
			$lines->invoiceLines[0]->metadata->costCenter,
			$lines->invoiceLines[0]->metadata->labels,
			$lines->invoiceLines[0]->metadata->labels[0],
			$lines->invoiceLines[0]->metadata->vendor->code,
			$lines->invoiceLines[0]->metadata->vendor->name,
			$lines->invoiceLines[0]->metadata->outOfPolicy,
			$lines->invoiceLines[0]->metadata->approvers,
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
	}

	private function getBillingPeriods() {
		$billingPeriods = $this->travelperk->expenses()->invoices()->billingPeriods();
		write_output("billing_periods", [
			$billingPeriods
		]);
	}

	private function getStatuses () {
		$statuses = $this->travelperk->expenses()->invoices()->statuses();
		write_output("statuses", [
			$statuses
		]);
	}

	private function getSortingValues() {
		$sorting = $this->travelperk->expenses()->invoices()->sorting();
		write_output("sorting", [
			$sorting,
		]);
	}

	private function getInvoiceProfiles() {
		$profiles = $this->travelperk->expenses()->invoiceProfiles()->query()->setOffset(1)->setLimit(10)->get();
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
	}
}
