from utils import write_output


class CostCentersTests:
    def run(self, travelperk):
        print("List cost centers")
        self.list_cost_centers(travelperk)
        print("Create cost center")
        self.create_cost_center(travelperk)
        print("Get cost center")
        self.get_cost_center(travelperk)
        print("Update cost center")
        self.update_cost_center(travelperk)
        print("Bulk update cost center")
        self.bulk_update(travelperk)
        print("Set users for cost centers")
        self.set_users(travelperk)

    def list_cost_centers(self, travelperk):
        cost_centers = travelperk.cost_centers().cost_centers().all()
        write_output("cost_centers", [
            cost_centers.offset,
            cost_centers.limit,
            cost_centers.cost_centers,
            cost_centers.cost_centers[0].id,
            cost_centers.cost_centers[0].name,
            cost_centers.cost_centers[0].count_users,
        ])

    def get_cost_center(self, travelperk):
        cost_center = travelperk.cost_centers().cost_centers().get("1")
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

    def update_cost_center(self, travelperk):
        original_cost_center = travelperk.cost_centers().cost_centers().get("1")
        cost_center = travelperk.cost_centers().cost_centers().modify("1").set_name(
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
        travelperk.cost_centers().cost_centers().modify("1").set_name(
            original_cost_center.name
        ).save()

    def create_cost_center(self, travelperk):
        cost_center = travelperk.cost_centers().cost_centers().create("api-probe-test-cost-center")
        write_output("create_cost_center", [
            # cost_center.id,
            cost_center.name,
            cost_center.archived,
            cost_center.count_users,
            cost_center.users
        ])
        # The cost center gets archived so it can be created again
        travelperk.cost_centers().cost_centers().modify(cost_center.id).set_archive(True).save()

    def bulk_update(self, travelperk):
        response = travelperk.cost_centers().cost_centers().bulk_update().set_ids(
            [1, 2]
        ).set_archive(True).save()
        write_output("bulk_update_cost_center", [
            response.updated_count
        ])
        response = travelperk.cost_centers().cost_centers().bulk_update().set_ids(
            [1, 2]
        ).set_archive(False).save()

    def set_users(self, travelperk):
        cost_center = travelperk.cost_centers().cost_centers().get("1")
        original_users = [user.id for user in cost_center.users]
        cost_center = travelperk.cost_centers().cost_centers().set_users(
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
        travelperk.cost_centers().cost_centers().set_users("1").set_ids(
            original_users
        ).save()
