import os
from travelperk_http_python.builder.builder import build
travelperk = build(os.environ["API_KEY"], False)
cost_centers = travelperk.cost_centers().cost_centers().all()
with open("/app/output/cost_centers", "a") as output_file:
    output_file.write(str(cost_centers.offset))
    output_file.write(str(cost_centers.limit))
    output_file.write(str(len(cost_centers.cost_centers)))
    output_file.write(str(cost_centers.cost_centers[0].id))
    output_file.write(str(cost_centers.cost_centers[0].name))
    output_file.write(str(cost_centers.cost_centers[0].count_users))
