<?php
include_once(PATH."controllers/departmentcontroller.php");
include_once(PATH."controllers/doctorcontroller.php");
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$tmp_name=$_FILES['photo']['tmp_name'];
	$name=$_FILES['photo']['name'];
	//$whitelist=array('jpg','jpeg','png','bmp','gif');
	//echo "<PRE>";
	//print_r($_FILES);
	
	$photoext=explode("/",$_FILES['photo']['type']);
	//print_r($name12);
	if($photoext[0]=='image')
	{
		
	//die;
	$path="uploads/".$name;
	move_uploaded_file($tmp_name,$path);
	$_POST['photo']=$path;
	adddoc($_POST);
	}
	else
	{
		echo "Invalid Format";
	}
}
$row=show();
?>
<script language="javascript">
 function validate()
{
	var doctor=document.form2.fullname.value;
	if(doctor=="")
	{
		document.getElementById(doctor).innerHTML="* This field is compulsory";
		document.form2.fullname.focus();
		return false;
	}

}
</script>
<form method="POST" enctype="multipart/form-data" action="" accept-charset="UTF-8" name="form2" onsubmit="javascript::return validate();">
  <select name="department_id" id="select">
      <?php 
	  	foreach($row as $key=>$new_arr)
		{ 
	  ?>
     <option value="<?php echo $arr['id']; ?>">
      <?php echo $arr['name']; ?>
    </option>
    <?php } ?>
  </select>
  <input class="input-block-level" placeholder="Doctor"  name="fullname" type="text"><span id="doctor"></span>
  <input type="file" name="photo"/>	
    <input class="btn btn-large btn-primary btn-block" type="submit" value="Save">  
</form>