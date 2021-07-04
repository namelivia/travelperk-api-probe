import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
enterprise_schema = travelperk.scim().discovery().enterprise_user_schema()
write_output("enterprise_schema", [
    enterprise_schema["id"],
    enterprise_schema["name"],
    enterprise_schema["description"],
    enterprise_schema["attributes"],
    enterprise_schema["meta"]["resourceType"],
    enterprise_schema["meta"]["location"],
])
