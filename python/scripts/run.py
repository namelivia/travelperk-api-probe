import os
import logging
from travelperk_http_python.builder.builder import build
from test_webhooks import WebhooksTests
from test_expenses import ExpensesTests
from test_trips import TripsTests
from test_travelsafe import TravelsafeTests
from test_greenperk import GreenPerkTests
from test_cost_centers import CostCentersTests
from test_scim import SCIMTests
from test_users import UsersTests
travelperk = build(os.environ["API_KEY"], False)
sandbox_travelperk = build(os.environ["SANDBOX_API_KEY"], True)

logging.basicConfig(level=logging.INFO)

tests = [
    # Sandbox - Api key
    ExpensesTests(sandbox_travelperk),
    SCIMTests(sandbox_travelperk),
    CostCentersTests(sandbox_travelperk),
    GreenPerkTests(sandbox_travelperk),
    # Api key
    WebhooksTests(travelperk),
    TripsTests(travelperk),
    TravelsafeTests(travelperk),
    UsersTests(travelperk),
]
for test in tests:
    try:
        test.run()
    except Exception as e:
        print(str(e))
