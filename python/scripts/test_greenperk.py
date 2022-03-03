from utils import write_output
from test_base import TestBase


class GreenPerkTests(TestBase):
    def run(self):
        print("Get flight emissions")
        self.get_flight_emissions()
        print("Get train emissions")
        self.get_train_emissions()
        print("Get car emissions")
        self.get_car_emissions()
        print("Get hotels emissions")
        self.get_hotel_emissions()

    def get_flight_emissions(self):
        emissions = self.travelperk.greenperk().greenperk().flight_emissions(
            "BCN", "LHR", "economy", "BA"
        )
        write_output("flight_emissions", [
            emissions.emissions.CO2e_kg,
            emissions.distance_km,
        ])

    def get_train_emissions(self):
        emissions = self.travelperk.greenperk().greenperk().train_emissions(
            "c44ba069-4109-4b40-815c-bf519c2c2844",
            "637d125e-9d00-478a-822c-e60c6e219227",
            "eurostar"
        )
        write_output("train_emissions", [
            emissions.emissions.CO2e_kg,
            emissions.distance_km,
        ])

    def get_car_emissions(self):
        emissions = self.travelperk.greenperk().greenperk().car_emissions(
            "MCFD",
            2,
            100
        )
        write_output("car_emissions", [
            emissions.emissions.CO2e_kg,
            emissions.distance_km,
        ])

    def get_hotel_emissions(self):
        emissions = self.travelperk.greenperk().greenperk().hotel_emissions(
            "ES",
            2
        )
        write_output("hotel_emissions", [
            emissions.emissions.CO2e_kg
        ])
