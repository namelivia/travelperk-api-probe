from utils import write_output


class WebhooksTests:
    def run(self, travelperk):
        print("List webhooks")
        self.list_webhooks(travelperk)
        print("Get webhook")
        self.get_webhook(travelperk)
        print("Test webhook")
        self.test_webhook(travelperk)
        print("Create webhook")
        self.create_webhook(travelperk)
        print("Update webhook")
        self.update_webhook(travelperk)
        print("Delete webhook")
        self.delete_webhook(travelperk)

    def list_webhooks(self, travelperk):
        webhooks = travelperk.webhooks().webhooks().all()
        write_output("webhooks", [
            webhooks.webhooks,
            webhooks.webhooks[0].id,
            webhooks.webhooks[0].enabled,
            webhooks.webhooks[0].name,
            webhooks.webhooks[0].url,
            webhooks.webhooks[0].secret,
            webhooks.webhooks[0].events,
            webhooks.webhooks[0].events[0],
            webhooks.webhooks[0].successfully_sent,
            webhooks.webhooks[0].failed_sent,
            webhooks.webhooks[0].error_rate,
        ])

    def get_webhook(self, travelperk):
        webhook = travelperk.webhooks().webhooks().get("b4ab65a2-31b6-4cf8-9cfb-f0788c47f7c7")
        write_output("webhook", [
            webhook.id,
            webhook.enabled,
            webhook.name,
            webhook.url,
            webhook.secret,
            webhook.events,
            webhook.events[0],
            webhook.successfully_sent,
            webhook.failed_sent,
            webhook.error_rate,
        ])

    def test_webhook(self, travelperk):
        webhook = travelperk.webhooks().webhooks().test("b4ab65a2-31b6-4cf8-9cfb-f0788c47f7c7")
        write_output("test_webhook", [])

    def create_webhook(self, travelperk):
        webhook = travelperk.webhooks().webhooks().create(
            "test",
            "https://test.namelivia.com",
            "SomeTestingSecret",
            ["invoice.issued"],
        )
        write_output("create_webhook", [
            webhook.id,
            webhook.enabled,
            webhook.name,
            webhook.url,
            webhook.secret,
            webhook.events,
            webhook.events[0],
            webhook.successfully_sent,
            webhook.failed_sent,
            webhook.error_rate,
        ])

    def update_webhook(self, travelperk):
        webhook = travelperk.webhooks().webhooks().modify(
            "1b92ce9c-2d80-45a1-bf8e-bbae60892ae7"
        ).set_enabled(False).save()
        # TODO: It would be convenient to be able to get the id from the create script
        write_output("update_webhook", [
            webhook.id,
            webhook.enabled,
            webhook.name,
            webhook.url,
            webhook.secret,
            webhook.events,
            webhook.events[0],
            webhook.successfully_sent,
            webhook.failed_sent,
            webhook.error_rate,
        ])

    def delete_webhook(self, travelperk):
        # TODO: It would be convenient to be able to get the id from the create script
        travelperk.webhooks().webhooks().delete(
            "1b92ce9c-2d80-45a1-bf8e-bbae60892ae7"
        )
