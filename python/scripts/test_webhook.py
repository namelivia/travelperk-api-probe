import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
webhook = travelperk.webhooks().webhooks().test("b4ab65a2-31b6-4cf8-9cfb-f0788c47f7c7")
write_output("test_webhook", [])
