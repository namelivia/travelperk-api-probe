# TravelPerk API Probe

This project will be used to periodically test the TravelPerk API wrappers to check responses stay consistent.

To run it yourself, copy `.env.example` to `.env` and fill in your credentials, then execute `./run`.

## Operations included on the probe

### Cost Centers
 - List cost centers [python](https://github.com/namelivia/travelperk-http-python/wiki/Cost-Centers#list-of-cost-centers) [php](https://github.com/namelivia/travelperk-http-php/wiki/Cost-Centers#list-of-cost-centers)
 - Cost center details [python](https://github.com/namelivia/travelperk-http-python/wiki/Cost-Centers#details-of-a-cost-center) [php](https://github.com/namelivia/travelperk-http-php/wiki/Cost-Centers#details-of-a-cost-center)

### Users (non SCIM)
 - List users [python](https://github.com/namelivia/travelperk-http-python/wiki/Users-(non-SCIM)#list-all-users) [php](https://github.com/namelivia/travelperk-http-php/wiki/Users-(non-SCIM)#list-all-users)
