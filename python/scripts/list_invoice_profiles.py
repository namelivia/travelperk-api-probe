import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["SANDBOX_API_KEY"], True)
profiles = travelperk.expenses().invoice_profiles().query().set_offset(1).set_limit(10).get()
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
