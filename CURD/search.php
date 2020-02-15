<?php
include('connect.php');
if(isset($_POST['search']))
{
	$q = $_POST['srch_query'];
?>

<form method = "post" action="">
<input type="text" name="srch_query" value="<?php echo $q ?>" required>
<input type="submit" name="search" value="Search">
</form>

	<?php
	$search = $db->prepare("SELECT * FROM members 
									WHERE fname LIKE '%$q%' OR 
									lname LIKE '%$q%'");
	$search->execute();

	if($search->rowcount()==0){echo "No match found!"; }
	else
	{
		echo "Search Result:<br/>";?>
		<table border="1" cellspacing="0" cellpadding="4" >
			<thead>
				<tr> 
					<th> First Name </th>
					<th> Last Name </th>
					<th> Age </th>
					<th> Action </th>
				</tr>
			</thead>
			<tbody>
<?php foreach($search as $s)
				{
					 ?>
					 <tr class="record">
					 	<td><?php echo $s['fname']; ?></td>
					 	<td><?php echo $s['lname']; ?></td>
					 	<td><?php echo $s['age']; ?></td>
					 	<td><a href="editform.php?id=<?php echo $s['id']; ?>"> edit </a>&nbsp;
					 		&nbsp;<a href="delete.php?id=<?php echo $s['id']; ?>"> delete </a></td>
					 	</tr>
<?php }
}
} ?> 		</tbody>
		</table><br/> 
	<a href="add.php">Add new Member</a><br/> 
	