<h2>Clients</h2>
<div class="container">
	<table border="1">
		<tr>
			<th>Client</th>
			<th>Email</th>
			<th>Phone</th>
			<th colspan="2">Action</th>
		</tr>

		<?php foreach ($clients as $client) { ?>
		<tr>
			<td><?= $client['client_firstname']; echo ' '. $client['client_lastname']; ?></td>
			<td><?= $client['client_email']; ?></td>
			<td><?= $client['client_phone']; ?></td>
			<td><a href="<?php echo URL . 'clients/edit/' . $client['client_id']; ?>">Edit</a></td>
			<td><a href="<?php echo URL . 'clients/delete/' . $client['client_id']; ?>">Delete</a></td>
		</tr>
		<?php } ?>

	</table>
	<a href="<?= URL ?>clients/create">Add</a>
</div>