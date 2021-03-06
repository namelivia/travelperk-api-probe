from utils import write_output
from test_base import TestBase


class SCIMTests(TestBase):
    def run(self):
        print("Get service provider configuration")
        self.get_service_provider_config()
        print("Get resources types")
        self.get_resource_types()
        print("Get user schema")
        self.get_user_schema()
        print("Get enterprise schema")
        self.get_enterprise_schema()
        print("List users")
        self.list_users()
        print("Get user")
        self.get_user()
        print("Create user")
        user_id = self.create_user()
        print("Replace user")
        self.replace_user(user_id)
        print("Delete user")
        self.delete_user(user_id)
        print("Get genders")
        self.get_genders()
        print("Get languages")
        self.get_languages()

    def get_service_provider_config(self):
        config = self.travelperk.scim().discovery().service_provider_config()
        write_output("service_provider_config", [
            config["schemas"][0],
            config["patch"]["supported"],
            config["bulk"]["supported"],
            config["bulk"]["maxOperations"],
            config["bulk"]["maxPayloadSize"],
            config["filter"]["supported"],
            config["filter"]["maxResults"],
            config["changePassword"]["supported"],
            config["sort"]["supported"],
            config["etag"]["supported"],
            config["authenticationSchemes"][0]["type"],
            config["authenticationSchemes"][0]["name"],
            config["authenticationSchemes"][0]["description"],
            config["Schemas"][0]["id"],
            config["Schemas"][0]["name"],
            config["Schemas"][0]["description"],
            config["meta"]["location"],
            config["meta"]["resourceType"],
        ])

    def get_resource_types(self):
        resource_types = self.travelperk.scim().discovery().resource_types()
        write_output("list_resource_types", [
            resource_types["totalResults"],
            resource_types["itemsPerPage"],
            resource_types["startIndex"],
            resource_types["schemas"][0],
            resource_types["Resources"][0]["schemas"][0],
            resource_types["Resources"][0]["id"],
            resource_types["Resources"][0]["name"],
            resource_types["Resources"][0]["endpoint"],
            resource_types["Resources"][0]["description"],
            resource_types["Resources"][0]["schema"],
            resource_types["Resources"][0]["schemaExtensions"][0]["schema"],
            resource_types["Resources"][0]["schemaExtensions"][0]["required"],
            resource_types["Resources"][0]["schemaExtensions"][1]["schema"],
            resource_types["Resources"][0]["schemaExtensions"][1]["required"],
            resource_types["Resources"][0]["meta"]["resourceType"],
            resource_types["Resources"][0]["meta"]["location"],
        ])

    def get_user_schema(self):
        user_schema = self.travelperk.scim().discovery().user_schema()
        write_output("user_schema", [
            user_schema["id"],
            user_schema["name"],
            user_schema["description"],
            user_schema["attributes"],
            user_schema["meta"]["resourceType"],
            user_schema["meta"]["location"],
        ])

    def get_enterprise_schema(self):
        enterprise_schema = self.travelperk.scim().discovery().enterprise_user_schema()
        write_output("enterprise_schema", [
            enterprise_schema["id"],
            enterprise_schema["name"],
            enterprise_schema["description"],
            enterprise_schema["attributes"],
            enterprise_schema["meta"]["resourceType"],
            enterprise_schema["meta"]["location"],
        ])

    def list_users(self):
        users = self.travelperk.scim().users().query().set_start_index(1).set_count(10).get()
        write_output("scim_users", [
            users.schemas[0],
            users.total_results,
            users.items_per_page,
            users.start_index,
            users.resources,
            users.resources[0].schemas[0],
            users.resources[0].schemas[1],
            users.resources[0].schemas[2],
            users.resources[0].name.given_name,
            users.resources[0].name.family_name,
            users.resources[0].name.middle_name,
            users.resources[0].name.honorific_prefix,
            users.resources[0].locale,
            users.resources[0].preferred_language,
            users.resources[0].title,
            users.resources[0].external_id,
            users.resources[0].id,
            users.resources[0].groups,
            users.resources[0].active,
            users.resources[0].user_name,
            users.resources[0].phone_numbers,
            users.resources[0].enterprise_extension.cost_center,
            users.resources[0].travelperk_extension.gender,
            users.resources[0].travelperk_extension.date_of_birth,
            users.resources[0].travelperk_extension.travel_policy,
            users.resources[0].travelperk_extension.invoice_profiles[0].value,
            users.resources[0].travelperk_extension.emergency_contact.name,
            users.resources[0].travelperk_extension.emergency_contact.phone,
            users.resources[0].travelperk_extension.approvers,
        ])

    def get_user(self):
        user = self.travelperk.scim().users().get(2)
        write_output("user", [
            user.schemas[0],
            user.schemas[1],
            user.schemas[2],
            user.name.given_name,
            user.name.family_name,
            user.name.middle_name,
            user.name.honorific_prefix,
            user.locale,
            user.preferred_language,
            user.title,
            user.external_id,
            user.id,
            user.groups,
            user.active,
            user.user_name,
            user.phone_numbers,
            user.enterprise_extension.cost_center,
            user.travelperk_extension.gender,
            user.travelperk_extension.date_of_birth,
            user.travelperk_extension.travel_policy,
            user.travelperk_extension.invoice_profiles[0].value,
            user.travelperk_extension.emergency_contact.name,
            user.travelperk_extension.emergency_contact.phone,
            user.travelperk_extension.approvers,
        ])

    def create_user(self):
        user = self.travelperk.scim().users().make(
            'test@api.probe',
            True,
            'Test',
            'Api Probe'
        ).set_locale("en").set_title("test_user").save()
        write_output("create_user", [
            user.schemas[0],
            user.schemas[1],
            user.schemas[2],
            user.name.given_name,
            user.name.family_name,
            user.name.middle_name,
            user.name.honorific_prefix,
            user.locale,
            user.preferred_language,
            user.title,
            user.external_id,
            # user.id, This will change every time
            user.groups,
            user.active,
            user.user_name,
            user.phone_numbers,
            user.enterprise_extension.cost_center,
            user.travelperk_extension.gender,
            user.travelperk_extension.date_of_birth,
            user.travelperk_extension.travel_policy,
            # TODO: This comes empty
            # user.travelperk_extension.invoice_profiles[0].value,
            user.travelperk_extension.emergency_contact.name,
            user.travelperk_extension.emergency_contact.phone,
            user.travelperk_extension.approvers,
        ])
        return user.id

    def replace_user(self, user_id):
        user = self.travelperk.scim().users().modify(
            user_id,
            'replaced@api.probe',
            True,
            'Test Updated',
            'Api Probe Updated'
        ).set_locale("fr").set_title("test_user_updated").save()
        write_output("replace_user", [
            user.schemas[0],
            user.schemas[1],
            user.schemas[2],
            user.name.given_name,
            user.name.family_name,
            user.name.middle_name,
            user.name.honorific_prefix,
            user.locale,
            user.preferred_language,
            user.title,
            user.external_id,
            # user.id, This will change every time
            user.groups,
            user.active,
            user.user_name,
            user.phone_numbers,
            user.enterprise_extension.cost_center,
            user.travelperk_extension.gender,
            user.travelperk_extension.date_of_birth,
            user.travelperk_extension.travel_policy,
            # TODO: This comes empty
            # user.travelperk_extension.invoice_profiles[0].value,
            user.travelperk_extension.emergency_contact.name,
            user.travelperk_extension.emergency_contact.phone,
            user.travelperk_extension.approvers,
        ])

    def delete_user(self, user_id):
        # This operation returns nothing
        self.travelperk.scim().users().delete(user_id)

    def get_genders(self):
        genders = self.travelperk.scim().users().genders()
        write_output("genders", [
            genders,
        ])

    def get_languages(self):
        languages = self.travelperk.scim().users().languages()
        write_output("languages", [
            languages,
        ])
