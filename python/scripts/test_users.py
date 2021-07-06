from utils import write_output


class UsersTests:
    def run(self, travelperk):
        print("List users (non SCIM)")
        self.get_users(travelperk)

    def get_users(self, travelperk):
        users = travelperk.users().users().query().set_offset(1).set_limit(10).get()
        write_output("users", [
            users.offset,
            users.limit,
            users.total,
            users.users,
            users.users[0].id,
            users.users[0].user_name,
            users.users[0].name.first_name,
            users.users[0].name.last_name,
            users.users[0].name.middle_name,
            users.users[0].name.title,
            users.users[0].preferred_language,
            users.users[0].locale,
            users.users[0].active,
            users.users[0].job_title,
            users.users[0].phone_numbers,
            users.users[0].emergency_contact,
        ])
