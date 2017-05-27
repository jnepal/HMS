<?php
include_once('init.php');
include_once(PATH.'controllers/departmentcontroller.php');
include_once(PATH.'controllers/appcontrollers.php');
connectDB();
if($_GET['mode']=='delete')
{
 delete($_GET['id']);
 
}
$row=show();
//echo"<PRE>";
//print_r($row);
?>
<table width="100%" border="0">
  <tr>
    <td width="81"><strong>ID</strong></td>
    <td width="90"><strong>Name </strong></td>
    <td width="188"><strong>Active_status</strong></td>
    <td width="376"><strong>Action</strong></td>
  </tr>
   <?php 
		   foreach($row as $key=>$arr)
		   {
			   
		   ?>
  <tr bgcolor="<?php if($key%2==0){?>#999999<?php } ?>">
    <td><?php echo $arr['id']; ?></td>
    <td><?php echo $arr['name']; ?></td>
    <td><?php echo $arr['is_active']; ?></td>
    <td><table width="19%" border="0">
      <tr>
        <td width="46%"><a class="btn btn-large btn-primary btn-block" href="?module=view/department/update.php&amp;id=<?php echo $arr['id']?>">Edit</a></td>
        <td width="54%"><a class="btn btn-large btn-primary btn-block"href="?module=<?php echo $_GET['module'] ?>&amp;mode=delete&amp;id=<?php echo $arr['id']?>" onsubmit="javascript:Confirm("Are you Sure")">Delete</a></td>
      </tr>
    </table></td>
</tr>
<?php }  ?>
</table>



		
