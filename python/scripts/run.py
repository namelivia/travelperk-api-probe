import os
from travelperk_http_python.builder.builder import build
from test_webhooks import WebhooksTests
from test_expenses import ExpensesTests
from test_trips import TripsTests
from test_travelsafe import TravelsafeTests
from test_cost_centers import CostCentersTests
from test_scim import SCIMTests
from test_users import UsersTests
travelperk = build(os.environ["API_KEY"], False)
sandbox_travelperk = build(os.environ["SANDBOX_API_KEY"], True)

sandbox_tests = [ExpensesTests(), SCIMTests(), CostCentersTests()]
[test.run(sandbox_travelperk) for test in sandbox_tests]

tests = [WebhooksTests(), TripsTests(), TravelsafeTests(), UsersTests()]
[test.run(travelperk) for test in tests]
