import os
from travelperk_http_python.builder.builder import build
from utils import write_output
travelperk = build(os.environ["API_KEY"], False)
original_cost_center = travelperk.cost_centers().cost_centers().get("1")
cost_center = travelperk.cost_centers().cost_centers().modify("1").set_name(
    "Updated name by api probe"
).save()
write_output("updated_cost_center", [
    cost_center.id,
    cost_center.name,
    cost_center.archived,
    cost_center.count_users,
    len(cost_center.users),
    cost_center.users[0].first_name,
    cost_center.users[0].last_name,
    cost_center.users[0].email,
    cost_center.users[0].id,
    cost_center.users[0].phone,
    cost_center.users[0].profile_picture,
])
travelperk.cost_centers().cost_centers().modify("1").set_name(
    original_cost_center.name
).save()
