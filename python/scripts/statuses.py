import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
statuses = travelperk.expenses().invoices().statuses()
write_output("statuses", [
    statuses
])
