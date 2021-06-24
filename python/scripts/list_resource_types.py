import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
resource_types = travelperk.scim().discovery().resource_types()
write_output("list_resource_types", [
    resource_types["totalResults"],
    resource_types["itemsPerPage"],
    resource_types["startIndex"],
    resource_types["schemas"][0],
    resource_types["Resources"][0]["schemas"][0],
    resource_types["Resources"][0]["id"],
    resource_types["Resources"][0]["name"],
    resource_types["Resources"][0]["endpoint"],
    resource_types["Resources"][0]["description"],
    resource_types["Resources"][0]["schema"],
    resource_types["Resources"][0]["schemaExtensions"][0]["schema"],
    resource_types["Resources"][0]["schemaExtensions"][0]["required"],
    resource_types["Resources"][0]["schemaExtensions"][1]["schema"],
    resource_types["Resources"][0]["schemaExtensions"][1]["required"],
    resource_types["Resources"][0]["meta"]["resourceType"],
    resource_types["Resources"][0]["meta"]["location"],
])
