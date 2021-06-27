import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
profiles = travelperk.expenses().invoice_profiles().query().set_offset(1).set_limit(10).get()
write_output("profiles", [
    # TODO: For some reason this is failing
])
