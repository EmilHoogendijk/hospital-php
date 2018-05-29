<?php

require(ROOT . "model/ClientsModel.php");

function index()
{
	render("clients/index", array(
		'clients' => getAllClients()
	));


}

function create()
{
	render("clients/create");
}

function createSave()
{
	if (!createClient()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "clients/index");
}

function edit($id)
{
	render("clients/edit", array(
		'client' => getClient($id)
	));
}

function editSave()
{
	if (!editClient()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "clients/index");
} 

function delete($id)
{
	if (!deleteClient($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "clients/index");
}