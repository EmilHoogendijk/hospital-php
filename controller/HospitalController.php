<?php

require(ROOT . "model/HospitalModel.php");

function index()
{
	render("hospital/index", array(
		'patients' => getAllPatients()
	));


}

function create()
{
	render("hospital/create", array(
		'species' => getAllspecies(),
		'clients' => getAllClients()
		));
}

function createSave()
{
	if (!createPatient()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "hospital/index");
}

function edit($id)
{
	render("hospital/edit", array(
		'patients' => getPatient($id),
		'species' => getAllSpecies(),
		'clients' => getAllClients()
	));
}

function editSave()
{
	if (!editPatients()) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "hospital/index");
} 

function delete($id)
{
	if (!deletePatient($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "hospital/index");
}
