import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
restriction = travelperk.travelsafe().travelsafe().local_summary(
    "ES", "country_code"
)
write_output("local_summary", [
])
