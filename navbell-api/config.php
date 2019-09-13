<?php
/* coded by m.slamat */

/**************************************/
/*THIS FILE CONTAIN API CONFIGURATION */
/**************************************/
	/**************************************************************/
	/** 				DATABASE CONFIG 						 **/
	/* (the config of db that u do it in docker compose file ) 	  */
	/**************************************************************/
	define(MySQL_HOST, "23.101.131.75"); // DATABASE HOST 
	define(MySQL_USER, "slamat"); // DATABASE USER NAME
	define(MySQL_PASS, "slamat"); // DATABASE PASSWORD
	define(MySQL_PORT, "1337"); // DATABASE PORT 
	define(MySQL_DBNAME, "navbell"); // DATABASE NAME
	/**************************************************************/
	/** 				SMTP CONFIG 	 						 **/
	/**************************************************************/
	define(SMTP_HOST, "mail.cjairport-gy.com"); // SMTP HOST 
	define(SMTP_USER, "info@cjairport-gy.com"); // SMTP USER NAME
	define(SMTP_PASS, "0dayismine"); // SMTP PASSWORD
	/**************************************************************/
	/** 				SYSADMIN  EMAIL 	 					 **/
	/**************************************************************/
	define(SYSADMIN, 'm.slamat@esi-sba.dz'); // EMAIL OF SYSADMIN
	/**************************************************************/
	/** 				SECURITY SYSTEM	  	 					 **/
	/**************************************************************/
	define(IS_SECURE, false); // SWITCH to true to be more safe 

	

?>