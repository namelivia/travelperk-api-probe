from utils import write_output
from test_base import TestBase


class CostCentersTests(TestBase):
    def run(self):
        print("List cost centers")
        self.list_cost_centers()
        print("Create cost center")
        self.create_cost_center()
        print("Get cost center")
        self.get_cost_center()
        print("Update cost center")
        self.update_cost_center()
        print("Bulk update cost center")
        self.bulk_update()
        print("Set users for cost centers")
        self.set_users()

    def list_cost_centers(self):
        cost_centers = self.travelperk.cost_centers().cost_centers().all()
        write_output("cost_centers", [
            cost_centers.offset,
            cost_centers.limit,
            cost_centers.cost_centers,
            cost_centers.cost_centers[0].id,
            cost_centers.cost_centers[0].name,
            cost_centers.cost_centers[0].count_users,
        ])

    def get_cost_center(self):
        cost_center = self.travelperk.cost_centers().cost_centers().get("1")
        write_output("cost_center", [
            cost_center.id,
            cost_center.name,
            cost_center.archived,
            cost_center.count_users,
            cost_center.users,
            cost_center.users[0].first_name,
            cost_center.users[0].last_name,
            cost_center.users[0].email,
            cost_center.users[0].id,
            cost_center.users[0].phone,
            cost_center.users[0].profile_picture,
        ])

    def update_cost_center(self):
        original_cost_center = self.travelperk.cost_centers().cost_centers().get("1")
        cost_center = self.travelperk.cost_centers().cost_centers().modify("1").set_name(
            "Updated name by api probe"
        ).save()
        write_output("updated_cost_center", [
            cost_center.id,
            cost_center.name,
            cost_center.archived,
            cost_center.count_users,
            cost_center.users,
            cost_center.users[0].first_name,
            cost_center.users[0].last_name,
            cost_center.users[0].email,
            cost_center.users[0].id,
            cost_center.users[0].phone,
            cost_center.users[0].profile_picture,
        ])
        self.travelperk.cost_centers().cost_centers().modify("1").set_name(
            original_cost_center.name
        ).save()

    def create_cost_center(self):
        cost_center = self.travelperk.cost_centers().cost_centers().create("api-probe-test-cost-center")
        write_output("create_cost_center", [
            # cost_center.id,
            cost_center.name,
            cost_center.archived,
            cost_center.count_users,
            cost_center.users
        ])
        # The cost center gets archived so it can be created again
        self.travelperk.cost_centers().cost_centers().modify(cost_center.id).set_archive(True).save()

    def bulk_update(self):
        response = self.travelperk.cost_centers().cost_centers().bulk_update().set_ids(
            [1, 2]
        ).set_archive(True).save()
        write_output("bulk_update_cost_center", [
            response.updated_count
        ])
        response = self.travelperk.cost_centers().cost_centers().bulk_update().set_ids(
            [1, 2]
        ).set_archive(False).save()

    def set_users(self):
        cost_center = self.travelperk.cost_centers().cost_centers().get("1")
        original_users = [user.id for user in cost_center.users]
        cost_center = self.travelperk.cost_centers().cost_centers().set_users(
            "1"
        ).set_ids([65, 34]).save()
        write_output("set_users_for_cost_center", [
            cost_center.id,
            cost_center.name,
            cost_center.archived,
            cost_center.count_users,
            cost_center.users,
            cost_center.users[0].first_name,
            cost_center.users[0].last_name,
            cost_center.users[0].email,
            cost_center.users[0].id,
            cost_center.users[0].phone,
            cost_center.users[0].profile_picture,
        ])
        self.travelperk.cost_centers().cost_centers().set_users("1").set_ids(
            original_users
        ).save()
