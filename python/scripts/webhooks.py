import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
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
