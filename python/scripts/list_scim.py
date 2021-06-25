import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
users = travelperk.scim().users().query().setStartIndex(1).setCount(10).get()
write_output("scim_users", [
])
