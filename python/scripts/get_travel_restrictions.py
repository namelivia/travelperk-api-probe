import os
import datetime
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
restriction = travelperk.travelsafe().travelsafe().travel_restrictions(
    "ES", "FR", "country_code", "country_code", datetime.date.today()
)
write_output("travel_restrictions", [
    restriction.origin.name,
    restriction.origin.type,
    restriction.origin.country_code,
    restriction.destination.name,
    restriction.destination.type,
    restriction.destination.country_code,
    restriction.authorization_status,
    restriction.summary,
    restriction.details,
    restriction.start_date,
    restriction.end_date,
    restriction.updated_at,
    restriction.requirements,
    restriction.requirements[0].category.id,
    restriction.requirements[0].category.name,
    restriction.requirements[0].sub_category.id,
    restriction.requirements[0].sub_category.name,
    restriction.requirements[0].summary,
    restriction.requirements[0].details,
    restriction.requirements[0].start_date,
    restriction.requirements[0].end_date,
    restriction.requirements[0].documents,
])
