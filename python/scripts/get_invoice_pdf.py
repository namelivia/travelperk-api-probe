import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["SANDBOX_API_KEY"], True)
invoice_pdf = travelperk.expenses().invoices().pdf("CR-01-2")
write_output("invoice_pdf", [
    invoice_pdf,
])
