# Authentication
## User

## Jwt
Static methods class which encode, decode and verify bearer token form header. 

## Custom Guard
the guard is a closure implemented in `AuthserviceProvider` boot method via `Auth::viaRequest`. The closure gets the Request bearer token and sends the token to Jwt for verification after that
a user or null is returned.

in config/auth class there is an api guard array with driver jwt. The defualt guard is `api`.



# Authorization
Role
Permission
