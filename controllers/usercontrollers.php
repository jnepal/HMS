<?php
include_once('appcontrollers.php');
connectDB();
function login($username,$password){
		echo $sql= "select count(*) as cnt from users 
				where username='".$username."'and password='".$password."'";
		$res=mysql_query($sql) or die(mysql_error());
	
		$row=mysql_fetch_array($res);
		

		if($row['cnt']>0){
				$_SESSION['username']=$username;
				header('Location:index.php');
				
			}
		else{
				
				header('Location: login.php?error=1');


			}		 

		}
