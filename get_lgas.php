<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['id'];
	
	$stmt = $DB_con->prepare("SELECT * FROM tbl_locals WHERE state_id=:id");
	$stmt->execute(array(':id' => $id));
	?><option selected="selected">Select LGA :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
		<option value="<?php echo $row['local_id']; ?>"><?php echo $row['local_name']; ?></option>
		<?php
	}
}
?>