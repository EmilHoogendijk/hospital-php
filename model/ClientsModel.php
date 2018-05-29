<?php

function getClient($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM clients WHERE client_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}

function getAllClients() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM clients";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function createClient() 
{
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
	
	if (strlen($firstname) == 0 || strlen($lastname) == 0 || strlen($email) == 0 || strlen($phone) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO clients(client_firstname, client_lastname, client_email, client_phone) VALUES (:firstname, :lastname, :email, :phone)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':lastname' => $lastname,
		':email' => $email,
		':phone' => $phone));

	$db = null;
	
	return true;
}

function editClient() 
{
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	$phone = isset($_POST['phone']) ? $_POST['phone'] : null;
	
	if (strlen($firstname) == 0 || strlen($lastname) == 0 || strlen($email) == 0 || strlen($phone) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "UPDATE clients SET client_firstname = :firstname, client_lastname = :lastname, client_email = :email, client_phone = :phone WHERE client_id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':lastname' => $lastname,
		':id' => $id,
		':email' => $email,
		':phone' => $phone));

	$db = null;
	
	return true;
}

function deleteClient($id = null) 
{
	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM clients WHERE client_id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	$db = null;
	
	return true;
}