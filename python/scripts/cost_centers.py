import os
from travelperk_http_python.builder.builder import build
travelperk = build(os.environ["API_KEY"], False)
cost_centers = travelperk.cost_centers().cost_centers().all()
print(cost_centers)
print(cost_centers.cost_centers[0])
