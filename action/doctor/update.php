<?php
	include('../../init.php');
	include_once(PATH."controllers/doctorcontroller.php");
	//print_r($_POST);
	//print_r($_FILES);
	if ($_SERVER['REQUEST_METHOD']=='POST')
		{
			
	  $name=date('U').$_FILES['photo']['name'];
	 if($name!="")
	{
		 $tmp_name=$_FILES['photo']['tmp_name'];
		
		
		
		$photoext=explode("/",$_FILES['photo']['type']);
		
		
		if($photoext[0]=='image')
		{
			
		//die;
		$path="uploads/".$name;
		unlink(PATH.$_POST['old_photo']);
		move_uploaded_file($tmp_name,PATH.$path);
		$_POST['photo']=$path;
		
		//adddoc($_POST);
		}
		else
		{
			echo "Invalid Format";
		}
	
	}
	else
	{
		$_POST['photo']=$_POST['old_photo'];
	}
		 updatedoc($_POST);
		 header("Location:http://".URL."?module=view/doctor/list.php");
		 
		}
	?>