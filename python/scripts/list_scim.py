import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["SANDBOX_API_KEY"], True)
users = travelperk.scim().users().query().set_start_index(1).set_count(10).get()
write_output("scim_users", [
])
