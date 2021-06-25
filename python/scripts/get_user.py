import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
user = travelperk.scim().users().get(1)
write_output("user", [
])
