import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
safety_measure = travelperk.travelsafe().travelsafe().airline_safety_measures(
    "LH"
)
write_output("safety_measures", [
    safety_measure.airline.name,
    safety_measure.airline.iata_code,
    len(safety_measure.safety_measures),
    safety_measure.safety_measures[0].category.id,
    safety_measure.safety_measures[0].category.name,
    safety_measure.safety_measures[0].sub_category.id,
    safety_measure.safety_measures[0].sub_category.name,
    safety_measure.safety_measures[0].details,
    safety_measure.safety_measures[0].summary,
    safety_measure.info_source.name,
    safety_measure.info_source.url,
    safety_measure.updated_at,
])
