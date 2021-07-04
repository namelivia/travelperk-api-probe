import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
cost_center = travelperk.cost_centers().cost_centers().get("1")
write_output("cost_center", [
    cost_center.id,
    cost_center.name,
    cost_center.archived,
    cost_center.count_users,
    cost_center.users,
    cost_center.users[0].first_name,
    cost_center.users[0].last_name,
    cost_center.users[0].email,
    cost_center.users[0].id,
    cost_center.users[0].phone,
    cost_center.users[0].profile_picture,
])
