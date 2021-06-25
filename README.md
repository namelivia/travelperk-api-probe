# TravelPerk API Probe

This project will be used to periodically test the TravelPerk API wrappers to check responses stay consistent.

To run it yourself, copy `.env.example` to `.env` and fill in your credentials, then execute `./run`.

## Operations included on the probe

### Expenses

#### Invoices

 - List all invoices (pending)
 - Retrieve an invoice (pending)
 - Retrieve invoice PDF (pending)
 - List all invoice lines (pending)
 - Get billing periods (pending)
 - Get statuses (pending)
 - Get sorting values (pending)

#### Invoice Profiles
 - List all invoice profiles (pending)

### SCIM
 - List users (pending)
 - Create a new user (pending)
 - Retrieve a user (pending)
 - Replace a user (pending)
 - Delete a user (pending)
 - Get genders (pending)
 - Get languages (pending)

#### Discovery
 - Service provider configuration [python](https://github.com/namelivia/travelperk-http-python/wiki/Discovery#service-provider-configuration) [php](https://github.com/namelivia/travelperk-http-php/wiki/Webhooks#list-all-webhook://github.com/namelivia/travelperk-http-php/wiki/Discovery#service-provider-configuration)
 - List resource types [python](https://github.com/namelivia/travelperk-http-python/wiki/Discovery#list-resource-types) [php](https://github.com/namelivia/travelperk-http-php/wiki/Discovery#list-resource-types)
 - List all schemas [python](https://github.com/namelivia/travelperk-http-python/wiki/Discovery#list-all-schemas) [php](https://github.com/namelivia/travelperk-http-php/wiki/Discovery#list-all-schemas)
 - User schema details [python](https://github.com/namelivia/travelperk-http-python/wiki/Discovery#user-schema-details) [php](https://github.com/namelivia/travelperk-http-php/wiki/Discovery#user-schema-details)
 - Enterprise user schema details [python](https://github.com/namelivia/travelperk-http-python/wiki/Discovery#enterprise-user-schema-details) [php](https://github.com/namelivia/travelperk-http-php/wiki/Discovery#enterprise-user-schema-details)

### Webhooks
 - List all webhooks [python](https://github.com/namelivia/travelperk-http-python/wiki/Webhooks#list-all-webhooks) [php](https://github.com/namelivia/travelperk-http-php/wiki/Webhooks#list-all-webhooks)
 - Create a webhook (pending)
 - Retrieve a webhook [python](https://github.com/namelivia/travelperk-http-python/wiki/Webhooks#retrieve-a-webhook) [php](https://github.com/namelivia/travelperk-http-php/wiki/Webhooks#retrieve-a-webhook)
 - Update a webhook (pending)
 - Test a webhook [python](https://github.com/namelivia/travelperk-http-python/wiki/Webhooks#test-a-webhook) [php](https://github.com/namelivia/travelperk-http-php/wiki/Webhooks#test-a-webhook)
 - Delete a webhook (pending)

### TravelSafe
 - Get travel restrictions [python](https://github.com/namelivia/travelperk-http-python/wiki/TravelSafe#get-travel-restrictions) [php](https://github.com/namelivia/travelperk-http-php/wiki/TravelSafe#get-travel-restrictions)
 - Get local summary [python](https://github.com/namelivia/travelperk-http-python/wiki/TravelSafe#get-local-summary) [php](https://github.com/namelivia/travelperk-http-php/wiki/TravelSafe#get-local-summary)
 - Get airline safety measures [python](https://github.com/namelivia/travelperk-http-python/wiki/TravelSafe#get-airline-safety-measures) [php](https://github.com/namelivia/travelperk-http-php/wiki/TravelSafe#get-airline-safety-measures)
 - Get location types (pending)

### Cost Centers
 - List cost centers [python](https://github.com/namelivia/travelperk-http-python/wiki/Cost-Centers#list-of-cost-centers) [php](https://github.com/namelivia/travelperk-http-php/wiki/Cost-Centers#list-of-cost-centers)
 - Cost center details [python](https://github.com/namelivia/travelperk-http-python/wiki/Cost-Centers#details-of-a-cost-center) [php](https://github.com/namelivia/travelperk-http-php/wiki/Cost-Centers#details-of-a-cost-center)
 - Update a cost center (pending)
 - Bulk update cost centers (pending)
 - Set users to a cost center (pending) 
 
### Trips
 - List trips [python](https://github.com/namelivia/travelperk-http-python/wiki/Trips#list-all-trips) [php](https://github.com/namelivia/travelperk-http-php/wiki/Trips#list-all-trips)
 - List bookings [python](https://github.com/namelivia/travelperk-http-python/wiki/Trips#list-all-bookings) [php](https://github.com/namelivia/travelperk-http-php/wiki/Trips#list-all-bookings)

### Users (non SCIM)
 - List users [python](https://github.com/namelivia/travelperk-http-python/wiki/Users-(non-SCIM)#list-all-users) [php](https://github.com/namelivia/travelperk-http-php/wiki/Users-(non-SCIM)#list-all-users)
