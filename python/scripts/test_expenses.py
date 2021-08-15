from utils import write_output
from test_base import TestBase


class ExpensesTests(TestBase):
    def run(self):
        print("List invoices")
        self.list_invoices()
        print("Get invoice")
        self.get_invoice()
        # TODO: This is crashing
        # print("Get invoice PDF")
        # self.get_invoice_pdf(travelperk)
        print("List invoice lines")
        self.list_invoice_lines()
        print("Get billing periods")
        self.get_billing_periods()
        print("Get statuses")
        self.get_statuses()
        print("Get sorting values")
        self.get_sorting_values()
        print("Get invoice profiles")
        self.get_invoice_profiles()

    def list_invoices(self):
        invoices = self.travelperk.expenses().invoices().query().set_offset(1).set_limit(10).get()
        write_output("invoices", [
            invoices.offset,
            invoices.limit,
            invoices.total,
            invoices.invoices,
            invoices.invoices[0].serial_number,
            invoices.invoices[0].profile_id,
            invoices.invoices[0].profile_name,
            invoices.invoices[0].billing_information.legal_name,
            invoices.invoices[0].billing_information.vat_number,
            invoices.invoices[0].billing_information.address_line_1,
            invoices.invoices[0].billing_information.address_line_2,
            invoices.invoices[0].billing_information.city,
            invoices.invoices[0].billing_information.postal_code,
            invoices.invoices[0].billing_information.country_name,
            invoices.invoices[0].mode,
            invoices.invoices[0].status,
            invoices.invoices[0].issuing_date,
            invoices.invoices[0].billing_period,
            invoices.invoices[0].from_date,
            invoices.invoices[0].to_date,
            invoices.invoices[0].due_date,
            invoices.invoices[0].currency,
            invoices.invoices[0].total,
            invoices.invoices[0].lines,
            invoices.invoices[0].taxes_summary,
            invoices.invoices[0].reference,
            invoices.invoices[0].travelperk_bank_account.bank_name,
            invoices.invoices[0].travelperk_bank_account.account_number,
            invoices.invoices[0].travelperk_bank_account.bic,
            invoices.invoices[0].travelperk_bank_account.reference,
            invoices.invoices[0].pdf[0:40]  # This link will change every time
        ])

    def get_invoice(self):
        invoice = self.travelperk.expenses().invoices().get("CR-01-2")
        write_output("invoice", [
            invoice.serial_number,
            invoice.profile_id,
            invoice.profile_name,
            invoice.billing_information.legal_name,
            invoice.billing_information.vat_number,
            invoice.billing_information.address_line_1,
            invoice.billing_information.address_line_2,
            invoice.billing_information.city,
            invoice.billing_information.postal_code,
            invoice.billing_information.country_name,
            invoice.mode,
            invoice.status,
            invoice.issuing_date,
            invoice.billing_period,
            invoice.from_date,
            invoice.to_date,
            invoice.due_date,
            invoice.currency,
            invoice.total,
            invoice.taxes_summary,
            invoice.reference,
            invoice.travelperk_bank_account.bank_name,
            invoice.travelperk_bank_account.account_number,
            invoice.travelperk_bank_account.bic,
            invoice.travelperk_bank_account.reference,
            invoice.pdf[0:40],  # This link will change every time
            invoice.lines.total,
            invoice.lines.data,
            invoice.lines.data[0].expense_date,
            invoice.lines.data[0].description,
            invoice.lines.data[0].quantity,
            invoice.lines.data[0].unit_price,
            invoice.lines.data[0].non_taxable_unit_price,
            invoice.lines.data[0].tax_percentage,
            invoice.lines.data[0].tax_amount,
            invoice.lines.data[0].tax_regime,
            invoice.lines.data[0].total_amount,
            invoice.lines.data[0].metadata.trip_id,
            invoice.lines.data[0].metadata.trip_name,
            invoice.lines.data[0].metadata.service,
            invoice.lines.data[0].metadata.travelers,
            invoice.lines.data[0].metadata.travelers[0].name,
            invoice.lines.data[0].metadata.travelers[0].email,
            invoice.lines.data[0].metadata.travelers[0].external_id,
            invoice.lines.data[0].metadata.start_date,
            invoice.lines.data[0].metadata.end_date,
            invoice.lines.data[0].metadata.cost_center,
            invoice.lines.data[0].metadata.labels,
            invoice.lines.data[0].metadata.labels[0],
            invoice.lines.data[0].metadata.vendor.code,
            invoice.lines.data[0].metadata.vendor.name,
            invoice.lines.data[0].metadata.out_of_policy,
            invoice.lines.data[0].metadata.approvers,
            invoice.lines.data[0].metadata.booker.name,
            invoice.lines.data[0].metadata.booker.email,
            invoice.lines.data[0].metadata.booker.external_id,
        ])

    def get_invoice_pdf(self):
        invoice_pdf = self.travelperk.expenses().invoices().pdf("CR-01-2")
        write_output("invoice_pdf", [
            invoice_pdf,
        ])

    def list_invoice_lines(self):
        lines = self.travelperk.expenses().invoices().lines_query().set_offset(1).set_limit(10).get()
        write_output("invoice_lines", [
            lines.total,
            lines.offset,
            lines.limit,
            lines.invoice_lines,
            lines.invoice_lines[0].expense_date,
            lines.invoice_lines[0].description,
            lines.invoice_lines[0].quantity,
            lines.invoice_lines[0].unit_price,
            lines.invoice_lines[0].non_taxable_unit_price,
            lines.invoice_lines[0].tax_percentage,
            lines.invoice_lines[0].tax_amount,
            lines.invoice_lines[0].tax_regime,
            lines.invoice_lines[0].total_amount,
            lines.invoice_lines[0].metadata.trip_id,
            lines.invoice_lines[0].metadata.trip_name,
            lines.invoice_lines[0].metadata.service,
            lines.invoice_lines[0].metadata.travelers,
            lines.invoice_lines[0].metadata.travelers[0].name,
            lines.invoice_lines[0].metadata.travelers[0].email,
            lines.invoice_lines[0].metadata.travelers[0].external_id,
            lines.invoice_lines[0].metadata.start_date,
            lines.invoice_lines[0].metadata.end_date,
            lines.invoice_lines[0].metadata.cost_center,
            lines.invoice_lines[0].metadata.labels,
            lines.invoice_lines[0].metadata.labels[0],
            lines.invoice_lines[0].metadata.vendor.code,
            lines.invoice_lines[0].metadata.vendor.name,
            lines.invoice_lines[0].metadata.out_of_policy,
            lines.invoice_lines[0].metadata.approvers,
            lines.invoice_lines[0].metadata.booker.name,
            lines.invoice_lines[0].metadata.booker.email,
            lines.invoice_lines[0].metadata.booker.external_id,
            lines.invoice_lines[0].invoice_serial_number,
            lines.invoice_lines[0].profile_id,
            lines.invoice_lines[0].profile_name,
            lines.invoice_lines[0].invoice_mode,
            lines.invoice_lines[0].invoice_status,
            lines.invoice_lines[0].issuing_date,
            lines.invoice_lines[0].due_date,
            lines.invoice_lines[0].currency,
        ])

    def get_billing_periods(self):
        billing_periods = self.travelperk.expenses().invoices().billing_periods()
        write_output("billing_periods", [
            billing_periods
        ])

    def get_statuses(self):
        statuses = self.travelperk.expenses().invoices().statuses()
        write_output("statuses", [
            statuses
        ])

    def get_sorting_values(self):
        sorting = self.travelperk.expenses().invoices().sorting()
        write_output("sorting", [
            sorting,
        ])

    def get_invoice_profiles(self):
        profiles = self.travelperk.expenses().invoice_profiles().query().set_offset(1).set_limit(10).get()
        write_output("profiles", [
            profiles.offset,
            profiles.limit,
            profiles.total,
            profiles.profiles,
            profiles.profiles[0].id,
            profiles.profiles[0].name,
            profiles.profiles[0].payment_method_type,
            profiles.profiles[0].billing_period,
            profiles.profiles[0].currency,
            profiles.profiles[0].billing_information.legal_name,
            profiles.profiles[0].billing_information.vat_number,
            profiles.profiles[0].billing_information.address_line_1,
            profiles.profiles[0].billing_information.address_line_2,
            profiles.profiles[0].billing_information.city,
            profiles.profiles[0].billing_information.postal_code,
            profiles.profiles[0].billing_information.country_name,
        ])
