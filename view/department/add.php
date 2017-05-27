	<?php

	include_once(PATH."controllers/departmentcontroller.php");
	//print_r($_POST);
	echo $seed=session_id();
	if ($_SERVER['REQUEST_METHOD']=='POST')
	{
	//echo "test"; 
	 add($_POST);
	 
	}
	
	
	?>
	
	<script language="javascript">
		function validate(){
			var department=document.form1.name.value;
			if(department==""){
				alert('Department is compulsory');
				department.form1.name.focus;
				return false;
			}
			
		}
	</script>							 
	<form method="POST" action="" accept-charset="UTF-8" name="form1" onsubmit="return validate();">
	<input class="input-block-level" placeholder="Department" name="name" type="text">	
	<input class="btn btn-large btn-primary btn-block" type="submit" value="Save">  
	</form>							
