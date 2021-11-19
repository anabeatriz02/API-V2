<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Content-type: application/json");

include('../Connection.php');
include('../model/ModelPessoa.php');
include('../controlle/ControllerPessoa.php');

$conn = new Connection();
$model = new ModelPessoa($conn->returnConnection());
$controller = new ControllerPessoa($model);



?>