import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
user_schema = travelperk.scim().discovery().user_schema()
write_output("user_schema", [
    user_schema["id"],
    user_schema["name"],
    user_schema["description"],
    user_schema["attributes"],
    user_schema["meta"]["resourceType"],
    user_schema["meta"]["location"],
])
