import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
trips = travelperk.trips().trips().query().set_offset(1).set_limit(10).get()
write_output("trips", [
    trips.offset,
    trips.limit,
    trips.total,
    len(trips.trips),
    trips.trips[0].id,
    trips.trips[0].trip_name,
    trips.trips[0].start,
    trips.trips[0].end,
    trips.trips[0].status,
    trips.trips[0].modified,
    trips.trips[9].id,
    trips.trips[9].trip_name,
    trips.trips[9].start,
    trips.trips[9].end,
    trips.trips[9].status,
    trips.trips[9].modified,
])
