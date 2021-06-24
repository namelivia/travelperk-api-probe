import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
bookings = travelperk.trips().bookings().query().set_offset(1).set_limit(10).get()
write_output("bookings", [
    bookings.offset,
    bookings.limit,
    bookings.total,
    len(bookings.bookings),
    bookings.bookings[0].id,
    bookings.bookings[0].start,
    bookings.bookings[0].end,
    bookings.bookings[0].type,
    bookings.bookings[0].status,
    bookings.bookings[0].modified,
    bookings.bookings[0].trip_id,
    len(bookings.bookings[0].references),
    bookings.bookings[0].references[0].type,
    bookings.bookings[0].references[0].value,
    bookings.bookings[0].location.latitude,
    bookings.bookings[0].location.longitude,
    bookings.bookings[0].location.iata_code,
    bookings.bookings[0].legs,
    bookings.bookings[9].id,
    bookings.bookings[9].start,
    bookings.bookings[9].end,
    bookings.bookings[9].type,
    bookings.bookings[9].status,
    bookings.bookings[9].modified,
    bookings.bookings[9].trip_id,
    len(bookings.bookings[9].references),
    bookings.bookings[9].references[0].type,
    bookings.bookings[9].references[0].value,
    bookings.bookings[9].location.latitude,
    bookings.bookings[9].location.longitude,
    bookings.bookings[9].location.iata_code,
    bookings.bookings[9].legs,
])
