import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
config = travelperk.scim().discovery().service_provider_config()
write_output("service_provider_config", [
    config["schemas"][0],
    config["patch"]["supported"],
    config["bulk"]["supported"],
    config["bulk"]["maxOperations"],
    config["bulk"]["maxPayloadSize"],
    config["filter"]["supported"],
    config["filter"]["maxResults"],
    config["changePassword"]["supported"],
    config["sort"]["supported"],
    config["etag"]["supported"],
    config["authenticationSchemes"][0]["type"],
    config["authenticationSchemes"][0]["name"],
    config["authenticationSchemes"][0]["description"],
    config["Schemas"][0]["id"],
    config["Schemas"][0]["name"],
    config["Schemas"][0]["description"],
    config["meta"]["location"],
    config["meta"]["resourceType"],
])
