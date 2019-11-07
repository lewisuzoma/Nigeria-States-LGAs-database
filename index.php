<?php
include_once 'dbconfig.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dynamic States and LGAs</title>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	
	$(".state").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_lgas.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".lga").html(html);
			} 
		});
	});
	
});
</script>
<style>
label
{
font-weight:bold;
padding:10px;
}
div
{
	margin-top:100px;
}
select
{
	width:200px;
	height:35px;
}
</style>
</head>

<body>
<center>
<div>
<label>State :</label> 
<select name="state" class="state">
<?php
	$stmt = $DB_con->prepare("SELECT * FROM tbl_state");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['state_id']; ?>"><?php echo $row['state_name']; ?></option>
        <?php
	} 
?>
</select>


<label>LGA :</label> <select name="lga" class="lga">
<option selected="selected">--Select LGA--</option>
</select>

</div>
<br />
<a href="http://www.blutek.com/">Bob link</a>
</center>
</body>
</html>
