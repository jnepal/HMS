<?php
	include('../../init.php');
	include_once(PATH."controllers/departmentcontroller.php");
	if ($_SERVER['REQUEST_METHOD']=='POST')
		{
		 
		 update($_POST);
		 header("Location:http://".URL."?module=view/department/list.php");
		 
		}
	?>