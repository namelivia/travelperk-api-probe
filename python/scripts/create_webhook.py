import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
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
    len(webhook.events),
    webhook.events[0],
    webhook.successfully_sent,
    webhook.failed_sent,
    webhook.error_rate,
])
