import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
schemas = travelperk.scim().discovery().schemas()
write_output("schemas", [
    schemas["schemas"][0],
    schemas["totalResults"],
    schemas["itemsPerPage"],
    schemas["startIndex"],
    len(schemas["Resources"]),
    schemas["Resources"][0]["id"],
    schemas["Resources"][0]["name"],
    schemas["Resources"][0]["description"],
    len(schemas["Resources"][0]["attributes"]),
])
