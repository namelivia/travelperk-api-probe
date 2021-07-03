import os
from travelperk_http_python.builder.builder import build
travelperk = build(os.environ["SANDBOX_API_KEY"], True)
# TODO: It would be convenient to be able to get the id from the create script
# This operation returns nothing
travelperk.scim().users().delete(5745)
