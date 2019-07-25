

# 2cpi Projet pluridisciplinaire NavBel 

## introduction

Navel is education platform that allows you to learn and enjoy and gain rewards (like gifts cards , coupons ...) in same time
the platform is an android application and web site 
check our android app source code from [here](https://github.com/roiacult/NavBel-App) 

## Overview 
//TODO screenshots 
## Installation 
NavBel Installation require Docker, if Docker has not installed yet you can install it by visiting [link](https://docs.docker.com/install/) and follow the instructions .
### Deploying 
1- Clone the repository [Navbel](https://github.com/oxxy1337/NavBel) from github in your machin and change directory to it .
```bash
$ git clone https://github.com/oxxy1337/NavBel
cd NavBel
```
2- Reconfig API configuration file : ./navbell-api/config.php
```bash
$ nano navbell-api/config.php
```
By default the Database configuration is generated by db image, so just edit SMTP configuration & sysadmin email.
```php
<?php
/* coded by m.slamat */

/**************************************/
/*THIS FILE CONTAIN API CONFIGURATION */
/**************************************/
	/**************************************************************/
	/** 				DATABASE CONFIG 						 **/
	/* (the config of db that u do it in docker compose file ) 	  */
	/**************************************************************/
	/// default 
	define(MySQL_HOST, "navbel_db_1"); // DATABASE HOST 
	define(MySQL_USER, "slamat"); // DATABASE USER NAME
	define(MySQL_PASS, "slamat"); // DATABASE PASSWORD
	define(MySQL_PORT, "1337"); // DATABASE PORT 
	define(MySQL_DBNAME, "navbell"); // DATABASE NAME
	/**************************************************************/
	/** 				SMTP CONFIG 	 						 **/
	/**************************************************************/
	define(SMTP_HOST, ""); // SMTP HOST 
	define(SMTP_USER, ""); // SMTP USER NAME
	define(SMTP_PASS, ""); // SMTP PASSWORD
	/**************************************************************/
	/** 				SYSADMIN  EMAIL 	 					 **/
	/**************************************************************/
	define(SYSADMIN, ""); // EMAIL OF SYSADMIN
	/**************************************************************/
	/** 				SECURITY SYSTEM	  	 					 **/
	/**************************************************************/
	define(IS_SECURE, true); // SWITCH to true to be more safe 
?>
```
3- Build the images and run the services:
```bash
$ docker-compose up -d
```
It will take a time 

4- Activating [Backup](https://github.com/oxxy1337/NavBel/blob/master/docs/backup.pdf) System : 
Chmod files : 
```bash
$ chmod +x backup.sh 
$ chmod +x backups/init.sh
$ chmod +x backups/backup.sh
```
Run script 
```bash
$ ./backup.sh "0 12 * * *"
$ [+] BACKUP SYSTEM INSTALLED SUCCESSFULLY
```


##   Technologies used
#### Server side
- Docker
- BASH
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


The Docker Daemon should start 6 containers
-   api :  is the container that is contains restful api used by android ,dashboard,web  application 
- db : container that's run mysql image , MySQL Database  is used by restfull api to manipulate data
- web serveur : container that's run Apache web-server
- dashboard : container that's run control panel (Administartion panel)
- web-site : container that's contain navbel web site
- phpmyadmin : container that's run phpmyadmin to control the database 
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
