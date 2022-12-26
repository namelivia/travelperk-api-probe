from utils import write_output
import datetime
from test_base import TestBase


class TravelsafeTests(TestBase):
    def run(self):
        print("Get travel restrictions")
        self.get_travel_restrictions()
        print("Get local summary")
        self.get_local_summary()
        print("Get airline safety measures")
        self.get_airline_safety_measures()
        print("Get location types")
        self.get_location_types()

    def get_travel_restrictions(self):
        restriction = self.travelperk.travelsafe().travelsafe().travel_restrictions(
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
            '''
            restriction.requirements[0].category.id,
            restriction.requirements[0].category.name,
            restriction.requirements[0].sub_category.id,
            restriction.requirements[0].sub_category.name,
            restriction.requirements[0].summary,
            restriction.requirements[0].details,
            restriction.requirements[0].start_date,
            restriction.requirements[0].end_date,
            restriction.requirements[0].documents,
            '''
        ])

    def get_local_summary(self):
        local_summary = self.travelperk.travelsafe().travelsafe().local_summary(
            "ES", "country_code"
        )
        write_output("local_summary", [
            local_summary.summary,
            local_summary.details,
            local_summary.risk_level.id,
            local_summary.risk_level.name,
            local_summary.risk_level.details,
            local_summary.location.name,
            local_summary.location.type,
            local_summary.location.country_code,
            local_summary.updated_at,
            local_summary.guidelines,
            local_summary.guidelines[0].category.id,
            local_summary.guidelines[0].category.name,
            local_summary.guidelines[0].sub_category.id,
            local_summary.guidelines[0].sub_category.name,
            local_summary.guidelines[0].summary,
            local_summary.guidelines[0].details,
            local_summary.guidelines[0].severity,
        ])

    def get_airline_safety_measures(self):
        safety_measure = self.travelperk.travelsafe().travelsafe().airline_safety_measures(
            "LH"
        )
        write_output("safety_measures", [
            safety_measure.airline.name,
            safety_measure.airline.iata_code,
            safety_measure.safety_measures,
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

    def get_location_types(self):
        location_types = self.travelperk.travelsafe().travelsafe().location_types()
        write_output("location_types", [
            location_types
        ])
