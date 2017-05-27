<?php
	include_once(PATH."controllers/departmentcontroller.php");
	include_once(PATH."controllers/doctorcontroller.php");
	$row=showdoc($_GET['id']);
	//echo "<PRE>";
	//print_r($row);
	//print_r($_POST);
	
	
	
	
	$rowd=show();
	?>
	
	<script language="javascript">
		function validate(){
			var department=document.form1.department.value;
			if(department==""){
				alert('Doctor is compulsory');
				return false;
			}
			
		}
	</script>							 
	<form method="POST" enctype="multipart/form-data" action="http://<?php echo URL."action/doctor/update.php"?>" accept-charset="UTF-8" name="form1" onsubmit="return validate();">
    <select name="department_id" id="select">
      <?php 
	  	foreach($rowd as $key=>$arr){
			if($arr['id']==$row[0]['department_id']){
				$sel="selected";
			}
			else{
				$sel="";
			}
	  ?>
     <option value="<?php echo $arr['id']; ?>" <?php echo $sel;?>>
      <?php echo $arr['name']; ?>
    </option>
    <?php } ?>
  </select>
	<input class="input-block-level" placeholder="Designation" name="name" value="<?php echo $row[0]['designation']?>" type="text">
	<input class="input-block-level" placeholder="Doctor Name" name="name" value="<?php echo $row[0]['fullname']?>" type="text">	
	<input type="file" name="photo"/> 
    <img src="<?php echo $row[0]['photo']; ?>" height="100" width="100" />
    <input type="hidden" name="id" value="<?php echo $row[0]['id']?>"/>
    <input type="text" name="old_photo" value="<?php echo $row[0]['photo']?>"/>
	<input class="btn btn-large btn-primary btn-block" type="submit" value="Save">  
	<?php /*echo "<PRE>"; print_r($_GET['module']);*/?>

	</form>							




