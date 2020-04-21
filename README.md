# IMBD-API

## Before Begining use at command line: php artisan migrate --seed 

Welcome to Imbd-api If you need see all series or all movies 
use: GET /v.1/api/series or GET /v.1/api/movies, 
- Add new resource: POST /v.1/api/{series || movies} fields : title=String ,release=YYYY-MM-DD 
category=['Action','Adventure','Comedy','Drama','Terror','Romance','Other'] ,actors=String ,directors=String 
- Update  resource: POST /v.1/api/{series || movies} fields : title=String ,release=YYYY-MM-DD 
category=['Action','Adventure','Comedy','Drama','Terror','Romance','Other'] ,actors=String ,directors=String 
- Read resource GET /v.1/api/{series||movies}/{id} id= Number 
- Find Resource GET /v.1/api/{series||movies}/{title,category,rating,release} = {value} 
- Delete resource DELETE /v.1/api/{series||movies}/{id}
