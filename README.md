# TravelPerk API Probe

This project will be used to periodically test the TravelPerk API wrappers to check responses stay consistent.

To run it yourself, copy `.env.example` to `.env` and fill in your credentials, then execute `./run`.

## Operations included on the probe

### Webhooks
 - List all webhooks [python](https://github.com/namelivia/travelperk-http-python/wiki/Webhooks#list-all-webhooks) [php](https://github.com/namelivia/travelperk-http-php/wiki/Webhooks#list-all-webhooks)
 - Create a webhook (pending)
 - Retrieve a webhook [python](https://github.com/namelivia/travelperk-http-python/wiki/Webhooks#retrieve-a-webhook) [php](https://github.com/namelivia/travelperk-http-php/wiki/Webhooks#retrieve-a-webhook)
 - Update a webhook (pending)
 - Test a webhook (pending)
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
