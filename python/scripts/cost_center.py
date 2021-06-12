import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
cost_centers = travelperk.cost_centers().cost_centers().get("1")
write_output("cost_center", [
    cost_centers.id,
    cost_centers.name,
    cost_centers.archived,
    cost_centers.count_users,
    len(cost_centers.users),
    cost_centers.users[0].first_name,
    cost_centers.users[0].last_name,
    cost_centers.users[0].email,
    cost_centers.users[0].id,
    cost_centers.users[0].phone,
    cost_centers.users[0].profile_picture,
])
