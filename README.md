## How to run this repo ?
Clone or download this repository to your local machine. CD into the root folder of the project and type ..
```
dev_fresh.bat
```
.. and hit ENTER.
Once everything is built up and ready, open your browser and navigate to http://localhost:8081

## What is included ?
5 Docker containers:
-> 2 Nginx containers
-> 2 PHP 8.1 containers
-> 1 MySQL 8 container

This repository shows a simple implementation of Symfony microservices within Docker.

## What could be added ?
.. but wasn't due to shortness of time:

  -> the database records inserted via simple INSERT query could be added via Symfony Fixtures

  -> Messenger
  
  -> PHPUnit
  
## Other remarks
This solution was built in Windows 11 using PHPStorm IDE and Docker Desktop.

**NOTE** : there are 2 APP_SECRET values clearly listed within .env files of `apps` folders - I realise these are usually not to be displayed, but this was kept so just for the easiness of installation of the repo and its testing.
