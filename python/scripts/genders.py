import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
genders = travelperk.scim().users().genders()
write_output("genders", [
    genders,
])
