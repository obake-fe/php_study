<?php declare(strict_types=1);
session_start();

if (!isset($_POST["subscribe"]) || $_POST["name"] === "") {
	header("Location:form.php");
	return;
}

$_SESSION["data"] = [
	"name" => $_POST["name"]
];

header("Location:view.php");