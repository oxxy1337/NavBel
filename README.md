

# 2cpi Projet pluridisciplinaire NavBel 

## introduction

Navel is education platform that allows you to learn and enjoy and gain rewards (like gifts cards , coupons ...) in same time
the platform is an android application and web site 
check our android app source code from [here](https://github.com/roiacult/NavBel-App) 

## Overview 
//TODO screenshots 
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
- SQLite
- Gradle
- XML 
## Project Architecture
#### server side
![alt](https://i.imgur.com/AjgPbEo.png)

The Docker Daemon should start 5 containers
-   api :  is the container that is contains restful api used by android ,dashboard,web  application 
- db : container that's run mysql image , MySQL Database  is used by restfull api to manipulate data
- web serveur : container that's run Apache web-server
- dashboard : container that's run control panel (Administartion panel)
- web-site : container that's conain navbel web site
#### android side 
we adopt clean architecture to build this android application 
![alt](https://i.imgur.com/QJQXx7P.png)

##### presentation-layer
The presentation layer is the user layer, the graphical interface that captures the user’s events and shows the results. It also performs operations such as verifying that there are no formatting errors in the user’s data entry and formatting data to be displayed in a certain way
 inside the presentation layer we adopt the MVVM (Model,View,ViewModel) and MvRx concepts
   * State : is an immutable Kotlin data class that contains the properties necessary to render screen
   * ViewModel : excute usecases and anything other than just rendering views. ViewModels own state and their state can be observed.
   * View : LifecycleOwner that observe changes of states from ViewModels
##### domain-layer
In this layer all the rules that a business must comply with are business. For this, they receive the data provided by the user and perform the necessary operations
   * UseCase : all possible interaction can happened in application is a use case class
   * repository : interface contain all calls from data sources
   * models : modularisation of the app (entities classes)
##### data-layer
is the one that performs the logic of data access. he obtain data and check where they are, deciding where to look at each moment
   * repository-impl : class thats provide implementation of repository from domain layer  
   * local-dataSource : it's controlle all access in local database (SQLite requests)
   * remote-dataSource : responsable of http requests to the server (api)
