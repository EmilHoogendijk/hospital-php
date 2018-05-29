<h2>Patiënts</h2>
<div class="container">
	<table border="1">
		<tr>
			<th>Patient</th>
			<th>Species</th>
			<th>Client</th>
			<th>Complaint</th>
			<th colspan="2">Action</th>
		</tr>

		<?php foreach ($patients as $patient) { ?>
		<tr>
			<td><?= $patient['patient_name']; ?></td>
			<td><?= $patient['species_description']; ?></td>
			<td><?= $patient['client_firstname']; echo ' '. $patient['client_lastname']; ?></td>
			<td><?= $patient['patient_status']; ?></td>
			<td><a href="<?= URL ?>hospital/edit/<?= $patient['patient_id'] ?>">Edit</a></td>
			<td><a href="<?= URL ?>hospital/delete/<?= $patient['patient_id'] ?>">Delete</a></td>
		</tr>
		<?php } ?>

	</table>
	<a href="<?= URL ?>hospital/create">Add</a>
</div>