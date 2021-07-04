import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
cost_centers = travelperk.cost_centers().cost_centers().all()
write_output("cost_centers", [
    cost_centers.offset,
    cost_centers.limit,
    cost_centers.cost_centers,
    cost_centers.cost_centers[0].id,
    cost_centers.cost_centers[0].name,
    cost_centers.cost_centers[0].count_users,
])
