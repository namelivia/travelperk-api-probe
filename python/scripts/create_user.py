import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["SANDBOX_API_KEY"], True)
user = travelperk.scim().users().make(
    'test@api.probe',
    True,
    'Test',
    'Api Probe'
).set_locale("en").set_title("test_user").save()
write_output("create_user", [
    user.schemas[0],
    user.schemas[1],
    user.schemas[2],
    user.name.given_name,
    user.name.family_name,
    user.name.middle_name,
    user.name.honorific_prefix,
    user.locale,
    user.preferred_language,
    user.title,
    user.external_id,
    user.id,
    user.groups,
    user.active,
    user.user_name,
    len(user.phone_numbers),
    user.enterprise_extension.cost_center,
    user.travelperk_extension.gender,
    user.travelperk_extension.date_of_birth,
    user.travelperk_extension.travel_policy,
    user.travelperk_extension.invoice_profiles[0].value,
    user.travelperk_extension.emergency_contact.name,
    user.travelperk_extension.emergency_contact.phone,
    len(user.travelperk_extension.approvers),
])
