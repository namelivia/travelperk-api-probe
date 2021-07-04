import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["SANDBOX_API_KEY"], True)
users = travelperk.scim().users().query().set_start_index(1).set_count(10).get()
write_output("scim_users", [
    users.schemas[0],
    users.total_results,
    users.items_per_page,
    users.start_index,
    users.resources,
    users.resources[0].schemas[0],
    users.resources[0].schemas[1],
    users.resources[0].schemas[2],
    users.resources[0].name.given_name,
    users.resources[0].name.family_name,
    users.resources[0].name.middle_name,
    users.resources[0].name.honorific_prefix,
    users.resources[0].locale,
    users.resources[0].preferred_language,
    users.resources[0].title,
    users.resources[0].external_id,
    users.resources[0].id,
    users.resources[0].groups,
    users.resources[0].active,
    users.resources[0].user_name,
    users.resources[0].phone_numbers,
    users.resources[0].enterprise_extension.cost_center,
    users.resources[0].travelperk_extension.gender,
    users.resources[0].travelperk_extension.date_of_birth,
    users.resources[0].travelperk_extension.travel_policy,
    users.resources[0].travelperk_extension.invoice_profiles[0].value,
    users.resources[0].travelperk_extension.emergency_contact.name,
    users.resources[0].travelperk_extension.emergency_contact.phone,
    users.resources[0].travelperk_extension.approvers,
])
