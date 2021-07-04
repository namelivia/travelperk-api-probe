import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
response = travelperk.cost_centers().cost_centers().bulk_update().set_ids(
    ["1", "2"]
).set_archive(True).save()
write_output("bulk_update_cost_center", [
    response.updated_count
])
travelperk.cost_centers().cost_centers().bulk_update().set_ids(
    ["1", "2"]
).set_archive(False).save()
