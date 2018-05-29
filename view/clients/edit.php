<div class="container">
	<h1>Edit</h1>
	<form action="<?= URL ?>clients/editSave" method="post">
	
		<input type="text" name="firstname" value="<?= $client['client_firstname']; ?>">
		<input type="text" name="lastname" value="<?= $client['client_lastname']; ?>">
		<input type="text" name="email" value="<?= $client['client_email']; ?>">
		<input type="text" name="phone" value="<?= $client['client_phone']; ?>">

		<input type="hidden" name="id" value="<?= $client['client_id']; ?>">
		<input type="submit" value="Submit">
	
	</form>

</div>
