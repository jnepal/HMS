<?php
	ob_flush();
	include_once(PATH."controllers/departmentcontroller.php");
	$row=show($_GET['id']);
	//echo "<PRE>";
	//print_r($row);
	//print_r($_POST);
	if ($_SERVER['REQUEST_METHOD']=='POST')
	{
	 
	 update($_POST);
	 
	}
	
	
	?>
	
	<script language="javascript">
		function validate(){
			var department=document.form1.department.value;
			if(department==""){
				alert('Department is compulsory');
				return false;
			}
			
		}
	</script>							 
	<form method="POST" action="http://<?php echo URL."action/department/update.php"?>" accept-charset="UTF-8" name="form1" onsubmit="return validate();">
	<input class="input-block-level" placeholder="Department" name="name" value="<?php echo $row[0]['name']?>" type="text">	
	<input type="hidden" name="id" value="<?php echo $row[0]['id']?>"/>
	<input class="btn btn-large btn-primary btn-block" type="submit" value="Save">  
	
	</form>							





