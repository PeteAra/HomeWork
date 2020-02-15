<?php
include('connect.php');
if(isset($_POST['search']))
{
	$q = $_POST['srch_query'];
}
?>
<html>
	<body>
		<h3>Welcome Admin</h3><br/>
		<form method = "post" action="search.php">
			<input type="text" name="srch_query" placeholder="Search here..." required>
			<input type="submit" name="search" value="search">
		</form>

		<table border="1" cellspacing="0" cellpadding="4" ><thead>
		<tr> <th> First Name </th>
			 <th> Last Name</th>
			 <th> Age </th>
			 <th> Action </th> </tr></thead>
		<tbody>
			<?php 
				$result = $db->prepare("SELECT * From members ORDER BY id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++)
				{ ?>
				<tr class="record">
					<td><?php echo $row['fname']; ?></td>
					<td><?php echo $row['lname']; ?></td>
					<td><?php echo $row['age']; ?></td>
					<td><a href="editform.php?id=<?php echo $row['id']; ?>"> Edit </a>&nbsp;
						&nbsp;<a href="delete.php?id=<?php echo $row['id']; ?>"> Delete </a></td>
					</tr>
			<?php } ?>
		</tbody> 
		</table><br/> 
		<a href = "add.php">Add new Member</a><br/>
	</body>
</html>