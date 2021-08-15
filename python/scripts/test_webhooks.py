from utils import write_output
from test_base import TestBase


class WebhooksTests(TestBase):
    def run(self):
        print("List webhooks")
        self.list_webhooks()
        print("Get webhook")
        self.get_webhook()
        print("Test webhook")
        self.test_webhook()
        print("Create webhook")
        webhook_id = self.create_webhook()
        print("Update webhook")
        self.update_webhook(webhook_id)
        print("Delete webhook")
        self.delete_webhook(webhook_id)

    def list_webhooks(self):
        webhooks = self.travelperk.webhooks().webhooks().all()
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

    def get_webhook(self):
        webhook = self.travelperk.webhooks().webhooks().get("b4ab65a2-31b6-4cf8-9cfb-f0788c47f7c7")
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

    def test_webhook(self):
        self.travelperk.webhooks().webhooks().test("b4ab65a2-31b6-4cf8-9cfb-f0788c47f7c7")

    def create_webhook(self):
        webhook = self.travelperk.webhooks().webhooks().create(
            "test",
            "https://test.namelivia.com",
            "SomeTestingSecret",
            ["invoice.issued"],
        )
        write_output("create_webhook", [
            # webhook.id,  Id will be new every time
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
        return webhook.id

    def update_webhook(self, webhook_id):
        webhook = self.travelperk.webhooks().webhooks().modify(webhook_id).set_enabled(False).save()
        write_output("update_webhook", [
            # webhook.id, Id will be new every time
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

    def delete_webhook(self, webhook_id):
        self.travelperk.webhooks().webhooks().delete(webhook_id)
