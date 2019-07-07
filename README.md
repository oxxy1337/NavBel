
# 2cpi Projet pluridisciplinaire NavBel 

## introduction

Navel is education platform that allows you to learn and enjoy and gain rewards (like gifts cards , coupons ...) in same time
the platform is an android application and web site 
check our android app source code from here //url

## Overview 
 //TODO  add screen shoot here later
 
 ##   Technologies used
#### Server side
- Docker 
- PHP
- MySQL
 #### web side
- Front (Html,Css,JavaScript)
-  Back PHP
#### mobile side 
- Kotlin 
- Java
- Gradle
- XML 
## Project Architecture
#### server side
//TODO diagrame
The Docker Daemon should start 5 containers
-   api :  is the container that is contains restful api used by android ,dashboard,web  application 
- db : container that's run mysql image , MySQL Database  is used by restfull api to manipulate data
- web serveur : container that's run Apache web-server
- dashboard : container that's run control panel (Administartion panel)
- web-site : container that's conain navbel web site
