import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["SANDBOX_API_KEY"], True)
invoices = travelperk.expenses().invoices().query().set_offset(1).set_limit(10).get()
write_output("invoices", [
    invoices.offset,
    invoices.limit,
    invoices.total,
    len(invoices.invoices),
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
    invoices.invoices[0].pdf,
])
