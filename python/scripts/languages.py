import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
languages = travelperk.scim().users().languages()
write_output("languages", [
    languages,
])
