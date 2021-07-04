import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
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
