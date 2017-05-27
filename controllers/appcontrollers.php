<?php	
session_start();
include_once(PATH."constants.php");
		function connectDB(){
				mysql_connect(HOSTNAME,USERNAME,PASSWORD);
				mysql_select_db(DBNAME);
								
			}
		?>