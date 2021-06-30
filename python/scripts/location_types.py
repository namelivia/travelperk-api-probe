import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
location_types = travelperk.travelsafe().travelsafe().location_types()
write_output("location_types", [
    location_types
])
