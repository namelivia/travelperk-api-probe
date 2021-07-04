import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
restriction = travelperk.travelsafe().travelsafe().local_summary(
    "ES", "country_code"
)
write_output("local_summary", [
    restriction.summary,
    restriction.details,
    restriction.risk_level.id,
    restriction.risk_level.name,
    restriction.risk_level.details,
    restriction.location.name,
    restriction.location.type,
    restriction.location.country_code,
    restriction.updated_at,
    restriction.guidelines,
    restriction.guidelines[0].category.id,
    restriction.guidelines[0].category.name,
    restriction.guidelines[0].sub_category.id,
    restriction.guidelines[0].sub_category.name,
    restriction.guidelines[0].summary,
    restriction.guidelines[0].details,
    restriction.guidelines[0].severity,
])
