import os
from travelperk_http_python.builder.builder import build
travelperk = build(os.environ["API_KEY"], False)
# TODO: It would be convenient to be able to get the id from the create script
travelperk.webhooks().webhooks().delete(
    "1b92ce9c-2d80-45a1-bf8e-bbae60892ae7"
)
