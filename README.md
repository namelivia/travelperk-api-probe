# TravelPerk API Probe

This project will be used to periodically test the TravelPerk API wrappers to check responses stay consistent.

To run it yourself, copy `.env.example` to `.env` and fill in your credentials, then execute `./run`.

## Operations included on the probe

### Expenses

#### Invoices

 - List all invoices [python](https://github.com/namelivia/travelperk-http-python/wiki/Invoices#list-all-invoices) [php](https://github.com/namelivia/travelperk-http-php/wiki/Invoices#list-all-invoices)
 - Retrieve an invoice [python](https://github.com/namelivia/travelperk-http-python/wiki/Invoices#retrieve-an-invoice) [php](https://github.com/namelivia/travelperk-http-php/wiki/Invoices#retrieve-an-invoice)
 - Retrieve invoice PDF (pending)
 - List all invoice lines [python](https://github.com/namelivia/travelperk-http-python/wiki/Invoices#list-all-invoice-lines) [php](https://github.com/namelivia/travelperk-http-php/wiki/Invoices#list-all-invoice-lines)
 - Get billing periods [python](https://github.com/namelivia/travelperk-http-python/wiki/Invoices#get-billing-periods) [php](https://github.com/namelivia/travelperk-http-php/wiki/Invoices#get-billing-periods)
 - Get statuses [python](https://github.com/namelivia/travelperk-http-python/wiki/Invoices#get-statuses) [php](https://github.com/namelivia/travelperk-http-php/wiki/Invoices#get-statuses)
 - Get sorting values [python](https://github.com/namelivia/travelperk-http-python/wiki/Invoices#get-sorting-values) [php](https://github.com/namelivia/travelperk-http-php/wiki/Invoices#get-sorting-values)

#### Invoice Profiles
 - List all invoice profiles [python](https://github.com/namelivia/travelperk-http-python/wiki/Invoice-Profiles#list-all-invoice-profiles) [php](https://github.com/namelivia/travelperk-http-php/wiki/Invoice-Profiles#list-all-invoice-profiles)

### SCIM
 - List users [python](https://github.com/namelivia/travelperk-http-python/wiki/Users#list-users) [php](https://github.com/namelivia/travelperk-http-php/wiki/Users#list-users)
 - Create a new user [python](https://github.com/namelivia/travelperk-http-python/wiki/Users#create-a-new-user) [php](https://github.com/namelivia/travelperk-http-php/wiki/Users#create-a-new-user)
 - Retrieve a user [python](https://github.com/namelivia/travelperk-http-python/wiki/Users#retrieve-a-user) [php](https://github.com/namelivia/travelperk-http-php/wiki/Users#retrieve-a-user)
 - Replace a user [python](https://github.com/namelivia/travelperk-http-python/wiki/Users#replace-a-user) [php](https://github.com/namelivia/travelperk-http-php/wiki/Users#replace-a-user)
 - Delete a user [python](https://github.com/namelivia/travelperk-http-python/wiki/Users#delete-a-user) [php](https://github.com/namelivia/travelperk-http-php/wiki/Users#delete-a-user)
 - Get genders [python](https://github.com/namelivia/travelperk-http-python/wiki/Users#get-genders) [php](https://github.com/namelivia/travelperk-http-php/wiki/Users#get-genders)
 - Get languages [python](https://github.com/namelivia/travelperk-http-python/wiki/Users#get-genders) [php](https://github.com/namelivia/travelperk-http-php/wiki/Users#get-genders)

#### Discovery
 - Service provider configuration [python](https://github.com/namelivia/travelperk-http-python/wiki/Discovery#service-provider-configuration) [php](https://github.com/namelivia/travelperk-http-php/wiki/Webhooks#list-all-webhook://github.com/namelivia/travelperk-http-php/wiki/Discovery#service-provider-configuration)
 - List resource types [python](https://github.com/namelivia/travelperk-http-python/wiki/Discovery#list-resource-types) [php](https://github.com/namelivia/travelperk-http-php/wiki/Discovery#list-resource-types)
 - List all schemas [python](https://github.com/namelivia/travelperk-http-python/wiki/Discovery#list-all-schemas) [php](https://github.com/namelivia/travelperk-http-php/wiki/Discovery#list-all-schemas)
 - User schema details [python](https://github.com/namelivia/travelperk-http-python/wiki/Discovery#user-schema-details) [php](https://github.com/namelivia/travelperk-http-php/wiki/Discovery#user-schema-details)
 - Enterprise user schema details [python](https://github.com/namelivia/travelperk-http-python/wiki/Discovery#enterprise-user-schema-details) [php](https://github.com/namelivia/travelperk-http-php/wiki/Discovery#enterprise-user-schema-details)

### Webhooks
 - List all webhooks [python](https://github.com/namelivia/travelperk-http-python/wiki/Webhooks#list-all-webhooks) [php](https://github.com/namelivia/travelperk-http-php/wiki/Webhooks#list-all-webhooks)
 - Create a webhook [python](https://github.com/namelivia/travelperk-http-python/wiki/Webhooks#create-a-webhook) [php](https://github.com/namelivia/travelperk-http-php/wiki/Webhooks#create-a-webhook)
 - Retrieve a webhook [python](https://github.com/namelivia/travelperk-http-python/wiki/Webhooks#retrieve-a-webhook) [php](https://github.com/namelivia/travelperk-http-php/wiki/Webhooks#retrieve-a-webhook)
 - Update a webhook [python](https://github.com/namelivia/travelperk-http-python/wiki/Webhooks#update-a-webhook) [php](https://github.com/namelivia/travelperk-http-php/wiki/Webhooks#update-a-webhook)
 - Test a webhook [python](https://github.com/namelivia/travelperk-http-python/wiki/Webhooks#test-a-webhook) [php](https://github.com/namelivia/travelperk-http-php/wiki/Webhooks#test-a-webhook)
 - Delete a webhook [python](https://github.com/namelivia/travelperk-http-python/wiki/Webhooks#delete-a-webhook) [php](https://github.com/namelivia/travelperk-http-php/wiki/Webhooks#delete-a-webhook)

### TravelSafe
 - Get travel restrictions [python](https://github.com/namelivia/travelperk-http-python/wiki/TravelSafe#get-travel-restrictions) [php](https://github.com/namelivia/travelperk-http-php/wiki/TravelSafe#get-travel-restrictions)
 - Get local summary [python](https://github.com/namelivia/travelperk-http-python/wiki/TravelSafe#get-local-summary) [php](https://github.com/namelivia/travelperk-http-php/wiki/TravelSafe#get-local-summary)
 - Get airline safety measures [python](https://github.com/namelivia/travelperk-http-python/wiki/TravelSafe#get-airline-safety-measures) [php](https://github.com/namelivia/travelperk-http-php/wiki/TravelSafe#get-airline-safety-measures)
 - Get location types [python](https://github.com/namelivia/travelperk-http-python/wiki/Users#get-genders) [php](https://github.com/namelivia/travelperk-http-php/wiki/Users#get-genders)

### Cost Centers
 - List cost centers [python](https://github.com/namelivia/travelperk-http-python/wiki/Cost-Centers#list-of-cost-centers) [php](https://github.com/namelivia/travelperk-http-php/wiki/Cost-Centers#list-of-cost-centers)
 - Cost center details [python](https://github.com/namelivia/travelperk-http-python/wiki/Cost-Centers#details-of-a-cost-center) [php](https://github.com/namelivia/travelperk-http-php/wiki/Cost-Centers#details-of-a-cost-center)
 - Update a cost center [python](https://github.com/namelivia/travelperk-http-python/wiki/Cost-Centers#update-a-cost-center) [php](https://github.com/namelivia/travelperk-http-php/wiki/Cost-Centers#update-a-cost-center)
 - Bulk update cost centers [python](https://github.com/namelivia/travelperk-http-python/wiki/Cost-Centers#bulk-update-of-cost-centers) [php](https://github.com/namelivia/travelperk-http-php/wiki/Cost-Centers#bulk-update-of-cost-centers)
 - Set users to a cost center (pending) 
 
### Trips
 - List trips [python](https://github.com/namelivia/travelperk-http-python/wiki/Trips#list-all-trips) [php](https://github.com/namelivia/travelperk-http-php/wiki/Trips#list-all-trips)
 - List bookings [python](https://github.com/namelivia/travelperk-http-python/wiki/Trips#list-all-bookings) [php](https://github.com/namelivia/travelperk-http-php/wiki/Trips#list-all-bookings)

### Users (non SCIM)
 - List users [python](https://github.com/namelivia/travelperk-http-python/wiki/Users-(non-SCIM)#list-all-users) [php](https://github.com/namelivia/travelperk-http-php/wiki/Users-(non-SCIM)#list-all-users)
