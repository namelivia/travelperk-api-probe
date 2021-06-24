import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
webhook = travelperk.webhooks().webhooks().get("b4ab65a2-31b6-4cf8-9cfb-f0788c47f7c7")
write_output("webhook", [
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
