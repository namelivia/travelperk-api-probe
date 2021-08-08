from utils import write_output


class TripsTests:
    def run(self, travelperk):
        print("List trips")
        self.list_trips(travelperk)
        print("Get bookings")
        self.list_bookings(travelperk)

    def list_trips(self, travelperk):
        trips = travelperk.trips().trips().query().set_offset(1).set_limit(10).get()
        write_output("trips", [
            trips.offset,
            trips.limit,
            trips.total,
            trips.trips,
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

    def list_bookings(self, travelperk):
        bookings = travelperk.trips().bookings().query().set_offset(1).set_limit(10).get()
        write_output("bookings", [
            bookings.offset,
            bookings.limit,
            bookings.total,
            bookings.bookings,
            bookings.bookings[0].id,
            bookings.bookings[0].start,
            bookings.bookings[0].end,
            bookings.bookings[0].type,
            bookings.bookings[0].status,
            bookings.bookings[0].modified,
            bookings.bookings[0].trip_id,
            bookings.bookings[0].references,
            bookings.bookings[0].references[0].type,
            bookings.bookings[0].references[0].value,
            # This fails sometimes if location is none
            # bookings.bookings[0].location.latitude,
            # bookings.bookings[0].location.longitude,
            # bookings.bookings[0].location.iata_code,
            bookings.bookings[0].legs,
        ])
