import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
sorting = travelperk.expenses().invoices().sorting()
write_output("sorting", [
    sorting,
])
