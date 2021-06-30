import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
billing_periods = travelperk.expenses().invoices().billing_periods()
write_output("billing_periods", [
    billing_periods
])
